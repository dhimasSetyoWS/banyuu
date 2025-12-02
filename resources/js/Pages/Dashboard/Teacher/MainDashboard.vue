<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, {
        title: "Dashboard Guru",
        header: "Dashboard"
    }, () => [page])
}
</script>
<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import {
    UsersIcon,
    CurrencyDollarIcon,
    StarIcon,
    ChartBarIcon,
    EllipsisHorizontalIcon,
    PencilSquareIcon,
    ChatBubbleLeftRightIcon,
    ClipboardDocumentCheckIcon,
    ArrowTrendingUpIcon
} from '@heroicons/vue/24/outline';

const user = usePage().props.auth.user;

// --- DUMMY DATA UNTUK GURU ---
const stats = [
    { title: 'Total Pendapatan', value: 'Rp 12.500.000', change: '+12%', icon: CurrencyDollarIcon, color: 'text-emerald-600', bg: 'bg-emerald-50' },
    { title: 'Total Siswa', value: '1,240', change: '+5%', icon: UsersIcon, color: 'text-blue-600', bg: 'bg-blue-50' },
    { title: 'Rating Rata-rata', value: '4.8', change: '0%', icon: StarIcon, color: 'text-orange-500', bg: 'bg-orange-50' },
    { title: 'Kursus Aktif', value: '4', change: '0', icon: ChartBarIcon, color: 'text-indigo-600', bg: 'bg-indigo-50' },
];

const pendingTasks = [
    { id: 1, type: 'assignment', title: 'Tugas: Wireframe UI', count: 5, urgency: 'high', label: 'Perlu Dinilai' },
    { id: 2, type: 'question', title: 'Diskusi: Error Laravel', count: 3, urgency: 'medium', label: 'Pertanyaan Baru' },
];

const activeCourses = [
    {
        id: 1,
        title: 'Fullstack Laravel 10 & Vue 3',
        thumbnail: 'https://placehold.co/100x100/e2e8f0/4f46e5?text=LV',
        students: 450,
        sales: 'Rp 5.200.000',
        rating: 4.9
    },
    {
        id: 2,
        title: 'UI/UX Design Masterclass',
        thumbnail: 'https://placehold.co/100x100/e2e8f0/ec4899?text=UI',
        students: 320,
        sales: 'Rp 3.100.000',
        rating: 4.7
    },
    {
        id: 3,
        title: 'Python for Data Science',
        thumbnail: 'https://placehold.co/100x100/e2e8f0/10b981?text=PY',
        students: 110,
        sales: 'Rp 1.500.000',
        rating: 4.8
    },
];

const recentActivities = [
    { user: 'Budi Santoso', action: 'Membeli kelas', course: 'Fullstack Laravel', time: '2 menit lalu', avatar: 'https://ui-avatars.com/api/?name=Budi+Santoso' },
    { user: 'Siti Aminah', action: 'Menyelesaikan kuis', course: 'UI/UX Design', time: '15 menit lalu', avatar: 'https://ui-avatars.com/api/?name=Siti+Aminah' },
    { user: 'Joko', action: 'Bertanya di forum', course: 'Python Data', time: '1 jam lalu', avatar: 'https://ui-avatars.com/api/?name=Joko' },
];
</script>

