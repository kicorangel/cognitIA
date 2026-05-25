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
            ->get();

        if ($roles->isEmpty()) {
            return back()
                ->withInput()
                ->with('error', 'No active thinking roles found for your user. Please configure at least one role before running the analysis.');
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
            $response = Http::timeout(600)->post($apiUrl, $payload);

            if (! $response->successful()) {
                return back()
                    ->withInput()
                    ->with('error', 'The engine returned an error: ' . $response->body());
            }

            return view('cognitive-hat.index', [
                'result' => $response->json(),
            ]);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Connection error with the engine: ' . $e->getMessage());
        }
    }
}