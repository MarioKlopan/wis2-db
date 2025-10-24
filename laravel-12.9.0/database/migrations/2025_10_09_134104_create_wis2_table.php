<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // NOT NULL is default

        Schema::create('course', function (Blueprint $table) {
            $table->string('shortcut', 4)->primary();
            $table->string('type', 1);
            $table->integer('price');
            $table->string('description', 400)->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('set null');
        });

        Schema::create('teach', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            // Shurtcut is an foreign key
            $table->string('shortcut', 4);
            $table->foreign('shortcut')->references('shortcut')->on('course')->cascadeOnDelete();
        });

        Schema::create('study', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            // Shurtcut is an foreign key
            $table->string('shortcut', 4);
            $table->foreign('shortcut')->references('shortcut')->on('course')->cascadeOnDelete();
        });

        Schema::create('term', function (Blueprint $table) {
            $table->unsignedBigInteger('id_term')->autoIncrement()->primary();
            $table->string('name', 100);
            $table->string('type', 1);
            $table->string('description', 400)->nullable();
            $table->integer('max_points');
            $table->dateTime('date');
            // Shurtcut is an foreign key
            $table->string('shortcut', 4);
            $table->foreign('shortcut')->references('shortcut')->on('course')->cascadeOnDelete();
        });

        Schema::create('registration', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            $table->foreignId('id_term')->constrained('term', 'id_term')->cascadeOnDelete();
            $table->integer('points_earned')->default(0);
        });

        Schema::create('room', function (Blueprint $table) {
            $table->unsignedBigInteger('id_room')->autoIncrement()->primary();
            $table->string('code', 4);
            $table->integer('capacity');
        });

        Schema::create('takes_place', function (Blueprint $table) {
            $table->foreignId('id_room')->constrained('room', 'id_room')->cascadeOnDelete();
            $table->foreignId('id_term')->constrained('term', 'id_term')->cascadeOnDelete();
        });

        Schema::create('to_approve', function (Blueprint $table) {
            $table->unsignedBigInteger('id_approve')->autoIncrement()->primary();
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
            // Shurtcut is an foreign key
            $table->string('shortcut', 4);
            $table->foreign('shortcut')->references('shortcut')->on('course')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course');
        Schema::dropIfExists('teach');
        Schema::dropIfExists('study');
        Schema::dropIfExists('term');
        Schema::dropIfExists('regisration');
        Schema::dropIfExists('room');
        Schema::dropIfExists('takes_place');
    }
};