<template>

    <Head title="Dashboard Pengajar" />

    <div class="space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div v-for="(stat, index) in stats" :key="index"
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start justify-between hover:shadow-md transition">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">{{ stat.title }}</p>
                    <h3 class="text-2xl font-bold text-slate-900">{{ stat.value }}</h3>
                    <div v-if="stat.change !== '0'"
                        class="flex items-center gap-1 mt-2 text-xs font-medium text-emerald-600">
                        <ArrowTrendingUpIcon class="w-3 h-3" />
                        <span>{{ stat.change }} bulan ini</span>
                    </div>
                </div>
                <div :class="`p-3 rounded-xl ${stat.bg} ${stat.color}`">
                    <component :is="stat.icon" class="w-6 h-6" />
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="font-bold text-slate-900 text-lg">Kursus Terpopuler Anda</h3>
                        <button class="text-sm text-indigo-600 font-medium hover:underline">Kelola Semua</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Nama Kursus</th>
                                    <th class="px-6 py-4 font-semibold text-center">Siswa</th>
                                    <th class="px-6 py-4 font-semibold text-center">Rating</th>
                                    <th class="px-6 py-4 font-semibold text-right">Pendapatan</th>
                                    <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr v-for="course in activeCourses" :key="course.id"
                                    class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-slate-200 overflow-hidden shrink-0">
                                                <img :src="course.thumbnail" class="w-full h-full object-cover">
                                            </div>
                                            <span class="font-semibold text-slate-700 line-clamp-1 max-w-[150px]">{{
                                                course.title }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center text-slate-600">{{ course.students }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-1 text-slate-700">
                                            <StarIcon class="w-4 h-4 text-yellow-400" />
                                            {{ course.rating }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right font-medium text-emerald-600">{{ course.sales }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="text-slate-400 hover:text-indigo-600 transition">
                                            <PencilSquareIcon class="w-5 h-5" />
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-slate-900 text-lg">Statistik Siswa Baru (Mingguan)</h3>
                        <select class="text-xs border-slate-200 rounded-lg text-slate-500 focus:ring-0">
                            <option>7 Hari Terakhir</option>
                            <option>30 Hari Terakhir</option>
                        </select>
                    </div>
                    <div class="flex items-end justify-between gap-2 h-40 pt-4">
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 40%">
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">
                                12</div>
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Sen</span>
                        </div>
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 65%">
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">
                                24</div>
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Sel</span>
                        </div>
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 35%">
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Rab</span>
                        </div>
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 85%">
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Kam</span>
                        </div>
                        <div class="w-full bg-indigo-600 rounded-t-lg shadow-lg shadow-indigo-200 relative group"
                            style="height: 100%">
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs py-1 px-2 rounded">
                                42</div>
                            <span
                                class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-600 font-bold">Jum</span>
                        </div>
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 20%">
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Sab</span>
                        </div>
                        <div class="w-full bg-indigo-50 rounded-t-lg hover:bg-indigo-100 transition relative group"
                            style="height: 10%">
                            <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Min</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="space-y-6">

                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 text-white shadow-lg">
                    <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                        <ClipboardDocumentCheckIcon class="w-5 h-5 text-indigo-400" />
                        Perlu Perhatian
                    </h3>
                    <div class="space-y-3">
                        <div v-for="task in pendingTasks" :key="task.id"
                            class="bg-white/10 p-3 rounded-xl border border-white/5 hover:bg-white/20 transition cursor-pointer">
                            <div class="flex justify-between items-start mb-1">
                                <span :class="task.urgency === 'high' ? 'text-red-300' : 'text-yellow-300'"
                                    class="text-xs font-bold uppercase tracking-wider">
                                    {{ task.label }}
                                </span>
                                <span class="bg-white text-slate-900 text-xs font-bold px-1.5 py-0.5 rounded-md">{{
                                    task.count }}</span>
                            </div>
                            <p class="text-sm font-medium text-slate-100">{{ task.title }}</p>
                        </div>
                    </div>
                    <button
                        class="w-full mt-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-bold transition">
                        Selesaikan Sekarang
                    </button>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-900 mb-4">Aktivitas Terbaru</h3>
                    <div class="space-y-6">
                        <div v-for="(activity, index) in recentActivities" :key="index" class="flex gap-3 relative">
                            <div v-if="index !== recentActivities.length - 1"
                                class="absolute left-4 top-10 bottom-[-24px] w-0.5 bg-slate-100"></div>

                            <img :src="activity.avatar"
                                class="w-8 h-8 rounded-full bg-slate-100 border border-white shadow-sm z-10 relative">
                            <div>
                                <p class="text-sm text-slate-800">
                                    <span class="font-bold">{{ activity.user }}</span> {{ activity.action }}
                                    <span class="text-indigo-600 font-medium">{{ activity.course }}</span>
                                </p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ activity.time }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
                    <button
                        class="flex items-center justify-between w-full p-2 hover:bg-slate-50 rounded-lg transition text-slate-600 text-sm font-medium">
                        <span class="flex items-center gap-2">
                            <ChatBubbleLeftRightIcon class="w-5 h-5 text-slate-400" /> Forum Diskusi
                        </span>
                        <span class="bg-red-100 text-red-600 text-xs px-2 py-0.5 rounded-full">3</span>
                    </button>
                    <button
                        class="flex items-center justify-between w-full p-2 hover:bg-slate-50 rounded-lg transition text-slate-600 text-sm font-medium mt-1">
                        <span class="flex items-center gap-2">
                            <ChartBarIcon class="w-5 h-5 text-slate-400" /> Laporan Keuangan
                        </span>
                    </button>
                </div>

            </div>

        </div>

    </div>
</template>
