<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Kelola Kursus' }, () => [page])
}
</script>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    PencilSquareIcon,
    TrashIcon,
    PlusIcon,
    VideoCameraIcon,
    DocumentTextIcon,
    ClipboardDocumentCheckIcon,
    AcademicCapIcon,
    PuzzlePieceIcon,
    ChevronDownIcon,
    Bars2Icon, // Icon untuk handle drag-drop
    EyeIcon
} from '@heroicons/vue/24/outline';

// Props dari Controller (Data Kursus & Sesi-nya)
// const props = defineProps({
//     course: Object
// });

const course = ref({
    id: 1,
    title: "Fullstack Laravel 10 & Vue 3: Membangun LMS Canggih",
    slug: "fullstack-laravel-vue",
    status: "draft", // Coba ganti jadi 'published' untuk lihat bedanya
    updated_at: "Hari ini, 10:42",

    // Nested Sessions Data (Struktur Hierarki)
    sessions: [
        {
            id: 1,
            title: "Sesi 1: Pengenalan & Persiapan Lingkungan Kerja",
            items: [
                { id: 101, title: "Demo Aplikasi Final yang Akan Kita Buat", type: "video", duration: "05:30" },
                { id: 102, title: "Install Laragon, Composer, dan Node.js", type: "pdf", duration: "Modul Bacaan" },
                { id: 103, title: "Bergabung ke Grup Discord Premium", type: "text", duration: "Info Penting" },
            ]
        },
        {
            id: 2,
            title: "Sesi 2: Database & Migrations (Inti Backend)",
            items: [
                { id: 201, title: "Merancang ERD (Entity Relationship Diagram)", type: "video", duration: "15:20" },
                { id: 202, title: "Membuat Migration User & Course", type: "video", duration: "20:10" },
                { id: 203, title: "Kuis: Pemahaman Relasi Eloquent", type: "exam", duration: "10 Soal" },
            ]
        },
        {
            id: 3,
            title: "Sesi 3: Implementasi API & Frontend",
            items: [
                { id: 301, title: "Setup Inertia.js & Vue 3", type: "video", duration: "12:45" },
                { id: 302, title: "Tugas: Membuat Halaman Register Custom", type: "assignment", duration: "Upload File" },
            ]
        }
    ]
});
const activeTab = ref('curriculum'); // 'curriculum', 'details', 'settings'
const openSessions = ref([1]); // ID Sesi yang sedang terbuka accordion-nya

// DUMMY DATA (Simulasi struktur data dari backend)
// Nanti ini diambil dari props.course.sessions
const sessions = ref([
    {
        id: 1,
        title: "Sesi 1: Pengenalan & Persiapan Tools",
        items: [
            { id: 101, title: "Apa itu Laravel & Kenapa Menggunakannya?", type: "video", duration: "10m" },
            { id: 102, title: "Instalasi PHP, Composer, dan Laragon", type: "pdf", duration: "5m" },
        ]
    },
    {
        id: 2,
        title: "Sesi 2: Konsep MVC & Routing",
        items: [
            { id: 201, title: "Memahami Model View Controller", type: "video", duration: "15m" },
            { id: 202, title: "Kuis: Dasar Routing", type: "exam", duration: "Kuis" },
            { id: 203, title: "Tugas: Buat 5 Route Get & Post", type: "assignment", duration: "Tugas" },
        ]
    }
]);

// Helper Toggle Accordion
const toggleSession = (id) => {
    if (openSessions.value.includes(id)) {
        openSessions.value = openSessions.value.filter(i => i !== id);
    } else {
        openSessions.value.push(id);
    }
};

// Form sederhana untuk update status
// const form = useForm({
//     status: props.course?.status || 'draft'
// });
</script>

