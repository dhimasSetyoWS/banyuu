<template>

    <body class="bg-white text-slate-800 antialiased selection:bg-brand-100 selection:text-brand-900">

        <nav
            class="fixed w-full z-50 top-0 bg-white/80 backdrop-blur-md border-b border-slate-100 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                        <img src="img/banuacourse-icon.png" alt="" width="120">
                    </div>

                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="#" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Kelas</a>
                        <a href="#"
                            class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Mentor</a>
                        <a href="#"
                            class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Testimoni</a>
                        <a href="#" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Biaya</a>
                    </div>

                    <div class="hidden md:flex items-center gap-4">
                        <a href="#" class="text-sm font-medium text-slate-600 hover:text-brand-600">Masuk</a>
                        <a href="#"
                            class="px-5 py-2.5 text-sm font-medium bg-brand-600 text-white rounded-full hover:bg-brand-900 transition shadow-lg shadow-brand-600/20">Daftar
                            Gratis</a>
                    </div>

                    <div class="md:hidden flex items-center">
                        <button class="text-slate-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">

                    <div class="max-w-2xl">
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full border border-brand-100 bg-brand-50 text-brand-600 text-xs font-semibold mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-brand-600 mr-2"></span>
                            Platform Belajar #1 di Indonesia
                        </div>
                        <h1 class="text-4xl lg:text-6xl font-bold tracking-tight text-slate-900 leading-[1.15] mb-6">
                            Investasi Terbaik Adalah <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-purple-600">Pendidikanmu.</span>
                        </h1>
                        <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg">
                            Akses ribuan materi pelajaran dari mentor ahli. Tingkatkan skill akademik dan non-akademik
                            kamu dengan metode yang fleksibel.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#"
                                class="inline-flex justify-center items-center px-8 py-3.5 text-base font-semibold text-white bg-slate-900 rounded-full hover:bg-slate-800 transition shadow-xl shadow-slate-900/10">
                                Mulai Belajar
                            </a>
                            <a href="#"
                                class="inline-flex justify-center items-center px-8 py-3.5 text-base font-medium text-slate-700 bg-white border border-slate-200 rounded-full hover:bg-slate-50 transition">
                                Lihat Silabus
                            </a>
                        </div>

                        <div class="mt-10 flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex -space-x-3">
                                <img class="w-10 h-10 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=1" alt="User">
                                <img class="w-10 h-10 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=5" alt="User">
                                <img class="w-10 h-10 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=8" alt="User">
                                <div
                                    class="w-10 h-10 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-600">
                                    +2k</div>
                            </div>
                            <p>Siswa telah bergabung.</p>
                        </div>
                    </div>

                    <div class="relative lg:ml-auto">
                        <div
                            class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-brand-100 rounded-full blur-3xl opacity-50">
                        </div>

                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-slate-100">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Students learning"
                                class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        </div>

                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-slate-50 max-w-xs animate-bounce"
                            style="animation-duration: 3s;">
                            <div class="flex items-center gap-3">
                                <div class="bg-green-100 p-2 rounded-lg text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-medium">Status</p>
                                    <p class="text-sm font-bold text-slate-900">Kelas Selesai!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-y border-slate-100 bg-gradient-to-r from-brand-600 to-purple-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                    <div>
                        <p class="text-3xl font-bold">120+</p>
                        <p class="text-sm text-slate-800 mt-1">Kelas Online</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">50+</p>
                        <p class="text-sm text-slate-800 mt-1">Mentor Ahli</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">15k</p>
                        <p class="text-sm text-slate-800 mt-1">Alumni</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">4.9</p>
                        <p class="text-sm text-slate-800 mt-1">Rating Rata-rata</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-4">Kelas Populer</h2>
                        <p class="text-slate-500 max-w-md">Pilih jalur belajar yang sesuai dengan minatmu. Materi
                            disusun sistematis untuk pemula hingga mahir.</p>
                    </div>
                    <a href="#"
                        class="hidden md:inline-flex items-center text-brand-600 font-semibold hover:text-brand-900 transition mt-4 md:mt-0">
                        Lihat Semua Kelas
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden cursor-pointer">
                        <div class="h-48 overflow-hidden bg-slate-200 relative">
                            <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Course"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-brand-600">
                                Programming</div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3 text-xs font-medium text-slate-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    4.8 (120 Review)
                                </span>
                                <span>•</span>
                                <span>12 Modul</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-brand-600 transition">Full
                                Stack Web Developer</h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">Pelajari HTML, CSS, Javascript hingga
                                React dan Node.js dari nol sampai mahir.</p>

                            <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/100?img=11" alt="Mentor"
                                        class="w-8 h-8 rounded-full">
                                    <span class="text-sm font-medium text-slate-700">Rizky Dev</span>
                                </div>
                                <span class="text-lg font-bold text-brand-600">Rp 250k</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden cursor-pointer">
                        <div class="h-48 overflow-hidden bg-slate-200 relative">
                            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Course"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-purple-600">
                                Design</div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3 text-xs font-medium text-slate-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    4.9 (85 Review)
                                </span>
                                <span>•</span>
                                <span>8 Modul</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-brand-600 transition">
                                UI/UX Design Masterclass</h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">Kuasai Figma, teori warna, dan prinsip
                                desain user interface modern.</p>

                            <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/100?img=5" alt="Mentor"
                                        class="w-8 h-8 rounded-full">
                                    <span class="text-sm font-medium text-slate-700">Sarah Art</span>
                                </div>
                                <span class="text-lg font-bold text-brand-600">Rp 199k</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden cursor-pointer">
                        <div class="h-48 overflow-hidden bg-slate-200 relative">
                            <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Course"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-orange-600">
                                Marketing</div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3 text-xs font-medium text-slate-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    4.7 (200 Review)
                                </span>
                                <span>•</span>
                                <span>15 Modul</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-brand-600 transition">
                                Digital Marketing 101</h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">Strategi SEO, SEM, dan Social Media
                                Marketing untuk pemula.</p>

                            <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-2">
                                    <img src="https://i.pravatar.cc/100?img=3" alt="Mentor"
                                        class="w-8 h-8 rounded-full">
                                    <span class="text-sm font-medium text-slate-700">Budi Mark</span>
                                </div>
                                <span class="text-lg font-bold text-brand-600">Rp 150k</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center md:hidden">
                    <a href="#"
                        class="inline-flex items-center text-brand-600 font-semibold hover:text-brand-900 transition">
                        Lihat Semua Kelas
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-slate-900 text-white rounded-t-[3rem] mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold mb-4">Kenapa Memilih EduLarn?</h2>
                    <p class="text-slate-400">Kami fokus pada pengalaman belajar yang efektif dan menyenangkan.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    <div class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:bg-slate-750 transition">
                        <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Akses Seumur Hidup</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Sekali bayar, akses materi selamanya. Pelajari
                            kapanpun kamu punya waktu luang.</p>
                    </div>

                    <div class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:bg-slate-750 transition">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Sertifikat Resmi</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Dapatkan sertifikat kompetensi setelah
                            menyelesaikan kelas untuk portofolio kamu.</p>
                    </div>

                    <div class="p-6 bg-slate-800 rounded-2xl border border-slate-700 hover:bg-slate-750 transition">
                        <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Grup Komunitas</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Bergabung dengan grup diskusi untuk bertanya
                            langsung kepada mentor dan sesama siswa.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-1">
                        <div class="flex items-center gap-2 mb-4">
                            <div
                                class="w-6 h-6 bg-brand-600 rounded flex items-center justify-center text-white font-bold text-xs">
                                E</div>
                            <span class="font-bold text-lg text-white">EduLarn.</span>
                        </div>
                        <p class="text-sm text-slate-500">Platform belajar online terpercaya untuk masa depan yang lebih
                            cerah.</p>
                    </div>

                    <div>
                        <h4 class="text-white font-semibold mb-4">Kategori</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white transition">Web Development</a></li>
                            <li><a href="#" class="hover:text-white transition">UI/UX Design</a></li>
                            <li><a href="#" class="hover:text-white transition">Data Science</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-white font-semibold mb-4">Perusahaan</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white transition">Karir</a></li>
                            <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-white font-semibold mb-4">Berlangganan</h4>
                        <form class="flex gap-2">
                            <input type="email" placeholder="Email kamu..."
                                class="bg-slate-800 border-none rounded-lg px-4 py-2 text-sm w-full focus:ring-1 focus:ring-brand-600">
                            <button
                                class="bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-700 transition">Kirim</button>
                        </form>
                    </div>
                </div>
                <div class="border-t border-slate-800 mt-12 pt-8 text-center text-xs text-slate-600">
                    &copy; 2023 EduLarn Inc. All rights reserved.
                </div>
            </div>
        </footer>

    </body>
</template>


