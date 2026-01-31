<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Kategori;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kategoris = Kategori::all();
        return Inertia::render('Dashboard/Teacher/Class/CreateClass', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // 1. Validasi Input
        // Pastikan nama tabel di rule 'exists' sesuai database kamu
        $validated = $request->validate([
            'title_course' => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',

            // Cek ke tabel 'kategori', kolom 'id'
            'kategori_id'  => 'required|exists:kategori,id',
        ]);

        // 2. Generate Slug Unik
        // Kita tambahkan random string 5 karakter di belakang agar tidak bentrok
        // Contoh: "Belajar Laravel" -> "belajar-laravel-x7z9a"
        $slug = Str::slug($validated['title_course']) . '-' . Str::lower(Str::random(5));

        // 3. Simpan ke Database
        Course::create([
            'title_course' => $validated['title_course'],
            'slug'         => $slug,
            'description'  => $validated['description'],
            'price'        => $validated['price'],
            'kategori_id'  => $validated['kategori_id'],
            'user_id'      => auth()->user()->id, // Ambil ID user yang sedang login
        ]);

        // 4. Redirect dengan Flash Message (untuk notifikasi di Vue)
        return redirect()->route('teacher.dashboard.class.index')
            ->with('success', 'Kursus berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        return Inertia::render('Dashboard/Teacher/Class/EditClass', [
            "course" => $course,
            "kategoris" => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        // Validasi Input
        $validated = $request->validate([
            'title_course' => 'required|string|max:255',

            // PENTING: Rule unique harus meng-ignore ID kursus ini ($id)
            // Format: unique:nama_tabel,nama_kolom,id_yang_di_ignore
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,

            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Lakukan Update
        // Karena nama field form sama persis dengan kolom database, bisa langsung begini:
        $course->update($validated);

        // Redirect kembali ke halaman list/index dengan pesan sukses
        // Pastikan nama route redirect-nya sesuai dengan route list kelas kamu
        return redirect()->route('teacher.dashboard.class.index')
            ->with('success', 'Kursus berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        $course->delete();
        return redirect()->route('teacher.dashboard.class.index')
            ->with('success', 'Kursus berhasil dihapus secara permanen.');
    }

    // Edit Material
    public function edit_material() {
        Log::debug("TESTING");
        return Inertia::render('Dashboard/Teacher/Class/EditMaterial');
    }
}