<template>

    <Head :title="`Edit: ${course.title}`" />

    <div class="space-y-6 pb-20">

        <div
            class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <span v-if="course.status === 'published'"
                        class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2 py-0.5 rounded">Terbit</span>
                    <span v-else class="bg-slate-100 text-slate-600 text-xs font-bold px-2 py-0.5 rounded">Draft</span>
                    <h2 class="text-xl font-bold text-slate-900 line-clamp-1">{{ course.title }}</h2>
                </div>
                <p class="text-sm text-slate-500">Terakhir disimpan: Hari ini, 10:42</p>
            </div>
            <div class="flex gap-3">
                <Link :href="`#`"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                <EyeIcon class="w-4 h-4" /> Preview
                </Link>
                <button
                    class="px-6 py-2 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-lg shadow-indigo-200 transition">
                    {{ course.status === 'draft' ? 'Terbitkan Kursus' : 'Simpan Perubahan' }}
                </button>
            </div>
        </div>

        <div class="border-b border-slate-200">
            <nav class="flex gap-8">
                <button @click="activeTab = 'curriculum'" class="pb-4 text-sm font-bold border-b-2 transition"
                    :class="activeTab === 'curriculum' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Kurikulum & Materi
                </button>
                <button @click="activeTab = 'details'" class="pb-4 text-sm font-bold border-b-2 transition"
                    :class="activeTab === 'details' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Informasi Dasar
                </button>
                <button @click="activeTab = 'settings'" class="pb-4 text-sm font-bold border-b-2 transition"
                    :class="activeTab === 'settings' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Harga & Pengaturan
                </button>
            </nav>
        </div>

        <div v-if="activeTab === 'curriculum'" class="max-w-4xl mx-auto space-y-8">

            <div class="flex justify-between items-center">
                <p class="text-slate-500 text-sm">Susun materi pembelajaran Anda di sini.</p>
                <button
                    class="flex items-center gap-2 bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-slate-800 transition">
                    <PlusIcon class="w-4 h-4" /> Tambah Sesi Baru
                </button>
            </div>

            <div class="space-y-6">

                <div v-for="(session, sIndex) in sessions" :key="session.id"
                    class="bg-slate-50 border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300">

                    <div class="bg-slate-100/50 p-4 flex items-center justify-between border-b border-slate-200 group">
                        <div class="flex items-center gap-3 flex-1 cursor-move">
                            <Bars2Icon class="w-5 h-5 text-slate-300 hover:text-slate-600" />
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-800">Sesi {{ sIndex + 1 }}:</span>
                                <input type="text" v-model="session.title"
                                    class="bg-transparent border-none p-0 focus:ring-0 text-slate-800 font-medium w-full" />
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition">
                                <PencilSquareIcon class="w-4 h-4" />
                            </button>
                            <button class="p-1.5 text-slate-400 hover:text-red-500 transition">
                                <TrashIcon class="w-4 h-4" />
                            </button>
                            <button @click="toggleSession(session.id)"
                                class="p-1.5 text-slate-400 hover:text-slate-700 transition">
                                <ChevronDownIcon class="w-5 h-5 transition-transform"
                                    :class="openSessions.includes(session.id) ? 'rotate-180' : ''" />
                            </button>
                        </div>
                    </div>

                    <div v-show="openSessions.includes(session.id)" class="p-4 bg-white">

                        <div v-if="session.items.length > 0" class="space-y-3 mb-6">
                            <div v-for="item in session.items" :key="item.id"
                                class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:border-indigo-100 hover:bg-indigo-50/30 transition group cursor-pointer">
                                <div class="flex items-center gap-4">
                                    <div class="p-2 bg-white border border-slate-100 rounded-lg shadow-sm">
                                        <VideoCameraIcon v-if="item.type === 'video'" class="w-5 h-5 text-indigo-500" />
                                        <DocumentTextIcon v-else-if="item.type === 'pdf'"
                                            class="w-5 h-5 text-red-500" />
                                        <AcademicCapIcon v-else-if="item.type === 'exam'"
                                            class="w-5 h-5 text-emerald-500" />
                                        <ClipboardDocumentCheckIcon v-else class="w-5 h-5 text-orange-500" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">{{
                                            item.title }}</p>
                                        <p class="text-xs text-slate-400 capitalize">{{ item.type }} • {{ item.duration
                                            }}</p>
                                    </div>
                                </div>

                                <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition">
                                    <button class="p-1.5 text-slate-400 hover:text-indigo-600">
                                        <PencilSquareIcon class="w-4 h-4" />
                                    </button>
                                    <button class="p-1.5 text-slate-400 hover:text-red-600">
                                        <TrashIcon class="w-4 h-4" />
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div v-else
                            class="text-center py-6 text-slate-400 text-sm italic border-2 border-dashed border-slate-100 rounded-xl mb-6">
                            Belum ada materi di sesi ini.
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 text-xs font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                <VideoCameraIcon class="w-4 h-4" /> + Video
                            </button>
                            <button
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 text-xs font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                <DocumentTextIcon class="w-4 h-4" /> + Materi Teks/PDF
                            </button>
                            <button
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 text-xs font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                <ClipboardDocumentCheckIcon class="w-4 h-4" /> + Tugas
                            </button>
                            <button
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 text-xs font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                <AcademicCapIcon class="w-4 h-4" /> + Kuis
                            </button>
                            <button
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 text-xs font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                <PuzzlePieceIcon class="w-4 h-4" /> + Proyek
                            </button>
                        </div>

                    </div>
                </div>

                <button
                    class="w-full py-4 border-2 border-dashed border-slate-300 rounded-2xl text-slate-400 font-bold hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 transition flex flex-col items-center justify-center gap-2">
                    <PlusIcon class="w-6 h-6" />
                    Tambah Sesi Baru
                </button>

            </div>
        </div>

        <div v-if="activeTab === 'details'">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm text-center text-slate-500">
                <p>Form "Informasi Dasar" (Judul, Deskripsi, Thumbnail) diletakkan di sini.</p>
                <Link href="#" class="text-indigo-600 font-bold hover:underline">Edit Informasi Dasar</Link>
            </div>
        </div>

        <div v-if="activeTab === 'settings'">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm text-center text-slate-500">
                <p>Form pengaturan harga, level, dan kategori diletakkan di sini.</p>
            </div>
        </div>

    </div>
</template>
