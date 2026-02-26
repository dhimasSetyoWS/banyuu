<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            header: 'Daftar Sesi Kelas',
            title: 'Sesi Kelas',
        }, () => [page])
}
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    ChevronLeftIcon,
    EyeIcon,
    BookOpenIcon, // Icon Materi
    ClipboardDocumentListIcon, // Icon Assignment
    AcademicCapIcon, // Icon Exam
    FolderIcon, // Icon Project
    ExclamationCircleIcon, // Icon Unsubmitted
    CheckCircleIcon // Icon Completed
} from '@heroicons/vue/24/outline';

const course = ref({
    title: "Fullstack Laravel 10 & Vue 3: Membangun LMS Canggih",
    updated_at: "Hari ini, 10:42",
});

// Struktur Data dengan Status Tracker
const sessions = ref([
    {
        id: 1,
        title: "Pengenalan & Persiapan Tools",
        stats: {
            material: { total: 3, completed: 3 },
            assignment: { total: 1, unsubmitted: 0 },
            exam: { total: 1, unsubmitted: 0 },
            project: { total: 0, unsubmitted: 0 }
        }
    },
    {
        id: 2,
        title: "Konsep MVC & Routing Inti",
        stats: {
            material: { total: 5, completed: 2 },
            assignment: { total: 2, unsubmitted: 1 }, // Ada 1 belum dikumpul
            exam: { total: 1, unsubmitted: 1 },       // Ada 1 belum dikumpul
            project: { total: 0, unsubmitted: 0 }
        }
    },
    {
        id: 3,
        title: "Mastering Database & Relasi",
        stats: {
            material: { total: 4, completed: 0 },
            assignment: { total: 1, unsubmitted: 1 },
            exam: { total: 0, unsubmitted: 0 },
            project: { total: 1, unsubmitted: 1 }      // Ada 1 belum dikumpul
        }
    }
]);

// Helper untuk mengecek jika ada yang belum dikumpul sama sekali dalam satu sesi
const hasUnsubmitted = (stats) => {
    return stats.assignment.unsubmitted > 0 ||
           stats.exam.unsubmitted > 0 ||
           stats.project.unsubmitted > 0;
};
</script>

<template>
    <Head title="Sesi Kelas" />

    <div class="space-y-6 pb-20 max-w-5xl mx-auto">

        <div class="flex items-center justify-between mb-4">
            <Link :href="route('dashboard.class.index')"
                class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition font-medium">
                <ChevronLeftIcon class="w-4 h-4" />
                Kembali ke Kelas Saya
            </Link>
        </div>

        <div class="bg-white border border-slate-200 rounded-3xl p-6 md:p-8 shadow-sm relative overflow-hidden group">
             <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-50 rounded-full blur-3xl opacity-60 group-hover:bg-indigo-100 transition-colors duration-500"></div>

            <div class="relative z-10">
                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-500 mb-2 block">Daftar Kurikulum</span>
                <h2 class="text-2xl font-black text-slate-900 leading-tight mb-2">{{ course.title }}</h2>
                <p class="text-xs text-slate-400 font-medium">Progress Sesi Anda saat ini ditampilkan di bawah.</p>
            </div>
        </div>

        <div class="space-y-4">
            <div v-for="(session, index) in sessions" :key="session.id"
                class="bg-white border border-slate-200 rounded-[2rem] p-5 md:p-6 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300 group">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-xl bg-slate-900 text-white flex items-center justify-center text-xs font-black shadow-lg shadow-slate-200">
                                {{ index + 1 }}
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">
                                {{ session.title }}
                            </h3>
                        </div>

                        <div v-if="hasUnsubmitted(session.stats)" class="flex items-center gap-1.5 text-rose-500 bg-rose-50 w-fit px-3 py-1 rounded-full border border-rose-100 animate-pulse">
                            <ExclamationCircleIcon class="w-4 h-4" />
                            <span class="text-[10px] font-black uppercase tracking-wider">Tugas Belum Lengkap</span>
                        </div>
                        <div v-else class="flex items-center gap-1.5 text-emerald-500 bg-emerald-50 w-fit px-3 py-1 rounded-full border border-emerald-100">
                            <CheckCircleIcon class="w-4 h-4" />
                            <span class="text-[10px] font-black uppercase tracking-wider">Sesi Selesai</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 md:gap-8 min-w-fit px-2 md:px-0">

                        <div class="flex flex-col items-center gap-1">
                            <div class="p-2 bg-slate-50 rounded-xl text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-500 transition-colors">
                                <BookOpenIcon class="w-5 h-5" />
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Materi</p>
                                <p class="text-xs font-black text-slate-700">{{ session.stats.material.completed }}/{{ session.stats.material.total }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-1">
                            <div :class="session.stats.assignment.unsubmitted > 0 ? 'bg-amber-50 text-amber-500' : 'bg-slate-50 text-slate-400'" class="p-2 rounded-xl transition-colors">
                                <ClipboardDocumentListIcon class="w-5 h-5" />
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Tugas</p>
                                <p v-if="session.stats.assignment.unsubmitted > 0" class="text-xs font-black text-rose-500 underline">{{ session.stats.assignment.unsubmitted }} Unsubmit</p>
                                <p v-else class="text-xs font-black text-slate-700">{{ session.stats.assignment.total }} Done</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-1">
                            <div :class="session.stats.exam.unsubmitted > 0 ? 'bg-purple-50 text-purple-500' : 'bg-slate-50 text-slate-400'" class="p-2 rounded-xl transition-colors">
                                <AcademicCapIcon class="w-5 h-5" />
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Exam</p>
                                <p v-if="session.stats.exam.unsubmitted > 0" class="text-xs font-black text-rose-500 underline">{{ session.stats.exam.unsubmitted }} Unsubmit</p>
                                <p v-else class="text-xs font-black text-slate-700">{{ session.stats.exam.total }} Done</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-1">
                            <div :class="session.stats.project.unsubmitted > 0 ? 'bg-orange-50 text-orange-500' : 'bg-slate-50 text-slate-400'" class="p-2 rounded-xl transition-colors">
                                <FolderIcon class="w-5 h-5" />
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Project</p>
                                <p v-if="session.stats.project.unsubmitted > 0" class="text-xs font-black text-rose-500 underline">{{ session.stats.project.unsubmitted }} Unsubmit</p>
                                <p v-else class="text-xs font-black text-slate-700">{{ session.stats.project.total }} Done</p>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center justify-end md:pl-4 border-t md:border-t-0 md:border-l border-slate-100 pt-4 md:pt-0">
                        <Link :href="route('dashboard.class.study.show')"
                            class="w-full md:w-auto px-6 py-3 bg-slate-900 text-white rounded-2xl text-xs font-black hover:bg-indigo-600 hover:shadow-xl hover:shadow-indigo-200 transition-all active:scale-95 flex items-center justify-center gap-2">
                            Mulai Belajar
                            <EyeIcon class="w-4 h-4" />
                        </Link>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
/* Animasi halus untuk background dan shadow */
.group:hover {
    transform: translateY(-2px);
}
</style>
