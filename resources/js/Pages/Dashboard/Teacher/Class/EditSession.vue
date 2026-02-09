<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            title: 'Edit Sesi & Konten',
            header: 'Edit Sesi & Konten'
        },
        () => [page]
    )
}
</script>

<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    PencilSquareIcon,
    ArrowLeftIcon,
    PlusIcon,
    DocumentTextIcon,       // Icon Materi
    PuzzlePieceIcon,        // Icon Quiz
    ClipboardDocumentCheckIcon, // Icon Assessment
    CommandLineIcon,        // Icon Project
    EllipsisVerticalIcon,
    TrashIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY ---
// Data Sesi yang sedang diedit
const sessionData = {
    id: 101,
    title: 'Pengenalan Framework Laravel',
    description: 'Pada sesi ini kita akan membahas struktur folder dan konsep MVC.',
    course_id: 99
};

// Data Dummy Konten yang sudah ada di dalam sesi ini (biar gak kosong tampilannya)
const existingContents = ref([
    { id: 1, title: 'Video: Konsep MVC', type: 'materi', duration: '10 min' },
    { id: 2, title: 'PDF: Struktur Folder Laravel', type: 'materi', duration: '5 min' },
]);

// --- STATE ---
const form = useForm({
    title: sessionData.title,
    description: sessionData.description,
});

const isDropdownOpen = ref(false);

// --- METHODS ---
const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const handleAddContent = (type) => {
    isDropdownOpen.value = false;
    // Logika redirect atau modal create content disini
    if(type == 'materi') {
        router.get(route('teacher.dashboard.class.create.material'))
    } else if(type == 'assignment') {
        router.get(route('teacher.dashboard.class.create.assignment'))
    } else if(type == 'exam') {
        router.get(route('teacher.dashboard.class.create.exam'))
    } else if(type == 'project') {
        router.get(route('teacher.dashboard.class.create.project'))
    }
};

const updateSession = () => {
    alert('Detail sesi diperbarui!');
};
</script>

<template>
    <Head title="Edit Sesi" />

    <div class="max-w-4xl mx-auto space-y-8">

        <div class="flex items-center gap-2 text-sm text-slate-500">
            <Link :href="route('teacher.dashboard.class.edit.material')" class="flex items-center gap-1 hover:text-indigo-600 transition">
                <ArrowLeftIcon class="w-4 h-4" />
                Kembali ke Detail Kursus
            </Link>
            <span>/</span>
            <span class="text-slate-900 font-medium">Edit Sesi</span>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-900 flex items-center gap-2">
                    <PencilSquareIcon class="w-5 h-5 text-indigo-600" />
                    Informasi Sesi
                </h3>
            </div>

            <form @submit.prevent="updateSession" class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Nama Sesi</label>
                    <input
                        v-model="form.title"
                        type="text"
                        class="w-full px-4 py-2 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                    >
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Deskripsi</label>
                    <textarea
                        v-model="form.description"
                        rows="3"
                        class="w-full px-4 py-2 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition resize-none"
                    ></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-4">

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-lg text-slate-900">Isi Sesi (Materi & Tugas)</h3>
                    <p class="text-sm text-slate-500">Atur urutan dan isi pembelajaran pada sesi ini.</p>
                </div>

                <div class="relative">
                    <button
                        @click="toggleDropdown"
                        class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-lg shadow-indigo-200 cursor-pointer"
                    >
                        <PlusIcon class="w-5 h-5" />
                        Tambah Isi
                    </button>

                    <div v-if="isDropdownOpen"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-xl border border-slate-200 shadow-xl z-20 overflow-hidden animate-in fade-in zoom-in-95 duration-100"
                    >
                        <div class="py-1">
                            <button @click="handleAddContent('materi')" class="w-full text-left px-4 py-3 hover:bg-slate-200 flex items-center gap-3 transition cursor-pointer">
                                <div class="p-1.5 bg-blue-100 text-blue-600 rounded-lg">
                                    <DocumentTextIcon class="w-5 h-5" />
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-700">Materi</span>
                                    <span class="block text-xs text-slate-500">Video, Artikel, PDF</span>
                                </div>
                            </button>

                            <button @click="handleAddContent('assignment')" class="w-full text-left px-4 py-3 hover:bg-slate-200 flex items-center gap-3 transition cursor-pointer">
                                <div class="p-1.5 bg-amber-100 text-amber-600 rounded-lg">
                                    <PuzzlePieceIcon class="w-5 h-5" />
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-700">Assignment</span>
                                    <span class="block text-xs text-slate-500">Tugas - Tugas Murid</span>
                                </div>
                            </button>

                            <button @click="handleAddContent('exam')" class="w-full text-left px-4 py-3 hover:bg-slate-200 flex items-center gap-3 transition cursor-pointer">
                                <div class="p-1.5 bg-emerald-100 text-emerald-600 rounded-lg">
                                    <ClipboardDocumentCheckIcon class="w-5 h-5" />
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-700">Exam</span>
                                    <span class="block text-xs text-slate-500">Ujian untuk murid</span>
                                </div>
                            </button>

                            <button @click="handleAddContent('project')" class="w-full text-left px-4 py-3 hover:bg-slate-200 flex items-center gap-3 transition cursor-pointer">
                                <div class="p-1.5 bg-purple-100 text-purple-600 rounded-lg">
                                    <CommandLineIcon class="w-5 h-5" />
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-700">Project</span>
                                    <span class="block text-xs text-slate-500">Submission Project</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div v-if="isDropdownOpen" @click="isDropdownOpen = false" class="fixed inset-0 z-10"></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <div v-if="existingContents.length > 0">
                    <div
                        v-for="(item, index) in existingContents"
                        :key="item.id"
                        class="p-4 flex items-center justify-between hover:bg-slate-50 transition border-b border-slate-100 last:border-b-0"
                    >
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 flex items-center justify-center bg-slate-100 rounded-lg text-slate-500 text-xs font-bold">
                                {{ index + 1 }}
                            </div>

                            <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                                <DocumentTextIcon class="w-5 h-5" />
                            </div>

                            <div>
                                <h4 class="text-sm font-bold text-slate-900">{{ item.title }}</h4>
                                <span class="text-xs text-slate-500 capitalize">{{ item.type }} • {{ item.duration }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <Link :href="route('teacher.dashboard.class.edit.material')" class="p-2 hover:bg-slate-200 rounded-lg text-slate-500 transition">
                                <PencilSquareIcon class="w-4 h-4" />
                            </Link>
                            <button class="p-2 hover:bg-red-50 hover:text-red-600 rounded-lg text-slate-400 transition">
                                <TrashIcon class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>

                <div v-else class="p-8 text-center text-slate-500">
                    <p>Belum ada materi di sesi ini.</p>
                </div>
            </div>

        </div>

    </div>
</template>
