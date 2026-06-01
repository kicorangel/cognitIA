<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cognitive_hat_analysis_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('model_key')->default('cognitive_hat');
            $table->string('run_id')->nullable()->index();

            $table->longText('idea')->nullable();

            $table->json('user_snapshot')->nullable();
            $table->json('roles_snapshot')->nullable();

            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->json('metrics_payload')->nullable();

            $table->json('export_payload');

            $table->string('engine_url')->nullable();
            $table->string('mode')->nullable();
            $table->string('final_hat')->nullable();
            $table->string('decision_confidence')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['model_key', 'created_at']);
            $table->index(['mode', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cognitive_hat_analysis_logs');
    }
};