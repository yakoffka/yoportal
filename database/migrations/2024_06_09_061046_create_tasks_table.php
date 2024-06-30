<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // throw new \PHPUnit\Event\RuntimeException('Это заготовка! миграция еще не продумана!');

        Schema::create('tm_tasks', static function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('from')->comment('Постановщик задачи');
            $table->foreign('from')->references('id')->on('users')->restrictOnDelete();

            $table->unsignedBigInteger('to')->nullable()->comment('Исполнитель задачи');
            $table->foreign('to')->references('id')->on('users')->restrictOnDelete();

            $table->string('status')->comment('Статус задачи');

            $table->string('name')->comment('Наименование задачи');

            $table->text('description')->comment('Описание задачи');

            $table->timestamp('due_date')->nullable()->comment('Срок выполнения');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_tasks');
    }
};
