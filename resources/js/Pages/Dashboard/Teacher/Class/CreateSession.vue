<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            title: 'Tambah Sesi Baru',
            header: 'Kelola Materi'
        },
        () => [page]
    )
}
</script>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import {
    DocumentTextIcon,
    ArrowLeftIcon,
    Bars3BottomLeftIcon // Icon Deskripsi
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY (Context: Menambahkan sesi ke kursus ini) ---
const course = {
    id: 99,
    title_course: 'Mastering Laravel & Vue.js: Fullstack Development',
    category: 'Web Development'
};

// Form State
const form = useForm({
    title: '',
    type: 'video', // default select
    duration: '', // dalam menit
    description: '',
});

const submit = () => {
    console.log('Menambahkan Sesi:', form.data());
    alert('Simulasi tambah sesi berhasil!');
};
</script>

<template>
    <Head title="Tambah Sesi" />

    <div class="max-w-3xl mx-auto space-y-6">

        <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
            <Link :href="route('teacher.dashboard.class.edit.session')" class="flex items-center gap-1 hover:text-indigo-600 transition">
                <ArrowLeftIcon class="w-4 h-4" />
                Kembali ke Detail Kursus
            </Link>
            <span>/</span>
            <span class="text-slate-900 font-medium">Tambah Sesi</span>
        </div>

        <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 flex items-start gap-3">
            <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg shrink-0">
                <DocumentTextIcon class="w-5 h-5" />
            </div>
            <div>
                <p class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-0.5">Kursus Terpilih</p>
                <h3 class="font-bold text-slate-900">{{ course.title_course }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-slate-100">
                <h3 class="font-bold text-slate-900 text-lg">Detail Sesi</h3>
                <p class="text-sm text-slate-500">Isi informasi materi yang akan dipelajari siswa.</p>
            </div>

            <form @submit.prevent="submit" class="p-6 space-y-6">

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700">
                        Judul Sesi <span class="text-red-500">*</span>
                    </label>
                    <input
                        v-model="form.title"
                        type="text"
                        placeholder="Contoh: Pengenalan Routing pada Laravel..."
                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm"
                    >
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700">Deskripsi Singkat</label>
                    <div class="relative">
                        <textarea
                            v-model="form.description"
                            rows="4"
                            placeholder="Jelaskan secara singkat apa yang akan dibahas pada sesi ini..."
                            class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm resize-none"
                        ></textarea>
                        <Bars3BottomLeftIcon class="w-5 h-5 text-slate-400 absolute left-3 top-3" />
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 mt-6">
                    <Link :href="route('teacher.dashboard.class.edit.material')" class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-50 transition">
                        Batal
                    </Link>
                    <button
                        type="submit"
                        class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition shadow-lg shadow-indigo-200"
                    >
                        Simpan Sesi
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>
