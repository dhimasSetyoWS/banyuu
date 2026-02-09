<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Edit Exam' }, () => [page])
}
</script>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon,
    DocumentTextIcon,
    TagIcon,
    CloudArrowUpIcon, // Icon Upload
    XMarkIcon,        // Icon Hapus
    PaperClipIcon     // Icon File
} from '@heroicons/vue/24/outline';

const form = useForm({
    title: 'Judul exam yang sudah ada',
    content: '',
    course_id: '',
    subject: '',
    file: null,      // Tambahkan field file
});

const submit = () => {
    // Saat upload file, Inertia otomatis mengubah request jadi multipart/form-data
    form.post(route('teacher.material.store'));
};

// Logic Handle File Upload
const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.file = file;
    }
};

const removeFile = () => {
    form.file = null;
    // Reset input value agar bisa upload file yang sama jika perlu
    document.getElementById('file-upload').value = '';
};
</script>

<template>

    <Head title="Tambah Exam" />

    <form @submit.prevent="submit" class="max-w-5xl mx-auto pb-20">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <Link :href="route('teacher.dashboard.class.edit.session')"
                class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                <ChevronLeftIcon class="w-4 h-4" />
                Kembali ke Edit Session
            </Link>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm">

            <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2">
                <DocumentTextIcon class="w-5 h-5 text-slate-400" />
                Konten Exam
            </h3>

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Exam</label>
                    <input v-model="form.title" type="text"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-900 placeholder:text-slate-400 font-medium"
                        placeholder="Contoh: Pengenalan HTML5 & Struktur Dasar">
                    <p v-if="form.errors.title" class="text-xs text-red-500 mt-1">{{ form.errors.title }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Subject</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <TagIcon class="h-4 w-4 text-slate-400" />
                            </div>
                            <select v-model="form.subject"
                                class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer transition">
                                <option disabled value="">Pilih subject</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Biologi">Biologi</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Teknologi">Teknologi</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Lampiran (Opsional)</label>

                        <div v-if="!form.file" class="relative group">
                            <input type="file" id="file-upload" @change="handleFileUpload" class="hidden" />
                            <label for="file-upload"
                                class="flex flex-col items-center justify-center w-full h-[46px] border-2 border-dashed border-slate-300 rounded-xl cursor-pointer bg-slate-50 hover:bg-indigo-50 hover:border-indigo-300 transition group-hover:text-indigo-600">
                                <div class="flex items-center gap-2 text-slate-400 group-hover:text-indigo-600">
                                    <CloudArrowUpIcon class="w-5 h-5" />
                                    <span class="text-xs font-bold">Upload File</span>
                                </div>
                            </label>
                        </div>

                        <div v-else
                            class="flex items-center justify-between w-full h-[46px] px-3 border border-indigo-200 bg-indigo-50 rounded-xl">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <PaperClipIcon class="w-4 h-4 text-indigo-600 flex-shrink-0" />
                                <span class="text-xs font-medium text-indigo-700 truncate max-w-[120px]">
                                    {{ form.file.name }}
                                </span>
                            </div>
                            <button type="button" @click="removeFile"
                                class="text-slate-400 hover:text-red-500 transition">
                                <XMarkIcon class="w-4 h-4" />
                            </button>
                        </div>
                        <p v-if="form.errors.file" class="text-xs text-red-500 mt-1">{{ form.errors.file }}</p>
                    </div>

                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Isi Exam</label>
                    <div class="prose-editor-wrapper">
                        <QuillEditor v-model:content="form.content" contentType="html" theme="snow" toolbar="full"
                            placeholder="Tulis exam di sini..." />
                    </div>
                    <p v-if="form.errors.content" class="text-xs text-red-500 mt-1">{{ form.errors.content }}</p>
                </div>

            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit" :disabled="form.processing"
                class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70 cursor-pointer">
                <span v-if="form.processing">Menyimpan...</span>
                <span v-else>Simpan Exam</span>
            </button>
        </div>

    </form>
</template>

<style>
/* Kustomisasi Tampilan Quill agar senada dengan Tailwind */
.prose-editor-wrapper .ql-toolbar {
    border-top-left-radius: 0.75rem;
    /* rounded-xl */
    border-top-right-radius: 0.75rem;
    border-color: #e2e8f0;
    /* slate-200 */
    background-color: #f8fafc;
    /* slate-50 */
    font-family: 'Inter', sans-serif;
}

.prose-editor-wrapper .ql-container {
    border-bottom-left-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
    border-color: #e2e8f0;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: #334155;
    /* slate-700 */
    min-height: 300px;
    /* Tinggi minimal editor */
}

/* Mengubah border saat focus (opsional, agak tricky di quill default css) */
.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1;
    /* indigo-500 */
}
</style>
