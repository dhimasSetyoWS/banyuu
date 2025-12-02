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
        Schema::create('course_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title'); // Contoh: "Sesi 1: Pengenalan Laravel"
            $table->text('description')->nullable();
            $table->integer('order')->default(0); // Urutan sesi
            $table->timestamps();
        });

        // 2. Tabel MATERIALS (Materi Belajar: Video/PDF/Artikel)
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_session_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->enum('type', ['video', 'pdf', 'text']);
            $table->text('content')->nullable(); // Bisa URL video atau Text artikel
            $table->string('file_path')->nullable(); // Jika PDF
            $table->integer('duration_minutes')->nullable(); // Estimasi waktu
            $table->timestamps();
        });

        // 3. Tabel ASSIGNMENTS (Tugas Upload)
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_session_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
        });

        // 4. Tabel EXAMS (Kuis/Ujian)
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_session_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('duration_minutes'); // Durasi pengerjaan
            $table->integer('passing_score'); // KKM
            $table->timestamps();
        });

        // 5. Tabel PROJECTS (Proyek Besar)
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_session_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('brief'); // Penjelasan proyek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_structures');
    }
};
