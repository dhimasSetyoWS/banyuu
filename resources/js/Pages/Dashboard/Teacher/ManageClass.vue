<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// Gunakan Persistent Layout dengan Header Custom
export default {
    layout: (h, page) => h(AuthenticatedLayout,
        {
            title: 'Kelola Kursus',
            header: 'Kelola Kursus'
        },
        () => [page]
    )
}
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {formatRupiah} from '@/utils/formatRupiah';
import {formatDate} from '@/utils/formatDate';
import {
    PlusIcon,
    MagnifyingGlassIcon,
    PencilSquareIcon,
    TrashIcon,
    SwatchIcon, // Icon untuk "Kelola Materi/Kurikulum"
    UsersIcon,
    ClockIcon,
    EllipsisVerticalIcon
} from '@heroicons/vue/24/outline';

// --- STATE ---
const searchQuery = ref('');
const activeTab = ref('all'); // 'all', 'published', 'draft'

defineProps({
    coursera: Array
});


// --- FILTER LOGIC ---
const filteredCourses = computed(() => {
    let data = courses;

    // 1. Filter Tab
    if (activeTab.value !== 'all') {
        data = data.filter(c => c.status === activeTab.value);
    }

    // 2. Filter Search
    if (searchQuery.value) {
        data = data.filter(c =>
            c.title.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    }

    return data;
});
</script>

<template>

    <Head title="Kelola Kursus" />

    <div class="space-y-6">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="flex flex-col md:flex-row gap-4 flex-1">
                <div class="relative w-full md:w-80">
                    <input v-model="searchQuery" type="text" placeholder="Cari judul kursus..."
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm">
                    <MagnifyingGlassIcon class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" />
                </div>

                <div class="flex bg-slate-100 p-1 rounded-xl w-fit">
                    <button @click="activeTab = 'all'" class="px-4 py-1.5 text-sm font-medium rounded-lg transition"
                        :class="activeTab === 'all' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'">Semua</button>
                    <button @click="activeTab = 'published'"
                        class="px-4 py-1.5 text-sm font-medium rounded-lg transition"
                        :class="activeTab === 'published' ? 'bg-white text-emerald-700 shadow-sm' : 'text-slate-500 hover:text-slate-700'">Terbit</button>
                    <button @click="activeTab = 'draft'" class="px-4 py-1.5 text-sm font-medium rounded-lg transition"
                        :class="activeTab === 'draft' ? 'bg-white text-slate-700 shadow-sm' : 'text-slate-500 hover:text-slate-700'">Draft</button>
                </div>
            </div>

            <Link :href="route('teacher.dashboard.class.create')"
                class="flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm shadow-indigo-200">
            <PlusIcon class="w-5 h-5" />
            Buat Kursus Baru
            </Link>
        </div>

        <div v-if="coursera.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div v-for="course in coursera" :key="course.id"
                class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg hover:border-indigo-100 transition duration-300 flex flex-col">

                <Link :href="route('catalog.single')" class="relative h-48 bg-slate-100 overflow-hidden">
                    <img :src="`https://ui-avatars.com/api/?name=${course.title_course}&background=random&size=512`"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute top-3 right-3">
                        <span
                            class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-lg shadow-sm border border-emerald-200 backdrop-blur-sm">
                            Terbit
                        </span>
                    </div>
                </Link>

                <div class="p-5 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-md">
                            {{ course.kategori?.nama_kategori ?? 'Umum' }}
                        </span>

                        <div class="flex items-center gap-1 text-slate-400 text-xs">
                            <ClockIcon class="w-3.5 h-3.5" />
                            {{ formatDate(course.created_at) }}
                        </div>
                    </div>

                    <Link :href="route('catalog.single')"
                        class="font-bold text-slate-900 text-lg leading-snug mb-2 line-clamp-2 group-hover:text-indigo-600 transition">
                        {{ course.title_course }}
                    </Link>

                    <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                        {{ course.description }}
                    </p>

                    <div class="flex items-center gap-4 text-sm text-slate-500 mb-4 mt-auto pt-2">
                        <div class="flex items-center gap-1.5">
                            <UsersIcon class="w-4 h-4" />
                            <span>0 Siswa</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <SwatchIcon class="w-4 h-4" />
                            <span>0 Modul</span>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
                        <span class="font-bold text-slate-900">
                            {{ formatRupiah(course.price) }}
                        </span>

                        <div class="flex gap-2 items-center">
                            <Link :href="route('teacher.dashboard.class.edit', course.id)" class="text-slate-900">
                                <PencilSquareIcon class="w-5 h-5"/>
                            </Link>
                            <Link :href="route('teacher.dashboard.class.edit.material')"
                                class="px-3 py-2 rounded-lg bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition shadow-sm flex items-center gap-2">
                            <SwatchIcon class="w-4 h-4" />
                            Kelola Kursus
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div v-else
            class="flex flex-col items-center justify-center py-16 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50/50">
            <div class="p-4 bg-white rounded-full shadow-sm mb-4">
                <SwatchIcon class="w-10 h-10 text-slate-300" />
            </div>
            <h3 class="text-lg font-bold text-slate-900">Belum ada kursus</h3>
            <p class="text-slate-500 max-w-sm text-center mb-6">Mulai bagikan pengetahuan Anda dengan membuat kursus
                pertama Anda.</p>
            <Link href="#"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-indigo-200">
            Buat Kursus Sekarang
            </Link>
        </div>

    </div>
</template>
