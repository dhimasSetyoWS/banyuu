<script setup>
// Import Navbar dari component
import Navbar from '@/Components/Navbar.vue';

// Import Footer dari component
import Footer from '@/Components/Footer.vue';
</script>

<template>

    <!-- Ubah navbar jadi component -->
    <Navbar />
    <section class="pt-32 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-slate-900 tracking-tight mb-6">
                Membuka Akses Pendidikan <br>
                <span class="text-transparent bg-clip-text bg-linear-to-r from-brand-600 to-purple-600">Berkualitas
                    Untuk Semua.</span>
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-12 leading-relaxed">
                Kami percaya bahwa lokasi dan biaya tidak boleh menjadi penghalang untuk belajar. EduLarn hadir
                untuk menjembatani kesenjangan antara kurikulum akademis dan kebutuhan industri modern.
            </p>

            <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-100 aspect-21/9">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
                    alt="Team working" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-brand-900/10 mix-blend-multiply"></div>
            </div>
        </div>
    </section>

    <section class="border-y border-slate-100 bg-slate-50/50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-brand-600 mb-2">3+ Tahun</div>
                    <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Pengalaman</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-brand-600 mb-2">15.000+</div>
                    <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Siswa Aktif</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-brand-600 mb-2">120+</div>
                    <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Modul Kelas</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-brand-600 mb-2">50+</div>
                    <div class="text-sm text-slate-500 font-medium uppercase tracking-wider">Mitra Universitas</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Nilai yang Kami Pegang</h2>
                    <p class="text-slate-600 mb-10 leading-relaxed">
                        EduLarn dibangun di atas fondasi inovasi dan integritas. Kami tidak hanya menjual kursus
                        video, kami membangun ekosistem belajar yang mendukung pertumbuhan karir Anda.
                    </p>

                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div
                                class="shrink-0 w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Relevansi Industri</h3>
                                <p class="text-sm text-slate-500 leading-relaxed">Materi kami diperbarui setiap 6
                                    bulan untuk mengikuti tren teknologi terkini.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="shrink-0 w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Komunitas Inklusif</h3>
                                <p class="text-sm text-slate-500 leading-relaxed">Belajar tidak sendirian. Bergabung
                                    dengan ribuan siswa lain dan mentor yang suportif.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="shrink-0 w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">Kualitas Terjamin</h3>
                                <p class="text-sm text-slate-500 leading-relaxed">Mentor kami melalui proses kurasi
                                    ketat. Hanya praktisi terbaik yang mengajar di sini.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="absolute -top-4 -right-4 w-72 h-72 bg-brand-100 rounded-full blur-3xl opacity-50 mix-blend-multiply animate-pulse">
                    </div>
                    <div class="relative grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="rounded-2xl shadow-lg mt-12 transform hover:-translate-y-2 transition duration-500">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            class="rounded-2xl shadow-lg transform hover:-translate-y-2 transition duration-500">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Tim Kami</h2>
            <p class="text-slate-500 mb-16 max-w-2xl mx-auto">
                Dibangun oleh sekelompok profesional yang memiliki passion yang sama: Memajukan pendidikan
                Indonesia.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div
                    class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden border-4 border-brand-50">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-bold text-slate-900">Adrian Pratama</h3>
                    <p class="text-xs text-brand-600 font-semibold uppercase tracking-wide mb-3">CEO & Founder</p>
                    <p class="text-sm text-slate-500">Ex-Google Engineer dengan passion di bidang EdTech.</p>
                </div>

                <div
                    class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden border-4 border-brand-50">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-bold text-slate-900">Siti Aminah</h3>
                    <p class="text-xs text-brand-600 font-semibold uppercase tracking-wide mb-3">Head of Content</p>
                    <p class="text-sm text-slate-500">Berpengalaman 10 tahun merancang kurikulum pendidikan.</p>
                </div>

                <div
                    class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden border-4 border-brand-50">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-bold text-slate-900">Budi Santoso</h3>
                    <p class="text-xs text-brand-600 font-semibold uppercase tracking-wide mb-3">CTO</p>
                    <p class="text-sm text-slate-500">Arsitek sistem di balik platform EduLarn yang cepat.</p>
                </div>

                <div
                    class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden border-4 border-brand-50">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="font-bold text-slate-900">Diana Rose</h3>
                    <p class="text-xs text-brand-600 font-semibold uppercase tracking-wide mb-3">Community Manager
                    </p>
                    <p class="text-sm text-slate-500">Memastikan setiap siswa mendapatkan bantuan yang tepat.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-900 text-white overflow-hidden relative">
        <div class="absolute top-0 left-0 w-64 h-64 bg-brand-600 rounded-full blur-[100px] opacity-20"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-600 rounded-full blur-[100px] opacity-20"></div>

        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Mengubah Masa Depanmu?</h2>
            <p class="text-slate-400 mb-10 text-lg">Bergabunglah dengan EduLarn sekarang dan mulai perjalanan
                belajarmu dengan ribuan materi berkualitas.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="catalog.html"
                    class="px-8 py-4 bg-brand-600 hover:bg-brand-500 text-white font-bold rounded-full transition shadow-lg shadow-brand-600/30">Cari
                    Kelas Sekarang</a>
                <a href="#"
                    class="px-8 py-4 bg-transparent border border-slate-600 hover:bg-slate-800 text-white font-medium rounded-full transition">Hubungi
                    Kami</a>
            </div>
        </div>
    </section>

    <!-- Ubah footer jadi component -->
    <Footer />
</template>
