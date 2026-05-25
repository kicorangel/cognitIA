<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThinkingRole extends Model
{
    protected $fillable = [
        'user_id',
        'model_key',
        'code',
        'name',
        'title',
        'profile_prompt',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}