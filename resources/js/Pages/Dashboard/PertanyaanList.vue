<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    // Menggunakan Layout Authenticated sesuai request
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Bank Soal & Pertanyaan' }, () => [page])
}
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {
    MagnifyingGlassIcon,
    FunnelIcon,
    ChatBubbleLeftRightIcon,
    CheckCircleIcon,
    DocumentTextIcon,
    EyeIcon,
    PencilSquareIcon
} from '@heroicons/vue/24/outline';

// 1. DATA DUMMY (Bank Soal)
const allQuestions = [
    {
        id: 1,
        title: "Bagaimana cara menghitung luas lingkaran jika diketahui kelilingnya?",
        subject: "Matematika",
        type: "Essay",
        difficulty: "Medium",
        author: "Budi Santoso",
        date: "2 Jam yang lalu",
        answers: 5,
        status: "Solved"
    },
    {
        id: 2,
        title: "Jelaskan perbedaan antara mitosis dan meiosis pada pembelahan sel!",
        subject: "Biologi",
        type: "Essay",
        difficulty: "Hard",
        author: "Siti Aminah",
        date: "1 Hari yang lalu",
        answers: 12,
        status: "Open"
    },
    {
        id: 3,
        title: "Berikut ini yang bukan merupakan ciri-ciri pasar persaingan sempurna adalah...",
        subject: "Ekonomi",
        type: "Pilihan Ganda",
        difficulty: "Easy",
        author: "Rizky Pratama",
        date: "3 Hari yang lalu",
        answers: 2,
        status: "Open"
    },
    {
        id: 4,
        title: "Apa fungsi dari tag <head> dalam struktur HTML5?",
        subject: "Teknologi",
        type: "Pilihan Ganda",
        difficulty: "Easy",
        author: "Andi Tech",
        date: "4 Hari yang lalu",
        answers: 8,
        status: "Solved"
    },
    {
        id: 5,
        title: "Tentukan turunan pertama dari f(x) = 3x^2 + 5x - 2",
        subject: "Matematika",
        type: "Essay",
        difficulty: "Medium",
        author: "Diana Rose",
        date: "5 Hari yang lalu",
        answers: 0,
        status: "Open"
    }
];

// 2. STATE UNTUK FILTER
const search = ref('');
const selectedSubject = ref('');

// 3. LOGIC FILTERING (Computed)
const filteredQuestions = computed(() => {
    return allQuestions.filter(q => {
        const matchesSearch = q.title.toLowerCase().includes(search.value.toLowerCase());
        const matchesSubject = selectedSubject.value === '' || q.subject === selectedSubject.value;
        return matchesSearch && matchesSubject;
    });
});

// Helper untuk warna badge Subject
const getSubjectColor = (subject) => {
    switch(subject) {
        case 'Matematika': return 'bg-blue-50 text-blue-600 border-blue-100';
        case 'Biologi': return 'bg-green-50 text-green-600 border-green-100';
        case 'Ekonomi': return 'bg-orange-50 text-orange-600 border-orange-100';
        case 'Teknologi': return 'bg-purple-50 text-purple-600 border-purple-100';
        default: return 'bg-slate-50 text-slate-600 border-slate-100';
    }
};

// Helper untuk warna badge Difficulty
const getDifficultyColor = (diff) => {
    switch(diff) {
        case 'Easy': return 'text-green-600 bg-green-50';
        case 'Medium': return 'text-yellow-600 bg-yellow-50';
        case 'Hard': return 'text-red-600 bg-red-50';
        default: return 'text-slate-600';
    }
};
</script>

<template>
    <Head title="Bank Soal" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto flex-1">

                    <div class="relative w-full md:w-96">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <MagnifyingGlassIcon class="h-5 w-5 text-slate-400" />
                        </div>
                        <input v-model="search" type="text"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:placeholder-slate-300 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm transition"
                            placeholder="Cari pertanyaan...">
                    </div>

                    <div class="relative w-full md:w-48">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <FunnelIcon class="h-4 w-4 text-slate-400" />
                        </div>
                        <select v-model="selectedSubject"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer transition">
                            <option value="">Semua Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Teknologi">Teknologi</option>
                        </select>
                    </div>

                </div>

                <Link v-show="$page.props.auth.user.role == 'teacher'" :href="route('dashboard.pertanyaan.create')" class="w-full md:w-auto px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition flex items-center justify-center gap-2">
                    <span>+ Buat Pertanyaan</span>
                </Link>
            </div>

            <div class="space-y-4">

                <div v-for="question in filteredQuestions" :key="question.id"
                    class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-300 hover:shadow-md transition group">

                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">

                        <div class="space-y-3 flex-1">
                            <div class="flex flex-wrap items-center gap-2 text-xs font-bold">
                                <span :class="`px-2.5 py-1 rounded-lg border ${getSubjectColor(question.subject)}`">
                                    {{ question.subject }}
                                </span>
                                <span :class="`px-2.5 py-1 rounded-lg ${getDifficultyColor(question.difficulty)}`">
                                    {{ question.difficulty }}
                                </span>
                                <span v-if="question.type === 'Pilihan Ganda'" class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 flex items-center gap-1">
                                    <CheckCircleIcon class="w-3 h-3" /> Pilihan Ganda
                                </span>
                                <span v-else class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 flex items-center gap-1">
                                    <DocumentTextIcon class="w-3 h-3" /> Essay
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition leading-snug">
                                {{ question.title }}
                            </h3>

                            <div class="flex items-center gap-3 text-xs text-slate-500">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-5 h-5 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-600">
                                        {{ question.author.charAt(0) }}
                                    </div>
                                    <span>{{ question.author }}</span>
                                </div>
                                <span>•</span>
                                <span>{{ question.date }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 md:border-l md:border-slate-100 md:pl-6">
                            <div class="text-center min-w-[60px]">
                                <div class="flex items-center justify-center gap-1 text-slate-400 mb-1">
                                    <Link :href="'#'">
                                        <EyeIcon class="w-7 h-7 p-1 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transitionr:text-indigo-600 cursor-pointer" />
                                    </Link>
                                    <Link :href="route('dashboard.pertanyaan.edit')">
                                        <PencilSquareIcon class="w-7 h-7 p-1 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transitionr:text-indigo-600 cursor-pointer" />
                                    </Link>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div v-if="filteredQuestions.length === 0" class="text-center py-12 bg-white rounded-2xl border border-slate-200 border-dashed">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <MagnifyingGlassIcon class="w-8 h-8 text-slate-400" />
                    </div>
                    <h3 class="text-slate-900 font-bold mb-1">Pertanyaan tidak ditemukan</h3>
                    <p class="text-slate-500 text-sm">Coba ubah kata kunci pencarian atau filter mata pelajaran.</p>
                </div>

            </div>

        </div>
    </div>
</template>
