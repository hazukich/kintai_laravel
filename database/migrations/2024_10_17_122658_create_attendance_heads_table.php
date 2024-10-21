<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_heads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');//社員id
            $table->string('yyyymmdd', 6);//年月
            $table->string('status', 1);//ステータス
            $table->string('reject_comment', 500)->nullable;//差し戻し理由
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_heads');
    }
};
