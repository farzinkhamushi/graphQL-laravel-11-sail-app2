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
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('bio');
            $table->string('photo')->nullable();
            $table->string('twitter')->nullable();
            $table->string('city');
            $table->string('country');
            /*
            $table->foreignId('event_id')
                    ->nullable()
                    ->on('events')
                    ->constrained()
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
            */
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            /*
            $table->unsignedBigInteger('event_id')->nullable(); // تعریف ستون event_id
            $table->foreign('event_id') // تعریف کلید خارجی
                ->references('id') // اشاره به ستون id در جدول events
                ->on('events') // جدول مرجع
                ->onDelete('set null') // اگر رکورد والد حذف شود، event_id را null می‌کند
                ->onDelete('cascade') // اگر رکورد والد حذف شود، رکورد فعلی نیز حذف می‌شود
                ->onUpdate('cascade'); // اگر id رکورد والد به‌روزرسانی شود، event_id نیز به‌روزرسانی می‌شود
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
