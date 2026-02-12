<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Daftar Assessment' }, () => [page])
}
</script>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {
    MagnifyingGlassIcon,
    FunnelIcon,
    PlusIcon,
    ClipboardDocumentCheckIcon, // Icon Quiz
    DocumentArrowUpIcon,       // Icon Assignment
    CalendarIcon,
    ClockIcon,
    UsersIcon,
    PencilSquareIcon,
    TrashIcon,
    EyeIcon
} from '@heroicons/vue/24/outline';

// 1. DATA DUMMY
const assessments = [
    {
        id: 1,
        title: "Ujian Tengah Semester: Algoritma",
        course: "Dasar Pemrograman",
        type: "quiz", // quiz | assignment
        status: "active", // active | draft | closed
        deadline: "2024-10-25 23:59",
        duration: 90, // menit
        submitted: 25,
        total_students: 30,
    },
    {
        id: 2,
        title: "Tugas Membuat Wireframe Landing Page",
        course: "UI/UX Design Masterclass",
        type: "assignment",
        status: "active",
        deadline: "2024-10-30 15:00",
        duration: null, // Tugas tidak ada durasi menit
        submitted: 12,
        total_students: 28,
    },
    {
        id: 3,
        title: "Kuis Harian: HTML Structure",
        course: "Full Stack Web Developer",
        type: "quiz",
        status: "closed",
        deadline: "2024-10-01 12:00",
        duration: 15,
        submitted: 30,
        total_students: 30,
    },
    {
        id: 4,
        title: "Project Akhir: Membangun API dengan Laravel",
        course: "Backend Engineering",
        type: "assignment",
        status: "draft",
        deadline: "2024-11-15 23:59",
        duration: null,
        submitted: 0,
        total_students: 25,
    }
];

// 2. STATE & FILTER
const search = ref('');
const filterStatus = ref('');

// 3. LOGIC FILTERING
const filteredAssessments = computed(() => {
    return assessments.filter(item => {
        const matchesSearch = item.title.toLowerCase().includes(search.value.toLowerCase()) ||
                              item.course.toLowerCase().includes(search.value.toLowerCase());
        const matchesStatus = filterStatus.value === '' || item.status === filterStatus.value;
        return matchesSearch && matchesStatus;
    });
});

