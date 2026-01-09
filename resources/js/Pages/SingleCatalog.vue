<script setup>
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
</script>
<template>
    <Navbar/>
    <header class="pt-32 pb-12 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex text-sm text-slate-400 mb-6 gap-2">
                <a href="#" class="hover:text-white">Development</a>
                <span>/</span>
                <a href="#" class="hover:text-white">Web Programming</a>
                <span>/</span>
                <span class="text-white font-medium">Full Stack</span>
            </nav>

            <div class="grid lg:grid-cols-3 gap-12 items-end">
                <div class="lg:col-span-2">
                    <h1 class="text-3xl md:text-5xl font-bold mb-6 leading-tight">
                        Bootcamp Full Stack Web Developer: <br>
                        <span class="text-brand-100">Menjadi Programmer Handal dalam 3 Bulan</span>
                    </h1>
                    <p class="text-lg text-slate-300 mb-8 leading-relaxed max-w-2xl">
                        Kuasai HTML, CSS, JavaScript, React, dan NodeJS. Bangun portofolio nyata dan dapatkan bimbingan
                        karir hingga direkrut kerja.
                    </p>

                    <div class="flex flex-wrap items-center gap-6 text-sm">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/100?img=33"
                                class="w-10 h-10 rounded-full border-2 border-slate-700">
                            <div>
                                <p class="text-slate-400 text-xs">Mentor Utama</p>
                                <p class="font-bold text-white">Sandhika Galih</p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-1 bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-700">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="font-bold">4.9</span>
                            <span class="text-slate-400">(2,102 Ulasan)</span>
                        </div>

                        <div class="flex items-center gap-2 text-slate-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Terakhir diupdate: Oktober 2025
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-12">

                <div
                    class="relative rounded-2xl overflow-hidden aspect-video bg-slate-100 group cursor-pointer shadow-lg border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                    <div
                        class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition flex items-center justify-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/50 group-hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>
                    </div>
                    <span
                        class="absolute bottom-4 left-4 bg-black/60 text-white text-xs px-3 py-1 rounded-full font-medium">Tonton
                        Preview Materi</span>
                </div>

                <div class="border-b border-slate-200">
                    <nav class="flex space-x-8">
                        <a href="#tentang"
                            class="border-b-2 border-brand-600 py-4 text-sm font-bold text-brand-600">Tentang Kelas</a>
                        <a href="#kurikulum"
                            class="border-b-2 border-transparent py-4 text-sm font-medium text-slate-500 hover:text-slate-800 transition">Kurikulum</a>
                        <a href="#ulasan"
                            class="border-b-2 border-transparent py-4 text-sm font-medium text-slate-500 hover:text-slate-800 transition">Ulasan</a>
                        <a href="#mentor"
                            class="border-b-2 border-transparent py-4 text-sm font-medium text-slate-500 hover:text-slate-800 transition">Mentor</a>
                    </nav>
                </div>

                <section id="tentang" class="prose prose-slate max-w-none">
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Deskripsi</h3>
                    <p class="text-slate-600 leading-relaxed mb-6">
                        Kelas ini dirancang untuk pemula mutlak yang ingin berkarir sebagai Web Developer. Anda tidak
                        memerlukan latar belakang IT. Kami akan mulai dari konsep paling dasar hingga mendeploy aplikasi
                        ke server nyata.
                    </p>

                    <h4 class="text-lg font-bold text-slate-900 mb-4">Apa yang akan Anda pelajari?</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-600 text-sm">HTML5, CSS3, dan Responsive Design</span>
                        </div>
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-600 text-sm">JavaScript Modern (ES6+) & DOM Manipulation</span>
                        </div>
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-600 text-sm">Frontend Framework: React.js & Tailwind CSS</span>
                        </div>
                        <div class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-600 text-sm">Backend API: Node.js, Express & MongoDB</span>
                        </div>
                    </div>
                </section>

                <section id="kurikulum">
                    <div class="flex justify-between items-end mb-6">
                        <h3 class="text-2xl font-bold text-slate-900">Materi Kursus</h3>
                        <span class="text-sm text-slate-500">12 Modul • 124 Video • 24j 10m Total</span>
                    </div>

                    <div class="border border-slate-200 rounded-xl divide-y divide-slate-200 overflow-hidden bg-white">

                        <details class="group" open>
                            <summary
                                class="flex justify-between items-center p-5 cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-slate-400 transform group-open:rotate-180 transition"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <span class="font-bold text-slate-900">Bagian 1: Pengenalan Web Development</span>
                                </div>
                                <span class="text-xs text-slate-500">3 Video • 15m</span>
                            </summary>
                            <div class="p-5 border-t border-slate-100">
                                <ul class="space-y-3">
                                    <li class="flex justify-between text-sm group/item">
                                        <div class="flex gap-3 items-center">
                                            <div
                                                class="w-6 h-6 rounded-full bg-brand-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-brand-600" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg></div>
                                            <span class="text-slate-700 group-hover/item:text-brand-600 transition">Cara
                                                Kerja Internet</span>
                                        </div>
                                        <a href="#" class="text-brand-600 text-xs font-bold underline">Preview</a>
                                    </li>
                                    <li class="flex justify-between text-sm">
                                        <div class="flex gap-3 items-center">
                                            <div
                                                class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-slate-500" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 17a2 2 0 100-4 2 2 0 000 4zM12 10a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg></div>
                                            <span class="text-slate-700">Install VS Code & Tools</span>
                                        </div>
                                        <span class="text-slate-400 text-xs">05:20</span>
                                    </li>
                                </ul>
                            </div>
                        </details>

                        <details class="group">
                            <summary
                                class="flex justify-between items-center p-5 cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-slate-400 transform group-open:rotate-180 transition"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <span class="font-bold text-slate-900">Bagian 2: HTML5 Dasar</span>
                                </div>
                                <span class="text-xs text-slate-500">5 Video • 45m</span>
                            </summary>
                            <div class="p-5 border-t border-slate-100">
                                <p class="text-sm text-slate-500 italic">Konten terkunci. Daftar untuk mengakses.</p>
                            </div>
                        </details>

                        <details class="group">
                            <summary
                                class="flex justify-between items-center p-5 cursor-pointer bg-slate-50 hover:bg-slate-100 transition">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-slate-400 transform group-open:rotate-180 transition"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                    <span class="font-bold text-slate-900">Bagian 3: CSS3 Styling</span>
                                </div>
                                <span class="text-xs text-slate-500">8 Video • 1j 20m</span>
                            </summary>
                            <div class="p-5 border-t border-slate-100">
                                <p class="text-sm text-slate-500 italic">Konten terkunci. Daftar untuk mengakses.</p>
                            </div>
                        </details>

                    </div>

                    <div class="mt-4 text-center">
                        <button class="text-brand-600 font-medium text-sm hover:underline">Tampilkan 9 Modul
                            Lainnya...</button>
                    </div>
                </section>

            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl overflow-hidden">

                        <div class="h-2 bg-brand-600"></div>

                        <div class="p-6 md:p-8">
                            <div class="flex items-end gap-3 mb-2">
                                <h2 class="text-4xl font-bold text-slate-900">Rp 249K</h2>
                                <span class="text-lg text-slate-400 line-through mb-1.5">Rp 799K</span>
                            </div>
                            <div class="flex items-center gap-2 mb-6">
                                <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded">DISKON
                                    70%</span>
                                <span class="text-xs text-red-600 font-medium flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Sisa 2 hari lagi!
                                </span>
                            </div>

                            <div class="space-y-3 mb-6">
                                <button
                                    class="w-full py-4 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl shadow-lg shadow-brand-600/30 transition transform hover:-translate-y-0.5">
                                    Daftar Kelas Sekarang
                                </button>
                                <p class="text-center text-xs text-slate-500">Jaminan uang kembali 30 hari</p>
                            </div>

                            <div class="space-y-4 border-t border-slate-100 pt-6">
                                <h4 class="font-bold text-slate-900 text-sm">Kelas ini mencakup:</h4>
                                <ul class="space-y-3 text-sm text-slate-600">
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        24 jam video on-demand
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        15 Artikel & Sumber Bacaan
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        20 Downloadable Resources
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Akses di Mobile & TV
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                        Sertifikat Kelulusan
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-4 border-t border-slate-100 text-center">
                            <p class="text-xs font-bold text-slate-900 mb-1">Training untuk tim?</p>
                            <a href="#" class="text-xs text-brand-600 hover:underline">Beli paket untuk perusahaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer/>
</template>
