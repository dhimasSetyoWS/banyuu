<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Detail Proyek' }, () => [page])
}
</script>

<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon,
    LinkIcon,
    ArrowUpTrayIcon,
    CheckCircleIcon,
    XMarkIcon,
    CalendarIcon,
    InformationCircleIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY GENERIK ---
const project = {
    title: "Analisis Dampak Lingkungan: Kampus Hijau",
    description: "Proyek penelitian mandiri mengenai implementasi sistem pengelolaan limbah di lingkungan kampus serta dampaknya terhadap ekosistem sekitar.",
    deadline: "15 Juni 2026",
    progress: 40,
    milestones: [
        { id: 1, title: "Pengumpulan Data & Observasi", isDone: true },
        { id: 2, title: "Penyusunan Laporan Awal", isDone: false },
        { id: 3, title: "Analisis & Pembahasan", isDone: false },
        { id: 4, title: "Finalisasi & Presentasi", isDone: false }
    ]
};

const form = useForm({
    reference_url: '',
    report_content: '',
    attachment: null
});

const handleFileUpload = (e) => { form.attachment = e.target.files[0]; };
const removeFile = () => { form.attachment = null; };

const submitProgress = () => {
    console.log("Submitting Project Progress:", form.data());
    alert("Progres proyek Anda telah diperbarui!");
};
</script>

<template>
    <Head title="Manajemen Proyek" />

    <div class="max-w-5xl mx-auto pb-20 px-4">

        <div class="mb-10">
            <Link :href="route('dashboard.class.study')" class="text-slate-400 hover:text-slate-600 flex items-center gap-1 text-sm mb-4 transition">
                <ChevronLeftIcon class="w-4 h-4" /> Kembali ke Sesi
            </Link>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ project.title }}</h1>
            <div class="flex items-center gap-4 mt-3">
                <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase bg-slate-100 text-slate-600 border border-slate-200">Proyek Mandiri</span>
                <span class="text-xs text-slate-400 flex items-center gap-1.5 italic">
                    <InformationCircleIcon class="w-4 h-4" /> Klik "Simpan Progres" setiap kali ada perubahan pengerjaan.
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2 space-y-8">

                <div class="prose prose-slate prose-sm max-w-none">
                    <h3 class="text-slate-800 font-bold">Tujuan Proyek</h3>
                    <p class="text-slate-600 leading-relaxed">{{ project.description }}</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <div class="flex justify-between items-center mb-3 text-xs font-black uppercase tracking-widest text-slate-500">
                        <span>Status Pengerjaan</span>
                        <span class="text-indigo-600">{{ project.progress }}%</span>
                    </div>
                    <div class="w-full bg-white h-2.5 rounded-full overflow-hidden border border-slate-200">
                        <div class="bg-indigo-600 h-full rounded-full transition-all duration-1000 ease-in-out shadow-[0_0_8px_rgba(79,70,229,0.4)]" :style="`width: ${project.progress}%`"></div>
                    </div>
                </div>

                <div class="space-y-6 pt-4 border-t border-slate-100">
                    <h3 class="font-bold text-slate-900 text-lg">Lembar Kerja Proyek</h3>

                    <div class="space-y-5">
                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase mb-2 block tracking-wider">Tautan Pendukung (Opsional)</label>
                            <div class="relative group">
                                <LinkIcon class="absolute left-3 top-3.5 w-4 h-4 text-slate-400 group-focus-within:text-indigo-500 transition" />
                                <input v-model="form.reference_url" type="url" placeholder="Contoh: Link Google Drive, Dokumen Publik, atau Hasil Karya"
                                    class="w-full pl-10 pr-4 py-3 text-sm bg-white border-slate-200 rounded-xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 border transition shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label class="text-[11px] font-bold text-slate-400 uppercase mb-2 block tracking-wider">Laporan Kemajuan / Deskripsi Hasil</label>
                            <div class="prose-editor-wrapper">
                                <QuillEditor v-model:content="form.report_content" contentType="html" theme="snow" toolbar="minimal" placeholder="Tuliskan catatan detail atau laporan progres Anda di sini..." />
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-6 items-center justify-between pt-4">
                            <div class="w-full sm:w-auto">
                                <input type="file" id="file-upload-project" class="hidden" @change="handleFileUpload">
                                <label v-if="!form.attachment" for="file-upload-project" class="flex items-center gap-2 text-xs font-bold text-slate-500 cursor-pointer hover:text-indigo-600 transition p-2 border border-dashed border-slate-300 rounded-lg hover:border-indigo-400 hover:bg-indigo-50/30">
                                    <ArrowUpTrayIcon class="w-4 h-4" /> Lampirkan File (Max 10MB)
                                </label>
                                <div v-else class="flex items-center gap-3 bg-emerald-50 px-3 py-2 rounded-xl border border-emerald-100">
                                    <CheckCircleIcon class="w-4 h-4 text-emerald-500" />
                                    <span class="text-xs text-emerald-700 font-medium truncate max-w-[150px]">{{ form.attachment.name }}</span>
                                    <button @click="removeFile" class="text-emerald-400 hover:text-red-500 transition"><XMarkIcon class="w-4 h-4"/></button>
                                </div>
                            </div>

                            <button @click="submitProgress" class="w-full sm:w-auto px-10 py-3.5 bg-slate-900 text-white text-sm font-black rounded-2xl hover:bg-indigo-600 transition-all duration-300 shadow-lg shadow-slate-200 active:scale-95">
                                Simpan Progres
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-900 text-sm mb-6 uppercase tracking-widest">Milestones</h3>
                    <div class="space-y-6">
                        <div v-for="step in project.milestones" :key="step.id" class="flex items-start gap-3 group">
                            <div :class="step.isDone ? 'bg-emerald-500 border-emerald-500' : 'bg-white border-slate-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition duration-300 mt-0.5">
                                <CheckCircleIcon v-if="step.isDone" class="w-4 h-4 text-white" />
                            </div>
                            <span :class="step.isDone ? 'text-slate-400 line-through' : 'text-slate-700 font-medium'" class="text-xs leading-relaxed group-hover:text-indigo-600 transition">
                                {{ step.title }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 p-8 rounded-3xl text-white relative overflow-hidden group">
                    <div class="absolute -right-5 -top-5 w-20 h-20 bg-indigo-500/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-2 opacity-50">
                            <CalendarIcon class="w-4 h-4" />
                            <span class="text-[10px] font-black uppercase tracking-widest">Tenggat Akhir</span>
                        </div>
                        <p class="text-xl font-black">{{ project.deadline }}</p>
                        <div class="mt-6 pt-6 border-t border-white/10 text-[10px] opacity-40 leading-relaxed italic">
                            Pastikan data laporan tersimpan secara berkala sebelum tanggal tenggat.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<style>
/* Cleaner Quill Style */
.prose-editor-wrapper .ql-toolbar {
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    border-color: #e2e8f0;
    border-bottom: none;
    background: #fbfcfd;
    padding: 0.75rem;
}
.prose-editor-wrapper .ql-container {
    border-bottom-left-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
    border-color: #e2e8f0;
    min-height: 250px;
    font-family: inherit;
    font-size: 0.9rem;
    background: #ffffff;
}
.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #cbd5e1; /* Subtle focus */
}
</style>
