<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CognitiveHatAnalysisLog extends Model
{
    protected $fillable = [
        'user_id',
        'model_key',
        'run_id',
        'idea',
        'user_snapshot',
        'roles_snapshot',
        'request_payload',
        'response_payload',
        'metrics_payload',
        'export_payload',
        'engine_url',
        'mode',
        'final_hat',
        'decision_confidence',
    ];

    protected $casts = [
        'user_snapshot' => 'array',
        'roles_snapshot' => 'array',
        'request_payload' => 'array',
        'response_payload' => 'array',
        'metrics_payload' => 'array',
        'export_payload' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}