// 4. HELPER FUNCTIONS (Formatting)
const formatDate = (dateString) => {
    const options = { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

const getStatusBadge = (status) => {
    switch(status) {
        case 'active': return 'bg-green-50 text-green-700 border-green-200 ring-green-500/30';
        case 'draft': return 'bg-slate-50 text-slate-600 border-slate-200 ring-slate-500/30';
        case 'closed': return 'bg-red-50 text-red-700 border-red-200 ring-red-500/30';
        default: return 'bg-slate-50 text-slate-600';
    }
};

const getStatusLabel = (status) => {
    switch(status) {
        case 'active': return 'Sedang Berjalan';
        case 'draft': return 'Draft';
        case 'closed': return 'Selesai';
        default: return status;
    }
};

const user = usePage().props.auth.user;

const getTypeIcon = (type) => type === 'quiz' ? ClipboardDocumentCheckIcon : DocumentArrowUpIcon;
const getTypeColor = (type) => type === 'quiz' ? 'text-indigo-600 bg-indigo-50 border-indigo-100' : 'text-orange-600 bg-orange-50 border-orange-100';
const getTypeLabel = (type) => type === 'quiz' ? 'Kuis Online' : 'Tugas Upload';

</script>

<template>
    <Head title="Daftar Assessment" />

    <div class="max-w-7xl mx-auto pb-20">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Manajemen Assessment</h2>
                <p class="text-slate-500 text-sm">Kelola ujian, kuis, dan tugas harian siswa.</p>
            </div>

            <Link v-if="user.role == 'teacher'" :href="route('dashboard.assessment.create')"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
                <PlusIcon class="w-5 h-5" />
                Buat Baru
            </Link>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mb-6 flex flex-col md:flex-row gap-4">

            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <MagnifyingGlassIcon class="h-5 w-5 text-slate-400" />
                </div>
                <input v-model="search" type="text"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm transition"
                    placeholder="Cari judul ujian atau nama kelas...">
            </div>

            <div class="relative w-full md:w-56">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <FunnelIcon class="h-4 w-4 text-slate-400" />
                </div>
                <select v-model="filterStatus"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl bg-white text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer transition">
                    <option value="">Semua Status</option>
                    <option value="active">Sedang Berjalan</option>
                    <option value="draft">Draft (Belum Publik)</option>
                    <option value="closed">Selesai</option>
                </select>
            </div>
        </div>

        <div class="space-y-4">

            <div v-for="assessment in filteredAssessments" :key="assessment.id"
                class="bg-white p-6 rounded-2xl border border-slate-200 hover:border-indigo-300 hover:shadow-lg transition-all duration-300 group cursor-pointer relative overflow-hidden">

                <div class="absolute inset-y-0 left-0 w-1.5 bg-indigo-500 rounded-l-2xl group-hover:bg-indigo-600 transition"></div>

                <div class="pl-4 flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span :class="`px-2.5 py-1 text-xs font-bold rounded-md flex items-center gap-1.5 border ${getTypeColor(assessment.type)}`">
                                <component :is="getTypeIcon(assessment.type)" class="w-3.5 h-3.5" />
                                {{ getTypeLabel(assessment.type) }}
                            </span>

                            <span :class="`px-2.5 py-1 text-xs font-bold rounded-md ring-1 ring-inset ${getStatusBadge(assessment.status)}`">
                                {{ getStatusLabel(assessment.status) }}
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-700 transition leading-snug truncate">
                            {{ assessment.title }}
                        </h3>
                        <p class="text-sm text-slate-500 mt-1 flex items-center gap-2">
                            <span class="font-medium text-slate-700">{{ assessment.course }}</span>
                        </p>
                    </div>

                    <div class="flex flex-col gap-2 min-w-[200px] text-sm text-slate-500 border-l border-slate-100 pl-6 md:border-l-0 md:pl-0">
                        <div class="flex items-center gap-2">
                            <CalendarIcon class="w-4 h-4 text-slate-400" />
                            <span>Deadline: <span class="font-medium text-slate-700">{{ assessment.deadline }}</span></span>
                        </div>
                        <div v-if="assessment.type === 'quiz'" class="flex items-center gap-2">
                            <ClockIcon class="w-4 h-4 text-slate-400" />
                            <span>Durasi: <span class="font-medium text-slate-700">{{ assessment.duration }} Menit</span></span>
                        </div>
                    </div>

                    <div class="flex flex-col md:items-end gap-3 min-w-[150px]">

                        <div class="flex items-center gap-2 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200">
                            <UsersIcon class="w-4 h-4 text-slate-400" />
                            <span class="text-sm font-bold text-slate-700">
                                {{ assessment.submitted }} <span class="text-slate-400 font-normal">/ {{ assessment.total_students }} Siswa</span>
                            </span>
                        </div>

                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <Link v-if="user.role == 'teacher'" :href="route('dashboard.assessment.edit')"
                                class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Edit">
                                <PencilSquareIcon class="w-5 h-5" />
                            </Link>
                            <Link href="#"
                                class="p-2 text-slate-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition" title="Lihat Assesment">
                                <EyeIcon class="w-5 h-5" />
                            </Link>
                            <Link v-if="user.role == 'teacher'" href="'#'" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                <TrashIcon class="w-5 h-5" />
                            </Link>
                        </div>

                    </div>
                </div>
            </div>

            <div v-if="filteredAssessments.length === 0" class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-300">
                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <ClipboardDocumentCheckIcon class="w-8 h-8 text-slate-300" />
                </div>
                <h3 class="text-slate-900 font-bold mb-1">Belum ada assessment</h3>
                <p class="text-slate-500 text-sm">Coba buat assessment baru atau ubah filter pencarian Anda.</p>
                <button class="mt-4 px-5 py-2 bg-white border border-slate-300 text-slate-700 font-bold text-sm rounded-lg hover:bg-slate-50 transition">
                    Reset Filter
                </button>
            </div>

        </div>

    </div>
</template>
