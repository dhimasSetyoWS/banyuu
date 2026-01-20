<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    // Mengubah header layout menjadi "Edit Kursus"
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Edit Kursus' }, () => [page])
}
</script>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import { watch } from 'vue';
import {
    CurrencyDollarIcon,
    TagIcon,
    ChevronLeftIcon,
    DocumentTextIcon
} from '@heroicons/vue/24/outline';

// 1. Terima Data Existing (Course) dan Data Dropdown
const props = defineProps({
    course: Object,    // Data kursus yang akan diedit
    kategoris: Array,  // Data untuk dropdown kategori
});

// 2. Setup Form dengan Data Awal (Pre-filled)
const form = useForm({
    title_course: props.course.title_course || '',
    slug: props.course.slug || '',
    description: props.course.description || '',
    price: props.course.price || 0,
    kategori_id: props.course.kategori_id || '',
});

// 3. Auto Generate Slug (Opsional)
// Catatan: Biasanya saat Edit, kita ingin slug tetap update jika judul berubah.
// Jika ingin slug TIDAK berubah saat edit judul, hapus watcher ini.
watch(() => form.title_course, (newTitle) => {
    form.slug = newTitle
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
});

// 4. Submit menggunakan PUT ke route update
const submit = () => {
    // Pastikan nama route sesuai dengan route resource kamu, misal: 'course.update'
    form.put(route('course.update', props.course.id));
};

const deleteCourse = () => {
    if (confirm('YAKIN HAPUS KURSUS INI? \n\nData yang dihapus tidak bisa dikembalikan, termasuk materi di dalamnya.')) {
        router.delete(route('teacher.dashboard.class.destroy', props.course.id));
    }
};
</script>

<template>
    <Head title="Edit Kursus" />

    <form @submit.prevent="submit" class="max-w-6xl mx-auto pb-20">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <Link :href="route('teacher.dashboard.class.index')" class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                <ChevronLeftIcon class="w-4 h-4" />
                Kembali
            </Link>
            <div class="space-x-2">
                <button @click="deleteCourse" type="button" :disabled="form.processing"
                    class="px-6 py-2.5 cursor-pointer rounded-xl bg-red-600 text-white text-sm font-bold hover:bg-red-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70">
                    <span v-if="form.processing">Menghapus...</span>
                    <span v-else>Hapus Kursus</span>
                </button>
                <button type="submit" :disabled="form.processing"
                    class="px-6 py-2.5 cursor-pointer rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70">
                    <span v-if="form.processing">Menyimpan...</span>
                    <span v-else>Perbarui Kursus</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2">
                        <DocumentTextIcon class="w-5 h-5 text-slate-400" />
                        Informasi Kursus
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kursus</label>
                            <input v-model="form.title_course" type="text"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-900 placeholder:text-slate-400 font-medium"
                                placeholder="Contoh: Master Laravel 11">
                            <p v-if="form.errors.title_course" class="text-xs text-red-500 mt-1">{{ form.errors.title_course }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Slug URL</label>
                            <div class="flex items-center bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-500 text-xs">
                                <span>domain.com/course/</span>
                                <input disabled v-model="form.slug" type="text"
                                    class="bg-transparent border-none p-0 focus:ring-0 text-slate-900 ml-1 w-full font-medium cursor-not-allowed">
                            </div>
                            <p v-if="form.errors.slug" class="text-xs text-red-500 mt-1">{{ form.errors.slug }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap</label>
                            <textarea v-model="form.description" rows="8"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-700 resize-none"
                                placeholder="Jelaskan detail materi yang akan dipelajari..."></textarea>
                            <p v-if="form.errors.description" class="text-xs text-red-500 mt-1">{{ form.errors.description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-900 text-sm mb-4 flex items-center gap-2">
                        <CurrencyDollarIcon class="w-5 h-5 text-emerald-500" />
                        Harga Kursus
                    </h3>

                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-slate-500 text-sm font-bold">Rp</span>
                        <input v-model="form.price" type="number"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-slate-900 font-bold placeholder:text-slate-300"
                            placeholder="0">
                    </div>
                    <p class="text-xs text-slate-400 mt-2">Isi 0 jika kursus gratis.</p>
                    <p v-if="form.errors.price" class="text-xs text-red-500 mt-1">{{ form.errors.price }}</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wide flex items-center gap-1">
                            <TagIcon class="w-3 h-3" /> Kategori
                        </label>
                        <select v-model="form.kategori_id"
                            class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-slate-700 bg-white">
                            <option value="" disabled>Pilih Kategori</option>
                            <option v-for="cat in kategoris" :key="cat.id" :value="cat.id">
                                {{ cat.nama_kategori }}
                            </option>
                        </select>
                        <p v-if="form.errors.kategori_id" class="text-xs text-red-500 mt-1">{{ form.errors.kategori_id }}</p>
                    </div>
                </div>

            </div>
        </div>
    </form>
</template>
