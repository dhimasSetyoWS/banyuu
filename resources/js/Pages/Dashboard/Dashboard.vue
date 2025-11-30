<template>

    <body class="flex h-screen overflow-hidden">

        <aside class="hidden md:flex w-64 flex-col bg-white border-r border-slate-200 h-full">
            <div class="h-20 flex items-center px-8 border-b border-slate-100">
                <a href="index.html" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center text-white font-bold">E
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">EduLarn.</span>
                </a>
            </div>

            <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-brand-50 text-brand-700 rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Kelas Saya
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Jadwal Belajar
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Sertifikat
                </a>

                <div class="pt-6">
                    <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Pengaturan</p>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profil Akun
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </a>
                </div>
            </div>

            <div class="p-4 border-t border-slate-200">
                <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 cursor-pointer transition">
                    <img src="https://i.pravatar.cc/100?img=11" class="w-10 h-10 rounded-full border border-slate-200">
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-slate-900 truncate">Rizky Pratama</p>
                        <p class="text-xs text-slate-500 truncate">Siswa Pro</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-full relative overflow-y-auto">

            <header
                class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <button class="md:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-xl font-bold text-slate-900 hidden sm:block">Selamat Pagi, Rizky! 👋</h1>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari materi..."
                            class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 w-64">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full relative">
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
            </header>

            <div class="p-6 md:p-8 max-w-7xl mx-auto w-full space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">Kelas Aktif</p>
                            <p class="text-2xl font-bold text-slate-900">4 Kelas</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">Selesai</p>
                            <p class="text-2xl font-bold text-slate-900">12 Modul</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">Waktu Belajar</p>
                            <p class="text-2xl font-bold text-slate-900">24 Jam</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">
                        <h2 class="text-lg font-bold text-slate-900">Lanjutkan Belajar</h2>

                        <div
                            class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col md:flex-row gap-6 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-brand-50 rounded-bl-full -mr-8 -mt-8 z-0">
                            </div>

                            <div
                                class="w-full md:w-48 h-32 rounded-xl bg-slate-200 overflow-hidden flex-shrink-0 z-10 relative">
                                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                    class="w-full h-full object-cover">
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/10 transition">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg cursor-pointer hover:scale-110 transition">
                                        <svg class="w-4 h-4 text-brand-600 ml-0.5" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1 z-10 flex flex-col justify-center">
                                <div class="text-xs font-semibold text-brand-600 mb-2 uppercase tracking-wide">Terakhir
                                    Diakses</div>
                                <h3 class="text-xl font-bold text-slate-900 mb-2">Full Stack Web Developer</h3>
                                <p class="text-sm text-slate-500 mb-4">Modul 4: Memahami Flexbox dan Grid System</p>

                                <div class="w-full">
                                    <div class="flex justify-between text-xs font-medium text-slate-500 mb-1">
                                        <span>Progres Kelas</span>
                                        <span class="text-brand-600">35%</span>
                                    </div>
                                    <div class="w-full bg-slate-100 rounded-full h-2.5">
                                        <div class="bg-brand-600 h-2.5 rounded-full" style="width: 35%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900 pt-4">Kelas Lainnya</h3>
                        <div class="space-y-4">

                            <div
                                class="bg-white p-4 rounded-xl border border-slate-200 hover:border-brand-300 transition flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="w-16 h-16 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-900 text-sm">UI/UX Design Masterclass</h4>
                                    <p class="text-xs text-slate-500 mb-2">Modul 2: Teori Warna</p>
                                    <div class="w-full bg-slate-100 rounded-full h-1.5 max-w-[200px]">
                                        <div class="bg-purple-600 h-1.5 rounded-full" style="width: 15%"></div>
                                    </div>
                                </div>
                                <button
                                    class="px-4 py-2 text-xs font-bold text-slate-700 bg-slate-50 border border-slate-200 rounded-lg hover:bg-white hover:text-brand-600 transition">Lanjut</button>
                            </div>

                            <div
                                class="bg-white p-4 rounded-xl border border-slate-200 hover:border-brand-300 transition flex items-center gap-4">
                                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="w-16 h-16 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-900 text-sm">Digital Marketing 101</h4>
                                    <p class="text-xs text-slate-500 mb-2">Modul 8: SEO Dasar</p>
                                    <div class="w-full bg-slate-100 rounded-full h-1.5 max-w-[200px]">
                                        <div class="bg-orange-600 h-1.5 rounded-full" style="width: 60%"></div>
                                    </div>
                                </div>
                                <button
                                    class="px-4 py-2 text-xs font-bold text-slate-700 bg-slate-50 border border-slate-200 rounded-lg hover:bg-white hover:text-brand-600 transition">Lanjut</button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">

                        <div class="bg-slate-900 rounded-2xl p-6 text-white shadow-lg">
                            <h3 class="font-bold text-lg mb-4">Target Harian</h3>
                            <div class="flex items-center justify-center py-4">
                                <div class="relative w-32 h-32">
                                    <svg class="w-full h-full transform -rotate-90">
                                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                                            fill="transparent" class="text-slate-700" />
                                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                                            fill="transparent" stroke-dasharray="351.86" stroke-dashoffset="100"
                                            class="text-brand-500" stroke-linecap="round" />
                                    </svg>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                                        <span class="text-3xl font-bold">75%</span>
                                        <span class="text-xs text-slate-400">Selesai</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center text-sm text-slate-300 mb-4">Semangat! Tinggal 1 materi lagi untuk
                                mencapai target hari ini.</p>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-bold text-slate-900">Jadwal Live</h3>
                                <a href="#" class="text-xs text-brand-600 font-medium hover:underline">Lihat Semua</a>
                            </div>
                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div
                                        class="flex-col flex items-center justify-center w-12 bg-slate-50 rounded-lg border border-slate-100 p-1">
                                        <span class="text-xs font-bold text-slate-400">OKT</span>
                                        <span class="text-lg font-bold text-slate-900">24</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">Q&A Web Development</p>
                                        <p class="text-xs text-slate-500">19:00 WIB • Zoom</p>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div
                                        class="flex-col flex items-center justify-center w-12 bg-slate-50 rounded-lg border border-slate-100 p-1">
                                        <span class="text-xs font-bold text-slate-400">OKT</span>
                                        <span class="text-lg font-bold text-slate-900">28</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">Review Portofolio UI/UX</p>
                                        <p class="text-xs text-slate-500">15:00 WIB • Google Meet</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </main>
    </body>

</template>
