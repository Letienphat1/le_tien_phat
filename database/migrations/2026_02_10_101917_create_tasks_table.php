<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('project_id') //xóa pro thì xóa hết task trong pro
                ->constrained('projects')
                ->cascadeOnDelete();

            $table->string('name');
            $table->integer('ordering')->default(1000);
            $table->text('description')->nullable();

            $table->foreignId('assigned_to') // 1 người được giao
                ->nullable()
                ->constrained('users');

            $table->foreignId('created_by')
                ->nullable() // Người tạo
                ->constrained('users');

            $table->enum('priority', ['critical', 'high', 'medium', 'low', 'lowest',])->nullable(); //Mức độ ưu tiên 

            $table->enum('status', ['todo', 'progress', 'review', 'done',])->default('todo'); //trạng thái, màu

            $table->date('start_at')->nullable(); //Ngày bắt đầu 
            $table->dateTime('deadline_at')->nullable(); //Deadline 
            $table->dateTime('completed_at')->nullable(); //Thời gian hoàn thành

            $table->dateTime('remind_at')->nullable(); //Nhắc nhở

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
