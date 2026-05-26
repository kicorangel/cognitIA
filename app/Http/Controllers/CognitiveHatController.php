<?php

namespace App\Http\Controllers;

use App\Models\ThinkingRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CognitiveHatController extends Controller
{
    public function index()
    {
        return view('cognitive-hat.index', [
            'result' => null,
        ]);
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'idea' => ['required', 'string', 'min:5'],
        ]);

        $roles = ThinkingRole::where('user_id', auth()->id())
            ->where('model_key', 'cognitive_hat')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        if ($roles->isEmpty()) {
            return back()
                ->withInput()
                ->with('error', 'No active thinking roles found. Please create or activate at least one role before running the analysis.');
        }

        $payload = [
            'idea' => $request->input('idea'),
            'roles' => $roles->map(fn ($role) => [
                'code' => $role->code,
                'name' => $role->name,
                'title' => $role->title,
                'profile' => $role->profile_prompt,
            ])->values()->all(),
        ];

        $apiUrl = rtrim(config('services.cognitive_hat.url'), '/') . '/analyze';

        try {
            $response = Http::timeout(900)->post($apiUrl, $payload);

            if (! $response->successful()) {
                return back()
                    ->withInput()
                    ->with('error', 'The engine returned an error: ' . $response->body());
            }

            $result = $response->json();
            $metrics = $this->extractAnalysisMetrics($result, $payload);

            $exportPayload = [
                'metadata' => [
                    'generated_by' => 'cognitIA',
                    'generated_at' => now()->toIso8601String(),
                    'user_id' => auth()->id(),
                    'model_key' => 'cognitive_hat',
                    'engine_url' => $apiUrl,
                ],
                'request' => $payload,
                'response' => $result,
                'metrics' => $metrics,
            ];

            return view('cognitive-hat.index', [
                'result' => $result,
                'exportPayload' => $exportPayload,
                'metrics' => $metrics,
            ]);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Connection error with the engine: ' . $e->getMessage());
        }
    }

    private function extractAnalysisMetrics(array $result, array $requestPayload = []): array
    {
        $state = $result['state'] ?? [];

        $backendMetrics = $result['analysis_metrics']
            ?? data_get($state, 'analysis_metrics', []);

        $agentInteractionsCount = $result['agent_interactions_count']
            ?? data_get($backendMetrics, 'agent_interactions_count')
            ?? data_get($state, 'analysis_metrics.agent_interactions_count')
            ?? $this->countAgentInteractionsFromState($state);

        $rolesCount = data_get($backendMetrics, 'roles_count')
            ?? data_get($state, 'analysis_metrics.roles_count')
            ?? count($requestPayload['roles'] ?? [])
            ?? count($state['roles'] ?? []);

        $agentHatsCount = data_get($backendMetrics, 'agent_hats_count')
            ?? data_get($state, 'analysis_metrics.agent_hats_count')
            ?? $this->countReasoningHatsFromState($state);

        $blueSynthesisCount = data_get($backendMetrics, 'blue_synthesis_count')
            ?? data_get($state, 'analysis_metrics.blue_synthesis_count')
            ?? 1;

        $briefInterpretationCount = data_get($backendMetrics, 'brief_interpretation_count')
            ?? data_get($state, 'analysis_metrics.brief_interpretation_count')
            ?? 1;

        $llmCallsCount = $result['llm_calls_count']
            ?? data_get($backendMetrics, 'llm_calls_count')
            ?? data_get($state, 'analysis_metrics.llm_calls_count');

        if ($llmCallsCount === null) {
            $mode = $result['mode'] ?? data_get($state, 'mode', 'mock');

            $llmCallsCount = $mode === 'llm'
                ? ((int) $agentInteractionsCount + (int) $blueSynthesisCount + (int) $briefInterpretationCount)
                : 0;
        }

        return [
            'roles_count' => (int) $rolesCount,
            'agent_hats_count' => (int) $agentHatsCount,
            'agent_interactions_count' => (int) $agentInteractionsCount,
            'blue_synthesis_count' => (int) $blueSynthesisCount,
            'brief_interpretation_count' => (int) $briefInterpretationCount,
            'llm_calls_count' => (int) $llmCallsCount,
            'simulated_interactions_count' => (int) (
                data_get($backendMetrics, 'simulated_interactions_count')
                ?? data_get($state, 'analysis_metrics.simulated_interactions_count')
                ?? 0
            ),
        ];
    }

    private function countAgentInteractionsFromState(array $state): int
    {
        $outputs = $state['outputs'] ?? [];
        $count = 0;

        foreach ($outputs as $hatOutputs) {
            if (! is_array($hatOutputs)) {
                continue;
            }

            foreach ($hatOutputs as $roleOutputs) {
                if (is_array($roleOutputs)) {
                    $count += count($roleOutputs);
                }
            }
        }

        return $count;
    }

    private function countReasoningHatsFromState(array $state): int
    {
        $hatSequence = $state['hat_sequence'] ?? [];

        if (is_array($hatSequence) && count($hatSequence) > 0) {
            return count(array_filter(
                $hatSequence,
                fn ($hat) => strtoupper((string) $hat) !== 'BLUE'
            ));
        }

        $outputs = $state['outputs'] ?? [];

        if (! is_array($outputs)) {
            return 0;
        }

        return count(array_filter(
            array_keys($outputs),
            fn ($hat) => strtoupper((string) $hat) !== 'BLUE'
        ));
    }
}