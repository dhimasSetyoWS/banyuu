<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Detail Tugas' }, () => [page])
}
</script>

<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon,
    ClipboardDocumentIcon,
    ClockIcon,
    PaperClipIcon,
    CloudArrowUpIcon,
    XMarkIcon,
    CheckCircleIcon,
    ArrowDownTrayIcon,
    InformationCircleIcon,
    PencilSquareIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY TUGAS ---
const assignment = {
    title: "Tugas 2: Styling Tabel Menggunakan CSS",
    subject: "Web Development",
    points: 100,
    deadline: "17 Okt 2024, 23:59 WIB",
    instructor: "Budi Santoso, S.Kom",
    instructions: `
        <p>Silakan kerjakan tugas pembuatan tabel data mahasiswa dengan ketentuan sebagai berikut:</p>
        <ul>
            <li>Gunakan tag HTML <code>&lt;table&gt;</code> yang semantik.</li>
            <li>Berikan styling CSS (Padding, Hover effect pada row, dan Header background).</li>
            <li>Pastikan tampilan responsif pada layar mobile.</li>
        </ul>
    `,
    attachment: { name: "Panduan_Styling_Tabel.pdf", size: "1.2 MB" }
};

// --- LOGIC PENGUMPULAN ---
const form = useForm({
    file: null,
    text_content: '', // Konten dari Quill Editor
    notes: ''
});

const handleFileUpload = (e) => {
    form.file = e.target.files[0];
};

const removeFile = () => {
    form.file = null;
};

const submitAssignment = () => {
    // Validasi: minimal harus ada file atau ada teks di editor
    const hasText = form.text_content.replace(/<[^>]*>?/gm, '').trim().length > 0;

    if (!form.file && !hasText) {
        return alert("Mohon unggah file atau tuliskan jawaban teks terlebih dahulu!");
    }

    console.log("Mengirim Tugas:", form.data());
    alert("Tugas Anda berhasil dikirim!");
};
</script>

