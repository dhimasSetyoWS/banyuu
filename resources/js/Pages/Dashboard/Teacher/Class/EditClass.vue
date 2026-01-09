<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Persistent Layout
export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            title: 'Edit Detail Kursus',
            header: 'Edit Detail Kursus'
        },
        () => [page]
    )
}
</script>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import {
    CalendarDaysIcon,
    PencilSquareIcon,
    ArrowLeftIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY (Ceritanya data dari Database) ---
const dummyCourseData = {
    id: 99,
    title_course: 'Mastering Laravel & Vue.js: Fullstack Development',
    start_date: '2026-02-01', // Format YYYY-MM-DD agar terbaca input date
    end_date: '2026-05-30'
};

// Inisialisasi Form dengan Data Dummy
const form = useForm({
    title_course: dummyCourseData.title_course,
    start_date: dummyCourseData.start_date,
    end_date: dummyCourseData.end_date,
});

// Mock Submit Function
const submit = () => {
    // Simulasi loading sebentar
    console.log('Data yang dikirim:', form.data());
    alert('Simulasi update berhasil! Cek console untuk liat datanya.');
};
</script>

<template>
    <Head title="Edit Kursus" />

    <div class="max-w-3xl mx-auto space-y-6">

        <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
            <Link :href="route('teacher.dashboard.class.index')" class="flex items-center gap-1 hover:text-indigo-600 transition">
                <ArrowLeftIcon class="w-4 h-4" />
                Kembali ke Kelola Kursus
            </Link>
            <span>/</span>
            <span class="text-slate-900 font-medium">Edit Detail</span>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="bg-slate-50/50 px-6 py-4 border-b border-slate-100 flex items-center gap-3">
                <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                    <PencilSquareIcon class="w-5 h-5" />
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">Informasi Dasar Kursus</h3>
                    <p class="text-sm text-slate-500">Perbarui nama dan jadwal pelaksanaan kursus.</p>
                </div>
            </div>

            <form @submit.prevent="submit" class="p-6 space-y-6">

                <div class="space-y-2">
                    <label for="title_course" class="block text-sm font-bold text-slate-700">
                        Nama Kursus <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="title_course"
                        v-model="form.title_course"
                        type="text"
                        placeholder="Contoh: Pemrograman Web Lanjut..."
                        class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm"
                    >
                    <p v-if="form.errors.title_course" class="text-red-500 text-xs mt-1">
                        {{ form.errors.title_course }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="space-y-2">
                        <label for="start_date" class="block text-sm font-bold text-slate-700 flex items-center gap-2">
                            <CalendarDaysIcon class="w-4 h-4 text-slate-400" />
                            Tanggal Mulai
                        </label>
                        <input
                            id="start_date"
                            v-model="form.start_date"
                            type="date"
                            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm text-slate-600"
                        >
                    </div>

                    <div class="space-y-2">
                        <label for="end_date" class="block text-sm font-bold text-slate-700 flex items-center gap-2">
                            <CalendarDaysIcon class="w-4 h-4 text-slate-400" />
                            Tanggal Selesai
                        </label>
                        <input
                            id="end_date"
                            v-model="form.end_date"
                            type="date"
                            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm text-slate-600"
                        >
                    </div>

                </div>

                <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                    <Link
                        :href="route('teacher.dashboard.class.index')"
                        class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-50 border border-transparent hover:border-slate-200 transition"
                    >
                        Batal
                    </Link>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 flex items-center gap-2"
                    >
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>
