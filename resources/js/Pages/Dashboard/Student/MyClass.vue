<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout,
    {
        title : "Kelas Saya",
        header : "Kelas Saya"
    }, () => [page])
}
</script>
<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {
    MagnifyingGlassIcon,
    PlayCircleIcon,
    CheckBadgeIcon,
    ClockIcon
} from '@heroicons/vue/24/outline';
import { StarIcon } from '@heroicons/vue/24/solid'; // Icon solid untuk rating

// 1. STATE UNTUK FILTER
const activeTab = ref('all'); // Pilihan: 'all', 'in_progress', 'completed'
const searchQuery = ref('');

// 2. DUMMY DATA KURSUS
const courses = [
    {
        id: 1,
        title: "Mastering Vue 3 & Composition API",
        category: "Web Development",
        instructor: "Budi Santoso",
        thumbnail: "https://placehold.co/600x400/e2e8f0/4f46e5?text=Vue+3", // Ganti dengan real image
        total_lessons: 42,
        completed_lessons: 24,
        progress: 57, // Persentase
        status: "in_progress",
        last_accessed: "2 jam yang lalu"
    },
    {
        id: 2,
        title: "UI/UX Design: From Zero to Hero",
        category: "Design",
        instructor: "Sarah Wijaya",
        thumbnail: "https://placehold.co/600x400/e2e8f0/ec4899?text=UI+UX",
        total_lessons: 30,
        completed_lessons: 30,
        progress: 100,
        status: "completed",
        finished_at: "12 Nov 2024"
    },
    {
        id: 3,
        title: "Python for Data Science Bootcamp",
        category: "Data Science",
        instructor: "John Doe",
        thumbnail: "https://placehold.co/600x400/e2e8f0/10b981?text=Python",
        total_lessons: 55,
        completed_lessons: 5,
        progress: 9,
        status: "in_progress",
        last_accessed: "3 hari yang lalu"
    },
    {
        id: 4,
        title: "Digital Marketing Strategy 2025",
        category: "Marketing",
        instructor: "Rina A.",
        thumbnail: "https://placehold.co/600x400/e2e8f0/f59e0b?text=Marketing",
        total_lessons: 20,
        completed_lessons: 0,
        progress: 0,
        status: "in_progress",
        last_accessed: "Baru saja mulai"
    }
];

// 3. COMPUTED PROPERTY UNTUK FILTERING
const filteredCourses = computed(() => {
    let data = courses;

    // Filter by Tab
    if (activeTab.value !== 'all') {
        data = data.filter(c => c.status === activeTab.value);
    }

    // Filter by Search
    if (searchQuery.value) {
        data = data.filter(c => c.title.toLowerCase().includes(searchQuery.value.toLowerCase()));
    }

    return data;
});
</script>

<template>
    <div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Pembelajaran Saya</h2>
                <p class="text-slate-500 mt-1">Lanjutkan progres belajar Anda hari ini.</p>
            </div>

            <div class="relative w-full md:w-72">
                <input v-model="searchQuery" type="text" placeholder="Cari kursus..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm">
                <MagnifyingGlassIcon class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" />
            </div>
        </div>

        <div class="border-b border-slate-200 mb-8">
            <nav class="flex gap-6">
                <button @click="activeTab = 'all'" class="pb-3 text-sm font-medium transition border-b-2"
                    :class="activeTab === 'all' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Semua Kursus
                </button>
                <button @click="activeTab = 'in_progress'" class="pb-3 text-sm font-medium transition border-b-2"
                    :class="activeTab === 'in_progress' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Sedang Berjalan
                </button>
                <button @click="activeTab = 'completed'" class="pb-3 text-sm font-medium transition border-b-2"
                    :class="activeTab === 'completed' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700'">
                    Selesai
                </button>
            </nav>
        </div>

        <div v-if="filteredCourses.length > 0" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <div v-for="course in filteredCourses" :key="course.id"
                class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden">

                <Link :href="route('dashboard.class.detail')" class="cursor-pointer relative h-48 bg-slate-100 overflow-hidden">
                    <img :src="course.thumbnail" alt="Course Thumbnail"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                    <div
                        class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div
                            class="bg-white/90 p-3 rounded-full backdrop-blur-sm shadow-lg transform scale-75 group-hover:scale-100 transition">
                            <PlayCircleIcon class="w-8 h-8 text-indigo-600" />
                        </div>
                    </div>

                    <span
                        class="absolute top-3 left-3 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full text-slate-700 shadow-sm">
                        {{ course.category }}
                    </span>
                </Link>

                <div class="p-5 flex-1 flex flex-col">
                    <div class="mb-4">
                        <Link :href="route('dashboard.class.detail')"
                            class="text-lg font-bold text-slate-900 leading-snug line-clamp-2 mb-1 group-hover:text-indigo-600 transition">
                            {{ course.title }}
                        </Link>
                        <p class="text-sm text-slate-500">{{ course.instructor }}</p>
                    </div>

                    <div class="mt-auto">

                        <div class="flex justify-between text-xs font-medium text-slate-500 mb-2">
                            <span>{{ course.completed_lessons }}/{{ course.total_lessons }} Pelajaran</span>
                            <span :class="course.progress === 100 ? 'text-green-600' : 'text-indigo-600'">
                                {{ course.progress }}%
                            </span>
                        </div>

                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden mb-4">
                            <div class="h-full rounded-full transition-all duration-500 ease-out"
                                :class="course.progress === 100 ? 'bg-green-500' : 'bg-indigo-600'"
                                :style="{ width: `${course.progress}%` }"></div>
                        </div>

                        <div v-if="course.status === 'completed'">
                            <button
                                class="w-full py-2.5 px-4 rounded-xl bg-green-50 text-green-700 font-semibold text-sm hover:bg-green-100 transition flex items-center justify-center gap-2">
                                <CheckBadgeIcon class="w-5 h-5" />
                                Lihat Sertifikat
                            </button>
                        </div>
                        <div v-else>
                            <Link :href="route('dashboard.class.study')"
                                class="w-full py-2.5 px-4 rounded-xl bg-indigo-600 text-white font-semibold text-sm hover:bg-indigo-700 transition flex items-center justify-center gap-2 shadow-sm hover:shadow-indigo-200">
                            Lanjutkan Belajar
                            </Link>
                            <p class="text-xs text-center text-slate-400 mt-2 flex items-center justify-center gap-1">
                                <ClockIcon class="w-3 h-3" />
                                Akses terakhir: {{ course.last_accessed }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div v-else class="flex flex-col items-center justify-center py-20 text-center">
            <div class="bg-slate-50 p-4 rounded-full mb-4">
                <MagnifyingGlassIcon class="w-8 h-8 text-slate-400" />
            </div>
            <h3 class="text-lg font-bold text-slate-900">Tidak ada kursus ditemukan</h3>
            <p class="text-slate-500 max-w-xs mx-auto mt-1">Coba ubah kata kunci pencarian atau filter status kursus
                Anda.</p>
            <button @click="searchQuery = ''; activeTab = 'all'"
                class="mt-4 text-indigo-600 font-medium hover:underline">
                Reset Filter
            </button>
        </div>

    </div>
</template>
