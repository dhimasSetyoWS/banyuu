<template>
    <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="img/banuacourse-icon-title.png" alt="banua-kursus">
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
                &copy; 2025 Banua Kursus. All rights reserved.
            </div>
        </div>
    </footer>
</template>
