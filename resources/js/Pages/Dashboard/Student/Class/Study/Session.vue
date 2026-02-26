<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Detail Sesi Belajar' }, () => [page])
}
</script>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
    BookOpenIcon,
    ClipboardDocumentListIcon,
    AcademicCapIcon,
    FolderOpenIcon,
    PlayCircleIcon,
    DocumentTextIcon,
    ArrowDownTrayIcon,
    ClockIcon,
    CheckCircleIcon,
    XCircleIcon,
    ChevronLeftIcon
} from '@heroicons/vue/24/outline';

// --- STATE ---
const activeTab = ref('material'); // 'material' | 'assignment' | 'exam' | 'project'

// --- DATA DUMMY ---
const sessionInfo = {
    title: "Sesi 1: Pengenalan Dasar HTML & CSS",
    description: "Pada sesi ini, Anda akan mempelajari struktur dasar halaman web menggunakan HTML5 dan cara memberikan gaya (styling) menggunakan CSS.",
    date: "10 Okt 2024 - 17 Okt 2024",
    instructor: "Budi Santoso, S.Kom"
};

const materials = ref([
    { id: 1, title: 'Modul 1: Konsep Dasar HTML5', type: 'pdf', size: '2.5 MB', duration: '15 Menit Baca' },
    { id: 2, title: 'Video: Membuat Kerangka Website', type: 'video', size: '120 MB', duration: '24:15 Menit' },
    { id: 3, title: 'Slide Presentasi: Pengenalan CSS', type: 'ppt', size: '5 MB', duration: '20 Slide' },
]);

const assignments = ref([
    { id: 1, title: 'Tugas 1: Membuat Biodata Diri dengan HTML', deadline: '2024-10-15 23:59', status: 'submitted', score: 85 },
    { id: 2, title: 'Tugas 2: Styling Tabel Menggunakan CSS', deadline: '2024-10-17 23:59', status: 'pending', score: null },
]);

const exams = ref([
    { id: 1, title: 'Kuis Harian 1: Tag HTML', duration: 15, questions: 10, deadline: '2024-10-12 12:00', status: 'completed', score: 90 },
    { id: 2, title: 'Ujian Akhir Sesi 1', duration: 60, questions: 50, deadline: '2024-10-18 23:59', status: 'available', score: null },
]);

const projects = ref([
    { id: 1, title: 'Final Project: Landing Page Portfolio', deadline: '2024-10-31 23:59', type: 'Individual', status: 'in_progress', progress: 40 }
]);

// --- HELPER UI ---
const getStatusBadge = (status) => {
    switch (status) {
        case 'submitted': return 'bg-emerald-100 text-emerald-700 border-emerald-200';
        case 'completed': return 'bg-emerald-100 text-emerald-700 border-emerald-200';
        case 'pending': return 'bg-orange-100 text-orange-700 border-orange-200';
        case 'available': return 'bg-blue-100 text-blue-700 border-blue-200';
        case 'in_progress': return 'bg-purple-100 text-purple-700 border-purple-200';
        default: return 'bg-slate-100 text-slate-700 border-slate-200';
    }
};

const getStatusLabel = (status) => {
    switch (status) {
        case 'submitted': return 'Sudah Dikumpulkan';
        case 'completed': return 'Selesai';
        case 'pending': return 'Belum Dikerjakan';
        case 'available': return 'Tersedia';
        case 'in_progress': return 'Sedang Berjalan';
        default: return status;
    }
};
</script>

