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
        Schema::create('holidays', callback: function (Blueprint $table) {
            $table->id();
            $table->string('yyyymmdd', 20);//日付
            $table->string('holiday_name', 10);//祝日名
            $table->timestamps();//作成日時,更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
