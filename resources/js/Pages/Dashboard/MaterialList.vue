<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Bank Materi & Modul' }, () => [page])
}
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {
    MagnifyingGlassIcon,
    FunnelIcon,
    DocumentTextIcon,
    VideoCameraIcon,
    PresentationChartLineIcon,
    ArrowDownTrayIcon,
    PencilSquareIcon,
    TrashIcon,
    DocumentIcon,
    EyeIcon
} from '@heroicons/vue/24/outline';

// 1. DATA DUMMY (Bank Materi)
const allMaterials = [
    {
        id: 1,
        title: "Modul Dasar HTML5 & Semantik",
        category: "Programming",
        type: "PDF",
        size: "2.5 MB",
        uploaded_at: "24 Okt 2024",
        downloads: 120
    },
    {
        id: 2,
        title: "Tutorial Instalasi Laravel 11 di Windows",
        category: "Programming",
        type: "Video",
        size: "15 Menit",
        uploaded_at: "20 Okt 2024",
        downloads: 85
    },
    {
        id: 3,
        title: "Slide Presentasi UX Research Method",
        category: "Design",
        type: "PPT",
        size: "5.1 MB",
        uploaded_at: "18 Okt 2024",
        downloads: 45
    },
    {
        id: 4,
        title: "Cheat Sheet Shortcut VS Code",
        category: "Tools",
        type: "Image",
        size: "1.2 MB",
        uploaded_at: "15 Okt 2024",
        downloads: 300
    },
    {
        id: 5,
        title: "E-Book: Clean Code Robert C. Martin",
        category: "Programming",
        type: "PDF",
        size: "12 MB",
        uploaded_at: "10 Okt 2024",
        downloads: 56
    },
    {
        id: 6,
        title: "Panduan Setting Server Ubuntu",
        category: "DevOps",
        type: "Doc",
        size: "500 KB",
        uploaded_at: "05 Okt 2024",
        downloads: 22
    }
];

// 2. STATE FILTER
const search = ref('');
const selectedType = ref('');

// 3. LOGIC FILTERING
const filteredMaterials = computed(() => {
    return allMaterials.filter(item => {
        const matchesSearch = item.title.toLowerCase().includes(search.value.toLowerCase());
        const matchesType = selectedType.value === '' || item.type === selectedType.value;
        return matchesSearch && matchesType;
    });
});

// 4. HELPER UI (Icon & Color based on File Type)
const getFileIcon = (type) => {
    switch (type) {
        case 'PDF': return DocumentTextIcon;
        case 'Video': return VideoCameraIcon;
        case 'PPT': return PresentationChartLineIcon;
        case 'Doc': return DocumentIcon;
        default: return DocumentIcon;
    }
};

const getFileColorClass = (type) => {
    switch (type) {
        case 'PDF': return 'bg-red-50 text-red-600 border-red-100';
        case 'Video': return 'bg-indigo-50 text-indigo-600 border-indigo-100';
        case 'PPT': return 'bg-orange-50 text-orange-600 border-orange-100';
        case 'Doc': return 'bg-blue-50 text-blue-600 border-blue-100';
        default: return 'bg-slate-50 text-slate-600 border-slate-100';
    }
};
</script>

<template>

    <Head title="Bank Materi" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div
                class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">

                <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto flex-1">
                    <div class="relative w-full md:w-80">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <MagnifyingGlassIcon class="h-5 w-5 text-slate-400" />
                        </div>
                        <input v-model="search" type="text"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm transition"
                            placeholder="Cari nama file...">
                    </div>

                    <div class="relative w-full md:w-48">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <FunnelIcon class="h-4 w-4 text-slate-400" />
                        </div>
                        <select v-model="selectedType"
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer transition">
                            <option value="">Semua Tipe File</option>
                            <option value="PDF">PDF Document</option>
                            <option value="Video">Video Learning</option>
                            <option value="PPT">Presentation</option>
                            <option value="Doc">Word Document</option>
                        </select>
                    </div>
                </div>

                <Link v-if="$page.props.auth.user.role == 'teacher'" :href="route('dashboard.material.create')"
                    class="w-full md:w-auto px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition flex items-center justify-center gap-2">
                    <ArrowDownTrayIcon class="w-4 h-4 transform rotate-180" />
                    <span>Upload Materi</span>
                </Link>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div v-for="item in filteredMaterials" :key="item.id"
                    class="group bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg hover:border-indigo-200 hover:-translate-y-1 transition-all duration-300 relative">

                    <div class="flex justify-between items-start mb-4">
                        <div
                            :class="`w-12 h-12 rounded-xl flex items-center justify-center border ${getFileColorClass(item.type)}`">
                            <component :is="getFileIcon(item.type)" class="w-6 h-6" />
                        </div>

                        <span
                            class="text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-500 px-2 py-1 rounded-md">
                            {{ item.type }}
                        </span>
                    </div>

                    <div class="mb-6">
                        <Link :href="'#'"
                            class="font-bold text-slate-900 group-hover:text-indigo-600 transition line-clamp-2 mb-1">
                            {{ item.title }}
                        </Link>
                        <p class="text-xs text-slate-500">{{ item.category }} • {{ item.uploaded_at }}</p>
                    </div>

                    <div class="flex items-center justify-between border-t border-slate-50 pt-4 mt-auto">
                        <div class="flex gap-2">
                            <Link
                                class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition"
                                title="Edit" v-if="$page.props.auth.user.role == 'teacher'"
                                :href="route('dashboard.material.edit')">
                                <PencilSquareIcon class="w-4 h-4" />
                            </Link>
                            <Link v-else>
                                <EyeIcon class="w-4 h-4" />
                            </Link>
                            <Link href="#" v-if="$page.props.auth.user.role == 'teacher'"
                                class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition"
                                title="Hapus">
                                <TrashIcon class="w-4 h-4" />
                            </Link>
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="filteredMaterials.length === 0"
                class="flex flex-col items-center justify-center py-16 bg-white rounded-2xl border border-dashed border-slate-300">
                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                    <DocumentTextIcon class="w-8 h-8 text-slate-300" />
                </div>
                <h3 class="text-slate-900 font-bold mb-1">Materi tidak ditemukan</h3>
                <p class="text-slate-500 text-sm">Belum ada file materi yang sesuai dengan pencarian Anda.</p>
            </div>

        </div>
    </div>
</template>
