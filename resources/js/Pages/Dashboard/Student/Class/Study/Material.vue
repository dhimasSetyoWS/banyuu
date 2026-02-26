<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Materi Belajar' }, () => [page])
}
</script>

<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {
    ChevronLeftIcon,
    ChatBubbleLeftRightIcon,
    UserCircleIcon,
    ClockIcon,
    CalendarIcon,
    PaperAirplaneIcon,
    ShareIcon,
    BookmarkIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY MATERI ---
const material = {
    title: "Memahami Box Model pada CSS",
    subject: "Web Development",
    author: "Budi Santoso, S.Kom",
    date: "20 Okt 2024",
    read_time: "10 Menit Baca",
    // Isi artikel (biasanya dari database dalam format HTML)
    body: `
        <p>CSS Box Model adalah fondasi utama dalam tata letak (layout) web. Setiap elemen yang Anda lihat pada halaman HTML sebenarnya dibungkus dalam sebuah kotak (box) persegi panjang.</p>

        <h3>Komponen Box Model</h3>
        <p>Ada empat bagian utama yang membentuk Box Model:</p>
        <ul>
            <li><strong>Content:</strong> Area tempat teks atau gambar muncul.</li>
            <li><strong>Padding:</strong> Ruang transparan di sekitar konten (di dalam border).</li>
            <li><strong>Border:</strong> Garis yang mengelilingi padding dan konten.</li>
            <li><strong>Margin:</strong> Ruang transparan di luar border (memisahkan elemen satu dengan lainnya).</li>
        </ul>

        <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&q=80&w=1000" alt="Coding Image" class="rounded-2xl my-6 shadow-sm" />

        <h3>Pentingnya Memahami Box Model</h3>
        <p>Tanpa memahami cara kerja padding dan margin, Anda akan kesulitan mengatur jarak antar elemen secara akurat. Misalnya, properti <code>box-sizing: border-box;</code> sering digunakan untuk memudahkan perhitungan lebar total elemen agar tidak terpengaruh oleh padding.</p>
    `
};

// --- LOGIC KOMENTAR ---
const comments = ref([
    {
        id: 1,
        user: "Andi Wijaya",
        date: "2 Jam yang lalu",
        text: "Terima kasih materinya pak! Sekarang saya paham bedanya margin dan padding.",
        replies: []
    },
    {
        id: 2,
        user: "Siti Fatimah",
        date: "5 Jam yang lalu",
        text: "Pak, kalau mau buat border-radius tapi hanya di sudut kanan atas saja bagaimana ya?",
        replies: [
            { id: 21, user: "Budi Santoso (Instructor)", text: "Halo Siti, kamu bisa pakai properti border-top-right-radius: 10px;", date: "1 Jam yang lalu" }
        ]
    }
]);

const commentForm = useForm({
    message: ''
});

const submitComment = () => {
    if (!commentForm.message.trim()) return;

    // Simulasi tambah komentar
    comments.value.unshift({
        id: Date.now(),
        user: "Saya (Student)",
        date: "Baru saja",
        text: commentForm.message,
        replies: []
    });

    commentForm.reset();
    alert("Komentar/Pertanyaan dikirim!");
};
</script>

<template>

    <Head :title="material.title" />

    <div class="max-w-4xl mx-auto pb-20 px-4 sm:px-6">

        <nav class="flex mb-8 items-center gap-2 text-sm font-medium text-slate-500">
            <Link :href="route('dashboard.class.study.show')" class="hover:text-indigo-600 transition flex items-center">
                <ChevronLeftIcon class="w-4 h-4"/>
                Kembali ke sesi
            </Link>
        </nav>

        <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden mb-10">

            <div class="p-6 md:p-10 border-b border-slate-100">
                <div class="flex items-center gap-2 mb-4 text-indigo-600 font-bold text-xs uppercase tracking-widest">
                    <span class="bg-indigo-50 px-3 py-1 rounded-full">{{ material.subject }}</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6">
                    {{ material.title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-sm text-slate-500">
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold">
                            B</div>
                        <span class="font-semibold text-slate-700">{{ material.author }}</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <CalendarIcon class="w-4 h-4" /> {{ material.date }}
                    </div>
                    <div class="flex items-center gap-1.5">
                        <ClockIcon class="w-4 h-4" /> {{ material.read_time }}
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-10">
                <div class="prose prose-slate prose-lg max-w-none
                    prose-headings:font-bold prose-headings:text-slate-900
                    prose-p:text-slate-600 prose-p:leading-relaxed
                    prose-strong:text-slate-800
                    prose-code:text-indigo-600 prose-code:bg-indigo-50 prose-code:px-1 prose-code:rounded prose-code:before:content-none prose-code:after:content-none"
                    v-html="material.body">
                </div>

                <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button
                            class="flex items-center gap-2 text-slate-500 hover:text-indigo-600 font-medium transition">
                            <BookmarkIcon class="w-5 h-5" /> Simpan Materi
                        </button>
                    </div>
                    <button class="p-2 text-slate-400 hover:text-slate-600 transition">
                        <ShareIcon class="w-5 h-5" />
                    </button>
                </div>
            </div>
        </article>

        <section class="space-y-8">
            <div class="flex items-center gap-3">
                <ChatBubbleLeftRightIcon class="w-6 h-6 text-slate-900" />
                <h3 class="text-xl font-bold text-slate-900">Diskusi & Pertanyaan ({{ comments.length }})</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="flex gap-4">
                    <div class="hidden sm:block">
                        <UserCircleIcon class="w-10 h-10 text-slate-300" />
                    </div>
                    <div class="flex-1">
                        <textarea v-model="commentForm.message" rows="3"
                            class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder:text-slate-400 transition"
                            placeholder="Apa yang ingin Anda tanyakan atau diskusikan mengenai materi ini?"></textarea>
                        <div class="mt-3 flex justify-end">
                            <button @click="submitComment"
                                class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition flex items-center gap-2">
                                Kirim Pertanyaan
                                <PaperAirplaneIcon class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div v-for="comment in comments" :key="comment.id" class="space-y-4">
                    <div class="flex gap-4">
                        <UserCircleIcon class="w-10 h-10 text-slate-300 flex-shrink-0" />
                        <div class="flex-1 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-bold text-slate-900 text-sm">{{ comment.user }}</h4>
                                <span class="text-xs text-slate-400">{{ comment.date }}</span>
                            </div>
                            <p class="text-sm text-slate-600 leading-relaxed">{{ comment.text }}</p>
                            <button
                                class="mt-3 text-xs font-bold text-indigo-600 hover:text-indigo-800 transition">Balas</button>
                        </div>
                    </div>

                    <div v-for="reply in comment.replies" :key="reply.id" class="flex gap-4 ml-10 sm:ml-14">
                        <UserCircleIcon class="w-8 h-8 text-indigo-200 flex-shrink-0" />
                        <div class="flex-1 bg-indigo-50/50 p-4 rounded-2xl border border-indigo-100/50">
                            <div class="flex justify-between items-center mb-1">
                                <h4 class="font-bold text-indigo-900 text-xs">{{ reply.user }}</h4>
                                <span class="text-[10px] text-indigo-400">{{ reply.date }}</span>
                            </div>
                            <p class="text-sm text-slate-600 leading-relaxed">{{ reply.text }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center pt-4">
                <button class="text-sm font-bold text-slate-500 hover:text-slate-900 transition">Lihat Komentar
                    Lainnya</button>
            </div>
        </section>

    </div>
</template>

<style scoped>
/* Menghilangkan scrollbar pada tab navigasi yang overflow */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Animasi Fade In */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.4s ease-out forwards;
}
</style>
