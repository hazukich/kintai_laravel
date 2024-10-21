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
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->id();
            $table->string('attendance_head_id');//ヘッダーID
            $table->char('day', 2);//日付
            $table->string('kbn', 1);//勤怠区分
            $table->time('start_time')->nullable();//開始時刻
            $table->time('end_time')->nullable();//終了時刻
            $table->integer('rest_time')->nullable();//昼休憩時刻
            $table->integer('night_rest_time')->nullable();//夜休憩時刻
            $table->integer('work_time')->nullable();//稼働時間
            $table->integer('over_time')->nullable();//残業時間
            $table->string('remarks', 256)->nullable();//備考
            $table->timestamps();//作成日時,更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_details');
    }
};