<template>

    <Head :title="assignment.title" />

    <div class="max-w-7xl mx-auto pb-20 px-4">

        <div class="mb-6">
            <Link :href="route('dashboard.class.study.show')"
                class="flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-indigo-600 transition w-fit">
                <ChevronLeftIcon class="w-4 h-4" /> Kembali ke Sesi
            </Link>
        </div>

        <div class="space-y-6">

            <div class="space-y-6">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 md:p-10">
                        <div class="flex items-start justify-between gap-4 mb-8">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 shrink-0">
                                    <ClipboardDocumentIcon class="w-8 h-8" />
                                </div>
                                <div>
                                    <h1 class="text-2xl font-black text-slate-900 leading-tight">{{ assignment.title }}
                                    </h1>
                                    <p class="text-sm text-slate-500 font-medium mt-1">{{ assignment.instructor }} • {{
                                        assignment.subject }}</p>
                                </div>
                            </div>
                            <div class="text-right hidden sm:block">
                                <span class="block text-2xl font-black text-slate-900">{{ assignment.points }}</span>
                                <span class="text-[10px] font-bold uppercase text-slate-400 tracking-widest">Poin
                                    Maks</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 mb-10">
                            <ClockIcon class="w-5 h-5 text-orange-500" />
                            <div class="text-sm">
                                <span class="text-slate-500">Batas Pengumpulan: </span>
                                <span class="font-bold text-slate-700">{{ assignment.deadline }}</span>
                            </div>
                        </div>

                        <div class="prose prose-slate prose-indigo max-w-none mb-10">
                            <h3 class="text-lg font-black text-slate-900 mb-4 flex items-center gap-2">
                                <InformationCircleIcon class="w-5 h-5 text-indigo-500" />
                                Instruksi Pengerjaan
                            </h3>
                            <div v-html="assignment.instructions"></div>
                        </div>

                        <div v-if="assignment.attachment" class="pt-6 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Lampiran
                                Referensi</h3>
                            <div
                                class="flex items-center justify-between p-4 border border-slate-200 rounded-2xl bg-white hover:border-indigo-300 transition group w-full sm:w-80 cursor-pointer">
                                <div class="flex items-center gap-3 overflow-hidden">
                                    <PaperClipIcon class="w-5 h-5 text-slate-400 group-hover:text-indigo-600" />
                                    <div class="flex flex-col overflow-hidden">
                                        <span class="text-xs font-bold text-slate-700 truncate">{{
                                            assignment.attachment.name }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium uppercase">{{
                                            assignment.attachment.size }}</span>
                                    </div>
                                </div>
                                <ArrowDownTrayIcon class="w-4 h-4 text-slate-400 group-hover:text-indigo-600" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 md:p-8">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <PencilSquareIcon class="w-5 h-5 text-indigo-600" />
                            Jawaban Anda
                        </h3>
                        <span
                            class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-amber-50 text-amber-600 border border-amber-100">Belum
                            Dikirim</span>
                    </div>

                    <form @submit.prevent="submitAssignment" class="space-y-6">

                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black uppercase text-slate-400 tracking-wider flex items-center gap-2">
                                Jawaban Teks
                            </label>
                            <div class="prose-editor-wrapper">
                                <QuillEditor v-model:content="form.text_content" contentType="html" theme="snow"
                                    toolbar="minimal"
                                    placeholder="Tuliskan jawaban atau penjelasan tugas Anda di sini..." />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase text-slate-400 tracking-wider">
                                Unggah File (Opsional)
                            </label>

                            <div v-if="!form.file">
                                <label for="assignment-upload"
                                    class="group flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-200 rounded-2xl cursor-pointer bg-slate-50 hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-300">
                                    <div class="flex items-center gap-3 text-slate-400 group-hover:text-indigo-600">
                                        <CloudArrowUpIcon class="w-6 h-6" />
                                        <span class="text-xs font-bold uppercase tracking-widest">Pilih File</span>
                                    </div>
                                    <input id="assignment-upload" type="file" class="hidden"
                                        @change="handleFileUpload" />
                                </label>
                            </div>

                            <div v-else
                                class="flex items-center justify-between p-4 bg-indigo-50 border border-indigo-100 rounded-2xl animate-fade-in">
                                <div class="flex items-center gap-3 overflow-hidden">
                                    <CheckCircleIcon class="w-6 h-6 text-emerald-500 shrink-0" />
                                    <span class="text-xs font-bold text-indigo-900 truncate">{{ form.file.name }}</span>
                                </div>
                                <button type="button" @click="removeFile"
                                    class="p-1.5 text-slate-400 hover:text-red-500 hover:bg-white rounded-lg transition">
                                    <XMarkIcon class="w-4 h-4" />
                                </button>
                            </div>
                        </div>

                        <div>
                            <label
                                class="text-[11px] font-black uppercase text-slate-400 tracking-wider block mb-2">Catatan
                                untuk Guru</label>
                            <textarea v-model="form.notes" rows="2"
                                class="w-full border-slate-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder:text-slate-300 bg-slate-50 transition"
                                placeholder="Ada pesan tambahan?"></textarea>
                        </div>

                        <button type="submit" :disabled="form.processing"
                            class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-lg shadow-indigo-100 transition-all active:scale-[0.98] disabled:opacity-50">
                            {{ form.processing ? 'Sedang Mengirim...' : 'Kumpulkan Sekarang' }}
                        </button>
                    </form>
                </div>

                <div class="p-6 bg-slate-900 rounded-3xl text-white relative overflow-hidden group">
                    <div
                        class="absolute -right-4 -top-4 w-20 h-20 bg-indigo-500/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                    </div>
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-300 mb-3">Status Terkini
                    </h4>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></div>
                        <p class="text-xs text-slate-300">Menunggu pengerjaan siswa.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style>
/* Kustomisasi Quill Editor untuk Sisi Kanan yang Lebih Kompak */
.prose-editor-wrapper .ql-toolbar {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
    border-color: #e2e8f0;
    background-color: #f8fafc;
}

.prose-editor-wrapper .ql-container {
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    border-color: #e2e8f0;
    min-height: 180px;
    /* Tinggi disesuaikan agar tidak terlalu memakan tempat di sidebar */
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
}

.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1;
}

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
    animation: fadeIn 0.3s ease-out forwards;
}
</style>
