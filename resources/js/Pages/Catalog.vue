<template>

    <body>

        <nav class="fixed w-full z-50 top-0 bg-white/80 backdrop-blur-md border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <a href="index.html" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                        <div
                            class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center text-white font-bold">
                            E</div>
                        <span class="font-bold text-xl tracking-tight text-slate-900">EduLarn.</span>
                    </a>
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="catalog.html" class="text-sm font-medium text-brand-600">Kelas</a>
                        <a href="#"
                            class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Mentor</a>
                        <a href="#"
                            class="text-sm font-medium text-slate-600 hover:text-brand-600 transition">Testimoni</a>
                    </div>
                    <div class="hidden md:flex items-center gap-4">
                        <a href="#" class="text-sm font-medium text-slate-600 hover:text-brand-600">Masuk</a>
                        <a href="#"
                            class="px-5 py-2.5 text-sm font-medium bg-slate-900 text-white rounded-full hover:bg-slate-800 transition">Akun
                            Saya</a>
                    </div>
                    <button class="md:hidden text-slate-600"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg></button>
                </div>
            </div>
        </nav>

        <div class="pt-32 pb-12 bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-bold text-slate-900 mb-4">Eksplorasi Kelas</h1>
                    <p class="text-slate-500 mb-8">Tingkatkan skill kamu dengan kurikulum standar industri.</p>

                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-600 transition" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text"
                            class="block w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition shadow-sm"
                            placeholder="Cari kelas 'Python', 'Desain Grafis', atau 'Marketing'...">
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">

                <aside class="w-full lg:w-64 flex-shrink-0">
                    <div class="sticky top-28 space-y-8">
                        <div class="lg:hidden flex justify-between items-center mb-4">
                            <span class="font-bold text-slate-900">Filter</span>
                            <button class="text-brand-600 text-sm font-medium">Reset</button>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">Kategori</h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" checked
                                        class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Development</span>
                                    <span class="ml-auto text-xs text-slate-400">120</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox"
                                        class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Design</span>
                                    <span class="ml-auto text-xs text-slate-400">45</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox"
                                        class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Business</span>
                                    <span class="ml-auto text-xs text-slate-400">30</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox"
                                        class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Marketing</span>
                                    <span class="ml-auto text-xs text-slate-400">22</span>
                                </label>
                            </div>
                        </div>

                        <hr class="border-slate-200">

                        <div>
                            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">Tingkat Kesulitan
                            </h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level"
                                        class="w-4 h-4 border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span class="text-slate-600 group-hover:text-brand-600 transition text-sm">Semua
                                        Level</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level"
                                        class="w-4 h-4 border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Pemula</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level"
                                        class="w-4 h-4 border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Menengah</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level"
                                        class="w-4 h-4 border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-brand-600">
                                    <span
                                        class="text-slate-600 group-hover:text-brand-600 transition text-sm">Mahir</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </aside>

                <main class="flex-1">
                    <div class="flex justify-between items-center mb-6">
                        <p class="text-sm text-slate-500">Menampilkan <span class="font-bold text-slate-900">9</span>
                            dari <span class="font-bold text-slate-900">217</span> kelas</p>
                        <select
                            class="bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-brand-600 focus:border-brand-600 block p-2.5 cursor-pointer outline-none hover:border-brand-600 transition">
                            <option>Terpopuler</option>
                            <option>Terbaru</option>
                            <option>Harga Terendah</option>
                            <option>Harga Tertinggi</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <span
                                    class="absolute top-3 right-3 bg-white/90 backdrop-blur text-xs font-bold px-2 py-1 rounded text-slate-700">Premium</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-brand-600 mb-2">Development</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    Full Stack Web Developer Bootcamp 2024</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=11" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Rizky Dev</span>
                                    <span class="ml-auto text-sm font-bold text-slate-900">Rp 250k</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-purple-600 mb-2">Design</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    UI/UX Design: Dari Wireframe ke High Fidelity</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=5" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Sarah Art</span>
                                    <span class="ml-auto text-sm font-bold text-slate-900">Rp 199k</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-orange-600 mb-2">Marketing</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    Digital Marketing Mastery: Social Media Ads</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=3" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Budi Mark</span>
                                    <span class="ml-auto text-sm font-bold text-slate-900">Rp 150k</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <span
                                    class="absolute top-3 right-3 bg-brand-600 text-white text-xs font-bold px-2 py-1 rounded">Best
                                    Seller</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-brand-600 mb-2">Data Science</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    Python untuk Analisis Data Pemula</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=12" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Andi Py</span>
                                    <span class="ml-auto text-sm font-bold text-slate-900">Rp 200k</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-teal-600 mb-2">Cyber Security</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    Dasar Keamanan Jaringan & Ethical Hacking</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=8" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Mr. Robot</span>
                                    <span class="ml-auto text-sm font-bold text-green-600">Gratis</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="group bg-white rounded-xl border border-slate-200 hover:border-brand-600/30 hover:shadow-lg hover:shadow-brand-600/5 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative h-44 bg-slate-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1626785774573-4b79931433da?auto=format&fit=crop&w=600&q=80"
                                    alt="Course"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="text-xs font-semibold text-brand-600 mb-2">Development</div>
                                <h3
                                    class="font-bold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition">
                                    React Native: Bikin Aplikasi Android & iOS</h3>
                                <div class="flex items-center gap-2 mt-auto pt-4 border-t border-slate-100">
                                    <img src="https://i.pravatar.cc/100?img=9" class="w-6 h-6 rounded-full">
                                    <span class="text-xs text-slate-500 font-medium">Siska App</span>
                                    <span class="ml-auto text-sm font-bold text-slate-900">Rp 300k</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-12 flex justify-center">
                        <nav class="flex items-center gap-1">
                            <a href="#"
                                class="px-4 py-2 border border-slate-200 rounded-lg text-slate-500 hover:bg-slate-50 text-sm font-medium transition">Prev</a>
                            <a href="#"
                                class="px-4 py-2 bg-brand-600 border border-brand-600 rounded-lg text-white text-sm font-medium shadow-md shadow-brand-600/20">1</a>
                            <a href="#"
                                class="px-4 py-2 border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 text-sm font-medium transition">2</a>
                            <a href="#"
                                class="px-4 py-2 border border-slate-200 rounded-lg text-slate-600 hover:bg-slate-50 text-sm font-medium transition">3</a>
                            <span class="px-2 text-slate-400">...</span>
                            <a href="#"
                                class="px-4 py-2 border border-slate-200 rounded-lg text-slate-500 hover:bg-slate-50 text-sm font-medium transition">Next</a>
                        </nav>
                    </div>

                </main>
            </div>
        </div>

        <footer class="bg-slate-900 text-slate-400 py-8 mt-12 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 text-center text-sm">
                &copy; 2024 EduLarn. All rights reserved.
            </div>
        </footer>

    </body>

</template>
