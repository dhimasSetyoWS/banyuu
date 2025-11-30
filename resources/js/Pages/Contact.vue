<script setup>
// Import Navbar dari component
import Navbar from '@/Components/Navbar.vue';

// Import Footer dari component
import Footer from '@/Components/Footer.vue';
</script>
<template>
    <!-- Ubah navbar jadi component -->
    <Navbar />
    <div class="pt-32 pb-12 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4">Kami Siap Membantu</h1>
            <p class="text-slate-500 max-w-xl mx-auto text-lg">
                Punya pertanyaan seputar materi, pembayaran, atau kemitraan? Kirimkan pesan, tim kami akan membalas
                dalam 1x24 jam.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">

            <div class="lg:col-span-1 space-y-8">

                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-900 mb-6 text-lg">Kantor Pusat</h3>

                    <div class="space-y-6">
                        <div class="flex gap-4 items-start">
                            <div
                                class="w-10 h-10 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">EduLarn HQ</p>
                                <p class="text-sm text-slate-500 leading-relaxed mt-1">
                                    Jl. Pendidikan No. 123, <br>Jakarta Selatan, Indonesia 12430
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div
                                class="w-10 h-10 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Email</p>
                                <a href="mailto:support@edularn.id"
                                    class="text-sm text-slate-500 hover:text-brand-600 transition">support@edularn.id</a>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div
                                class="w-10 h-10 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Telepon</p>
                                <p class="text-sm text-slate-500">+62 21 555 0199</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-slate-100 flex gap-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-slate-900 hover:border-slate-900 transition"><svg
                                class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg></a>
                        <a href="#"
                            class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 hover:text-white hover:bg-slate-900 hover:border-slate-900 transition"><svg
                                class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg></a>
                    </div>
                </div>

                <div
                    class="h-64 bg-slate-200 rounded-2xl overflow-hidden border border-slate-200 shadow-sm relative group cursor-pointer">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2965613862283!2d106.80211757499039!3d-6.224571993763486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d76472659%3A0x8670189467771746!2sGelora%20Bung%20Karno!5e0!3m2!1sen!2sid!4v1709199999999!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="map-grayscale"></iframe>
                </div>

            </div>

            <div class="lg:col-span-2">
                <div class="bg-white p-8 md:p-10 rounded-2xl border border-slate-200 shadow-lg shadow-slate-200/50">
                    <h3 class="font-bold text-slate-900 text-2xl mb-6">Kirim Pesan</h3>

                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Nama Depan</label>
                                <input type="text" placeholder="Cth. Rizky"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700">Nama Belakang</label>
                                <input type="text" placeholder="Cth. Pratama"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Email</label>
                            <input type="email" placeholder="nama@email.com"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Subjek</label>
                            <select
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition text-slate-600">
                                <option>Tanya tentang Kelas</option>
                                <option>Masalah Pembayaran</option>
                                <option>Kerjasama / Partnership</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Pesan</label>
                            <textarea rows="5" placeholder="Tuliskan detail pertanyaanmu di sini..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 transition"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="button"
                                class="w-full md:w-auto px-8 py-3.5 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 transition shadow-lg shadow-slate-900/10 flex items-center justify-center gap-2">
                                Kirim Pesan
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="border-t border-slate-200 bg-white py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-slate-900 text-center mb-10">Pertanyaan yang Sering Diajukan</h2>

            <div class="space-y-4">
                <details
                    class="group bg-slate-50 border border-slate-200 rounded-xl overflow-hidden open:bg-white open:shadow-md transition-all duration-300">
                    <summary
                        class="flex justify-between items-center font-medium cursor-pointer list-none p-5 text-slate-900">
                        <span>Apakah sertifikat di EduLarn diakui perusahaan?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                width="24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 p-5 pt-0 text-sm leading-relaxed">
                        Ya, sertifikat kami dilengkapi ID verifikasi unik. Kurikulum kami juga disusun bersama
                        praktisi industri terkemuka.
                    </div>
                </details>

                <details
                    class="group bg-slate-50 border border-slate-200 rounded-xl overflow-hidden open:bg-white open:shadow-md transition-all duration-300">
                    <summary
                        class="flex justify-between items-center font-medium cursor-pointer list-none p-5 text-slate-900">
                        <span>Bagaimana jika saya mengalami kendala saat pembayaran?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                width="24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 p-5 pt-0 text-sm leading-relaxed">
                        Sistem kami memverifikasi pembayaran otomatis dalam 5-10 menit. Jika lebih dari itu, silakan
                        kirim bukti transfer melalui formulir di atas dengan subjek "Masalah Pembayaran".
                    </div>
                </details>

                <details
                    class="group bg-slate-50 border border-slate-200 rounded-xl overflow-hidden open:bg-white open:shadow-md transition-all duration-300">
                    <summary
                        class="flex justify-between items-center font-medium cursor-pointer list-none p-5 text-slate-900">
                        <span>Apakah materi bisa diakses selamanya?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                                width="24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </summary>
                    <div class="text-slate-600 p-5 pt-0 text-sm leading-relaxed">
                        Benar! Sekali Anda membeli kelas (bukan langganan bulanan), materi tersebut menjadi milik
                        Anda selamanya, termasuk update materi di masa depan.
                    </div>
                </details>
            </div>
        </div>
    </section>
    <!-- Ubah footer jadi component -->
    <Footer />

</template>

<style scoped>
/* Styling untuk Peta Hitam Putih (Minimalis) */
.map-grayscale {
    filter: grayscale(100%) contrast(1.2) brightness(0.9);
    transition: filter 0.3s ease;
}

.map-grayscale:hover {
    filter: grayscale(0%);
}

/* Accordion Style (FAQ) */
details>summary {
    list-style: none;
}

details>summary::-webkit-details-marker {
    display: none;
}
</style>
