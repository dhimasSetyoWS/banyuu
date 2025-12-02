<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            title : "Dashboard Utama",
            header : "Dashboard"
        }, () => [page])
}
</script>
<script setup>
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>
<template>
    <div>

        <Head title="Dashboard Utama" />
        <div
            class="bg-gradient-to-r from-brand-900 to-brand-700 rounded-2xl p-8 text-white relative overflow-hidden shadow-lg mb-3">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl -mr-16 -mt-16">
            </div>
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-2">Selamat Datang Kembali, {{ user.name }}!</h2>
                <p class="text-brand-100 max-w-xl mb-6">Kamu memiliki 2 kuis (Assessment) yang akan segera
                    berakhir minggu ini. Jangan lupa cek forum pertanyaan.</p>
                <div class="flex gap-3">
                    <button
                        class="px-5 py-2.5 bg-white text-brand-900 text-sm font-bold rounded-full hover:bg-brand-50 transition">Lihat
                        Assessment</button>
                    <button
                        class="px-5 py-2.5 bg-brand-800 text-white border border-brand-600 text-sm font-bold rounded-full hover:bg-brand-700 transition">Buat
                        Pertanyaan Baru</button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">

                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Lanjutkan Belajar
                        </h3>
                        <a href="#" class="text-sm text-brand-600 font-medium hover:underline">Lihat Semua
                            Kelas</a>
                    </div>

                    <div
                        class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm flex gap-5 hover:border-brand-300 transition group cursor-pointer">
                        <div class="w-32 h-24 rounded-lg bg-slate-200 overflow-hidden flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="flex-1 flex flex-col justify-center">
                            <h4 class="font-bold text-slate-900 text-lg mb-1 group-hover:text-brand-600 transition">
                                Full Stack Web Developer</h4>
                            <p class="text-sm text-slate-500 mb-3">Modul 5: Database Relasional dengan SQL</p>
                            <div class="w-full bg-slate-100 rounded-full h-2">
                                <div class="bg-brand-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <button
                                class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-600 hover:bg-brand-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm h-full">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                Pertanyaan Terbaru
                            </h3>
                            <a href="#" class="text-xs text-brand-600 font-medium hover:underline">Ke Forum</a>
                        </div>
                        <div class="space-y-4">
                            <div class="pb-3 border-b border-slate-50 last:border-0 last:pb-0">
                                <a href="#"
                                    class="font-semibold text-slate-800 hover:text-brand-600 text-sm line-clamp-1 mb-1">Error
                                    saat install Tailwind di Vue 3?</a>
                                <div class="flex items-center gap-2 text-xs text-slate-400">
                                    <span>Oleh: Andi</span> • <span>2 Balasan</span>
                                </div>
                            </div>
                            <div class="pb-3 border-b border-slate-50 last:border-0 last:pb-0">
                                <a href="#"
                                    class="font-semibold text-slate-800 hover:text-brand-600 text-sm line-clamp-1 mb-1">Rekomendasi
                                    hosting murah untuk mahasiswa</a>
                                <div class="flex items-center gap-2 text-xs text-slate-400">
                                    <span>Oleh: Siti</span> • <span>5 Balasan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm h-full">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-teal-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                Artikel Pilihan
                            </h3>
                            <a href="#" class="text-xs text-brand-600 font-medium hover:underline">Semua
                                Artikel</a>
                        </div>
                        <div class="space-y-4">
                            <a href="#" class="flex gap-3 group">
                                <div class="w-16 h-16 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4
                                        class="text-sm font-bold text-slate-800 group-hover:text-brand-600 line-clamp-2 leading-snug mb-1">
                                        Cara Mengatur Waktu Belajar Coding yang Efektif</h4>
                                    <p class="text-xs text-slate-400">5 Menit baca</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-6">

                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        Assessment Aktif
                    </h3>

                    <div class="space-y-4">
                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs font-bold bg-red-100 text-red-600 px-2 py-0.5 rounded">Quiz</span>
                                <span class="text-xs text-slate-500">Deadline: Besok</span>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Dasar Algoritma & Logika</h4>
                            <p class="text-xs text-slate-500 mb-3">20 Soal Pilihan Ganda</p>
                            <button
                                class="w-full py-2 bg-white border border-slate-300 rounded-lg text-xs font-bold text-slate-700 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition">Mulai
                                Kerjakan</button>
                        </div>

                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-xs font-bold bg-blue-100 text-blue-600 px-2 py-0.5 rounded">Tugas</span>
                                <span class="text-xs text-slate-500">Deadline: 3 Hari</span>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Wireframe Design Landing Page</h4>
                            <p class="text-xs text-slate-500 mb-3">Upload File .fig</p>
                            <button
                                class="w-full py-2 bg-white border border-slate-300 rounded-lg text-xs font-bold text-slate-700 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition">Upload
                                Tugas</button>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-2xl p-6 text-white shadow-lg">
                    <h3 class="font-bold text-lg mb-4">Statistik Belajar</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs text-slate-400 mb-1">
                                <span>Kelas Selesai</span>
                                <span>2/5</span>
                            </div>
                            <div class="w-full bg-slate-700 rounded-full h-1.5">
                                <div class="bg-green-500 h-1.5 rounded-full" style="width: 40%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs text-slate-400 mb-1">
                                <span>Assessment Score (Rata-rata)</span>
                                <span>85</span>
                            </div>
                            <div class="w-full bg-slate-700 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>
