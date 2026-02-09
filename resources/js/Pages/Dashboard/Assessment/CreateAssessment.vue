<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Buat Assessment Baru' }, () => [page])
}
</script>

<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon,
    ClipboardDocumentCheckIcon,
    ClockIcon,
    CalendarIcon,
    CloudArrowUpIcon,
    PaperClipIcon,
    XMarkIcon,
    AcademicCapIcon
} from '@heroicons/vue/24/outline';

// Setup Form dengan Data Dummy Awal (Kosong)
const form = useForm({
    title: '',
    type: 'quiz', // Default: Quiz
    description: '',
    is_public : true,
    deadline: '',
    duration: 60,
    passing_grade: 75,
    file: null
});

// Simulasi Submit (Hanya UI)
const submit = () => {
    console.log("Data Assessment dikirim:", form.data());
    alert("Simulasi: Assessment berhasil dibuat! Cek Console F12.");
};

// Simulasi File Upload UI
const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        // Mocking file object props for UI display
        form.file = file;
    }
};

const removeFile = () => {
    form.file = null;
    // Reset input value
    const input = document.getElementById('file-upload');
    if (input) input.value = '';
};
</script>

<template>

    <Head title="Buat Assessment" />

    <form @submit.prevent="submit" class="max-w-5xl mx-auto pb-20">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <Link :href="route('dashboard.assessment.index')"
                class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                <ChevronLeftIcon class="w-4 h-4" />
                Kembali ke Daftar Assessment
            </Link>

            <button type="submit"
                class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
                Simpan Assessment
            </button>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm space-y-8">

            <div class="border-b border-slate-100 pb-4 mb-6">
                <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
                    <ClipboardDocumentCheckIcon class="w-5 h-5 text-slate-400" />
                    Konfigurasi Assessment
                </h3>
                <p class="text-sm text-slate-500 mt-1">Atur jenis ujian, tenggat waktu, dan standar kelulusan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Assessment</label>
                    <input v-model="form.title" type="text"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-900 placeholder:text-slate-400 font-medium"
                        placeholder="Contoh: Ujian Tengah Semester - Algoritma Dasar">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tipe Assessment</label>
                    <div class="relative">
                        <select v-model="form.type"
                            class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-700 bg-white appearance-none cursor-pointer">
                            <option value="quiz">Kuis (Pilihan Ganda)</option>
                            <option value="assignment">Tugas (Upload File)</option>
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 bg-slate-50 p-6 rounded-xl border border-slate-200">

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Deadline</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <CalendarIcon class="h-4 w-4 text-slate-400" />
                        </div>
                        <input v-model="form.deadline" type="datetime-local"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-lg text-slate-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm shadow-sm">
                    </div>
                </div>

                <div v-if="form.type === 'quiz'">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">Durasi
                        (Menit)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <ClockIcon class="h-4 w-4 text-slate-400" />
                        </div>
                        <input v-model="form.duration" type="number" min="1"
                            class="block w-full pl-10 pr-12 py-2.5 border border-slate-300 rounded-lg text-slate-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm shadow-sm"
                            placeholder="60">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-slate-400 text-xs font-medium">Menit</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">KKM (Nilai
                        Lulus)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <AcademicCapIcon class="h-4 w-4 text-slate-400" />
                        </div>
                        <input v-model="form.passing_grade" type="number" min="0" max="100"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-lg text-slate-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm shadow-sm"
                            placeholder="75">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Visibility</label>
                    <div class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 flex items-center gap-3">
                        <input type="checkbox" v-model="form.is_public"
                            class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-600 cursor-pointer accent-indigo-600">
                        <span class="text-slate-600 text-sm font-medium">
                            {{ form.is_public ? 'Publik (Semua Siswa)' : 'Privat (Hanya Saya)' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Instruksi Pengerjaan</label>
                    <div class="prose-editor-wrapper">
                        <QuillEditor v-model:content="form.description" contentType="html" theme="snow"
                            toolbar="minimal" placeholder="Tuliskan instruksi detail atau deskripsi tugas di sini..." />
                    </div>
                    <p class="text-xs text-slate-400 mt-2">Jelaskan peraturan ujian atau detail tugas yang harus
                        dikerjakan siswa.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Lampiran Soal (Opsional)</label>

                    <div v-if="!form.file" class="relative group">
                        <input type="file" id="file-upload" @change="handleFileUpload" class="hidden" />
                        <label for="file-upload"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-xl cursor-pointer bg-slate-50 hover:bg-indigo-50 hover:border-indigo-300 transition group-hover:text-indigo-600">
                            <div
                                class="flex flex-col items-center gap-2 text-slate-400 group-hover:text-indigo-600 transition">
                                <CloudArrowUpIcon class="w-8 h-8" />
                                <span class="text-sm font-bold">Klik untuk Upload File</span>
                                <span class="text-xs text-slate-400">PDF, Docx, atau Gambar (Max 5MB)</span>
                            </div>
                        </label>
                    </div>

                    <div v-else
                        class="flex items-center justify-between w-full p-4 border border-indigo-200 bg-indigo-50 rounded-xl animate-fade-in">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <div class="p-2 bg-white rounded-lg border border-indigo-100 shadow-sm">
                                <PaperClipIcon class="w-5 h-5 text-indigo-600" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-indigo-900 truncate max-w-[200px] sm:max-w-md">
                                    {{ form.file.name }}
                                </span>
                                <span class="text-xs text-indigo-500">
                                    {{ (form.file.size / 1024).toFixed(1) }} KB • Siap diupload
                                </span>
                            </div>
                        </div>
                        <button type="button" @click="removeFile"
                            class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-lg transition"
                            title="Hapus File">
                            <XMarkIcon class="w-5 h-5" />
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</template>

<style>
/* Kustomisasi Tampilan Quill */
.prose-editor-wrapper .ql-toolbar {
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    border-color: #e2e8f0;
    background-color: #f8fafc;
    font-family: 'Inter', sans-serif;
}

.prose-editor-wrapper .ql-container {
    border-bottom-left-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
    border-color: #e2e8f0;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: #334155;
    min-height: 200px;
}

.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1;
}

/* Animasi Fade In simpel */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-5px);
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
