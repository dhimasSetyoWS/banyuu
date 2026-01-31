<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Tambah Assignment Baru' }, () => [page])
}
</script>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { ChevronLeftIcon, DocumentTextIcon } from '@heroicons/vue/24/outline';

const form = useForm({
    title: '',
    content: '',
    course_id: '', // Kirim ID kursus
});

const submit = () => {
    // Sesuaikan nama route simpan materi kamu
    form.post(route('teacher.material.store'));
};
</script>

<template>
    <Head title="Tambah Assignment" />

    <form @submit.prevent="submit" class="max-w-5xl mx-auto pb-20">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <Link :href="route('teacher.dashboard.class.edit.session')"
                class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                <ChevronLeftIcon class="w-4 h-4" />
                Kembali ke Edit Session
            </Link>

            <button type="submit" :disabled="form.processing"
                class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70">
                <span v-if="form.processing">Menyimpan...</span>
                <span v-else>Simpan Assignment</span>
            </button>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm">

            <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2">
                <DocumentTextIcon class="w-5 h-5 text-slate-400" />
                Konten Assignment
            </h3>

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Assignment</label>
                    <input v-model="form.title" type="text"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-900 placeholder:text-slate-400 font-medium"
                        placeholder="Contoh: Pengenalan HTML5 & Struktur Dasar">
                    <p v-if="form.errors.title" class="text-xs text-red-500 mt-1">{{ form.errors.title }}</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Isi Assignment</label>

                    <div class="prose-editor-wrapper">
                        <QuillEditor
                            v-model:content="form.content"
                            contentType="html"
                            theme="snow"
                            toolbar="full"
                            placeholder="Tulis assignment di sini..."
                        />
                    </div>

                    <p v-if="form.errors.content" class="text-xs text-red-500 mt-1">{{ form.errors.content }}</p>
                    <p class="text-xs text-slate-400 mt-2">
                        Tips: Anda bisa menyisipkan gambar, link video, atau memformat teks menggunakan toolbar di atas.
                    </p>
                </div>

            </div>
        </div>

    </form>
</template>

<style>
/* Kustomisasi Tampilan Quill agar senada dengan Tailwind */
.prose-editor-wrapper .ql-toolbar {
    border-top-left-radius: 0.75rem; /* rounded-xl */
    border-top-right-radius: 0.75rem;
    border-color: #e2e8f0; /* slate-200 */
    background-color: #f8fafc; /* slate-50 */
    font-family: 'Inter', sans-serif;
}

.prose-editor-wrapper .ql-container {
    border-bottom-left-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
    border-color: #e2e8f0;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: #334155; /* slate-700 */
    min-height: 300px; /* Tinggi minimal editor */
}

/* Mengubah border saat focus (opsional, agak tricky di quill default css) */
.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1; /* indigo-500 */
}
</style>