<template>

    <Head :title="sessionInfo.title" />

    <div class="max-w-7xl mx-auto pb-20 space-y-6">

        <div class="flex items-center gap-2">
            <Link :href="route('dashboard.class.study')"
                class="text-slate-500 hover:text-indigo-600 transition flex items-center gap-1 text-sm font-medium">
                <ChevronLeftIcon class="w-4 h-4" /> Kembali ke Kelas
            </Link>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8 relative overflow-hidden">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-indigo-50 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 pointer-events-none">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-start justify-between gap-6">
                <div class="flex-1">
                    <div
                        class="flex items-center gap-2 text-xs font-bold text-indigo-600 uppercase tracking-wider mb-2">
                        <span class="bg-indigo-100 px-2 py-1 rounded-md">Fullstack Web Dev</span>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3 leading-tight">{{
                        sessionInfo.title }}</h1>
                    <p class="text-slate-600 text-sm md:text-base max-w-3xl leading-relaxed">{{ sessionInfo.description
                    }}</p>

                    <div class="flex flex-wrap items-center gap-4 mt-6 text-sm text-slate-500">
                        <div class="flex items-center gap-1.5">
                            <ClockIcon class="w-4 h-4 text-slate-400" /> {{ sessionInfo.date }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <AcademicCapIcon class="w-4 h-4 text-slate-400" /> {{ sessionInfo.instructor }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="flex border-b border-slate-200 overflow-x-auto hide-scrollbar">
                <button @click="activeTab = 'material'"
                    :class="activeTab === 'material' ? 'border-indigo-600 text-indigo-700 bg-indigo-50/50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="flex-1 min-w-[120px] py-4 text-sm font-bold text-center border-b-2 transition flex items-center justify-center gap-2">
                    <BookOpenIcon class="w-5 h-5" /> Materi
                </button>
                <button @click="activeTab = 'assignment'"
                    :class="activeTab === 'assignment' ? 'border-indigo-600 text-indigo-700 bg-indigo-50/50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="flex-1 min-w-[120px] py-4 text-sm font-bold text-center border-b-2 transition flex items-center justify-center gap-2">
                    <ClipboardDocumentListIcon class="w-5 h-5" /> Assignment
                </button>
                <button @click="activeTab = 'exam'"
                    :class="activeTab === 'exam' ? 'border-indigo-600 text-indigo-700 bg-indigo-50/50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="flex-1 min-w-[120px] py-4 text-sm font-bold text-center border-b-2 transition flex items-center justify-center gap-2">
                    <AcademicCapIcon class="w-5 h-5" /> Exam / Kuis
                </button>
                <button @click="activeTab = 'project'"
                    :class="activeTab === 'project' ? 'border-indigo-600 text-indigo-700 bg-indigo-50/50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="flex-1 min-w-[120px] py-4 text-sm font-bold text-center border-b-2 transition flex items-center justify-center gap-2">
                    <FolderOpenIcon class="w-5 h-5" /> Project
                </button>
            </div>

            <div class="p-6 md:p-8 min-h-[400px]">

                <div v-show="activeTab === 'material'" class="space-y-4 animate-fade-in">
                    <div v-if="materials.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <Link v-for="item in materials" :key="item.id"
                            :href="route('dashboard.class.study.show.material')"
                            class="group flex items-start gap-4 p-5 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-md transition bg-white cursor-pointer">
                            <div :class="item.type === 'video' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600'"
                                class="p-3 rounded-xl flex-shrink-0">
                                <PlayCircleIcon v-if="item.type === 'video'" class="w-6 h-6" />
                                <DocumentTextIcon v-else class="w-6 h-6" />
                            </div>
                            <div class="flex-1">
                                <h4
                                    class="font-bold text-slate-800 group-hover:text-indigo-600 transition line-clamp-2 mb-1">
                                    {{ item.title }}</h4>
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="uppercase font-bold">{{ item.type }}</span>
                                    <span>•</span>
                                    <span>{{ item.duration }}</span>
                                    <span>•</span>
                                    <span>{{ item.size }}</span>
                                </div>
                            </div>
                            <button
                                class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"
                                title="Download/Buka">
                                <ArrowDownTrayIcon v-if="item.type !== 'video'" class="w-5 h-5" />
                                <PlayCircleIcon v-else class="w-5 h-5" />
                            </button>
                        </Link>
                    </div>
                    <div v-else class="text-center py-12">
                        <p class="text-slate-500">Belum ada materi untuk sesi ini.</p>
                    </div>
                </div>

                <div v-show="activeTab === 'assignment'" class="space-y-4 animate-fade-in">
                    <div v-if="assignments.length > 0" class="space-y-4">
                        <div v-for="task in assignments" :key="task.id"
                            class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-5 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-md transition bg-white">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span
                                        :class="`px-2.5 py-0.5 rounded text-[10px] font-bold uppercase border ${getStatusBadge(task.status)}`">{{
                                            getStatusLabel(task.status) }}</span>
                                </div>
                                <h4 class="font-bold text-slate-800 text-lg mb-1">{{ task.title }}</h4>
                                <div class="flex items-center gap-2 text-xs text-slate-500 font-medium">
                                    <ClockIcon class="w-4 h-4 text-orange-500" />
                                    <span :class="{ 'text-orange-600 font-bold': task.status === 'pending' }">Tenggat:
                                        {{
                                            task.deadline
                                        }}</span>
                                </div>
                            </div>

                            <div
                                class="flex items-center gap-4 md:border-l border-slate-100 md:pl-6 pt-4 md:pt-0 border-t md:border-t-0 mt-4 md:mt-0">
                                <div v-if="task.score !== null" class="text-center">
                                    <span class="block text-2xl font-black text-emerald-600">{{ task.score }}</span>
                                    <span class="text-[10px] uppercase font-bold text-slate-400">Nilai</span>
                                </div>
                                <div v-else-if="task.status === 'submitted'"
                                    class="text-center text-slate-400 text-sm italic w-16">
                                    Dinilai...
                                </div>
                                <Link
                                    :href="task.status === 'pending' ? route('dashboard.class.study.show.assignment') : '#'"
                                    class="px-5 py-2.5 rounded-xl text-sm font-bold transition whitespace-nowrap"
                                    :class="task.status === 'pending' ? 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-md shadow-indigo-200' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'">
                                    {{ task.status === 'pending' ? 'Kerjakan Tugas' : 'Lihat Detail' }}
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center py-12">
                        <p class="text-slate-500">Belum ada assignment untuk sesi ini.</p>
                    </div>
                </div>

                <div v-show="activeTab === 'exam'" class="space-y-4 animate-fade-in">
                    <div v-if="exams.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="exam in exams" :key="exam.id"
                            class="flex flex-col justify-between p-6 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-md transition bg-white relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1.5"
                                :class="exam.status === 'available' ? 'bg-indigo-500' : 'bg-emerald-500'"></div>

                            <div class="pl-2">
                                <div class="flex justify-between items-start mb-3">
                                    <span
                                        :class="`px-2.5 py-0.5 rounded text-[10px] font-bold uppercase border ${getStatusBadge(exam.status)}`">{{
                                            getStatusLabel(exam.status) }}</span>
                                    <span v-if="exam.score !== null"
                                        class="text-lg font-black text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg border border-emerald-100">{{
                                            exam.score }}/100</span>
                                </div>
                                <h4 class="font-bold text-slate-800 text-lg mb-2 leading-snug">{{ exam.title }}</h4>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-slate-500 mb-6">
                                    <div class="flex items-center gap-1">
                                        <ClockIcon class="w-4 h-4" /> {{ exam.duration }} Menit
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <ClipboardDocumentListIcon class="w-4 h-4" /> {{ exam.questions }} Soal
                                    </div>
                                    <div class="flex items-center gap-1 w-full mt-1 text-orange-600">
                                        <ClockIcon class="w-4 h-4" /> Tutup: {{ exam.deadline }}
                                    </div>
                                </div>
                            </div>

                            <Link
                                :href="exam.status === 'available' ? route('dashboard.class.study.show.exam') : route('dashboard.class.study.show')"
                                class="w-full block text-center px-4 py-2.5 rounded-xl text-sm font-bold transition"
                                :class="exam.status === 'available' ? 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-md shadow-indigo-200' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'">
                                {{ exam.status === 'available' ? 'Mulai Ujian' : 'Lihat Hasil' }}
                            </Link>
                        </div>
                    </div>
                    <div v-else class="text-center py-12">
                        <p class="text-slate-500">Belum ada ujian untuk sesi ini.</p>
                    </div>
                </div>

                <div v-show="activeTab === 'project'" class="space-y-4 animate-fade-in">
                    <div v-if="projects.length > 0" class="space-y-4">
                        <div v-for="proj in projects" :key="proj.id"
                            class="p-6 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-md transition bg-white">
                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-6">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span
                                            class="px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase bg-purple-100 text-purple-700 border border-purple-200">{{
                                                proj.type }} Project</span>
                                        <span
                                            :class="`px-2.5 py-0.5 rounded text-[10px] font-bold uppercase border ${getStatusBadge(proj.status)}`">{{
                                                getStatusLabel(proj.status) }}</span>
                                    </div>
                                    <h4 class="font-bold text-slate-800 text-xl">{{ proj.title }}</h4>
                                    <p class="text-sm text-slate-500 mt-1 flex items-center gap-1.5">
                                        <ClockIcon class="w-4 h-4 text-orange-500" /> Tenggat: {{ proj.deadline }}
                                    </p>
                                </div>
                            </div>

                            <div v-if="proj.status === 'in_progress'"
                                class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-bold text-slate-700">Progress Pengerjaan</span>
                                    <span class="text-xs font-bold text-indigo-600">{{ proj.progress }}%</span>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2">
                                    <div class="bg-indigo-600 h-2 rounded-full transition-all duration-500"
                                        :style="`width: ${proj.progress}%`"></div>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <Link :href="route('dashboard.class.study.show.project')"
                                        class="px-5 py-2 bg-indigo-600 text-white text-sm font-bold rounded-lg hover:bg-indigo-700 shadow-md shadow-indigo-200 transition">
                                        Lanjutkan Project
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center py-12">
                        <p class="text-slate-500">Belum ada project untuk sesi ini.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<style scoped>
/* Sembunyikan scrollbar untuk navigasi tab di mobile tapi tetap bisa digeser */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Animasi transisi tab simpel */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
}
</style>
