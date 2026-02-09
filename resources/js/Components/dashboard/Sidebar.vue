<script setup>
import Logo from '@/Components/Logo.vue';
import { ref } from 'vue';
import { Squares2X2Icon, BookOpenIcon, ChatBubbleLeftEllipsisIcon, NewspaperIcon, DocumentDuplicateIcon, XMarkIcon, ChevronUpIcon, ArrowRightOnRectangleIcon, UserCircleIcon } from "@heroicons/vue/24/outline";
import { usePage, Link } from '@inertiajs/vue3';

defineProps({
    mobileOpen: {
        type: Boolean,
        default: false
    }
});


defineEmits(['close']);
const page = usePage();
const user = page.props.auth.user;
const isActive = (routeName) => {
    return page.url && route().current(routeName);
}
const isDropdownOpen = ref(false);

// SAYA TAMBAHKAN BANYAK MENU UNTUK TEST SCROLLING
const allLinks = [
    { icon: Squares2X2Icon, text: "Dashboard Utama", target: "dashboard", active: "dashboard", roles: ['student'] },
    { icon: Squares2X2Icon, text: "Dashboard Guru", target: "teacher.dashboard", active: "teacher.dashboard", roles: ['teacher'] },
    { icon: BookOpenIcon, text: "Manajemen Kelas", target: "teacher.dashboard.class.index", active: "teacher.dashboard.class.*", roles: ['teacher'] },
    { icon: BookOpenIcon, text: "Kelas Saya", target: "dashboard.class.index", active: "dashboard.class.*", roles: ['student'] },
    { icon: DocumentDuplicateIcon, text: "Pertanyaan", target: "dashboard.pertanyaan.index", active: "dashboard.pertanyaan.*", roles: ['teacher' , 'student'] },
    { icon: NewspaperIcon, text: "Materi", target: "dashboard.material.index", active: "dashboard.material.*", roles: ['student' , 'teacher']  },
    { icon: DocumentDuplicateIcon, text: "Assessment", target: "dashboard.assessment.index", active: "dashboard.assessment.*", roles: ['student', 'teacher'] },
    // --- Simulasi Menu Tambahan (Bisa dihapus nanti) ---
    { icon: BookOpenIcon, text: "Riwayat Belajar", target: "dashboard", active: "home", roles: ['student'] },
    { icon: NewspaperIcon, text: "Sertifikat", target: "dashboard", active: "home", roles: ['student'] },
    { icon: ChatBubbleLeftEllipsisIcon, text: "Diskusi Group", target: "dashboard", active: "home", roles: ['student'] },
    { icon: Squares2X2Icon, text: "Webinar", target: "dashboard", active: "home", roles: ['student'] },
    { icon: DocumentDuplicateIcon, text: "Ujian Akhir", target: "dashboard", active: "home", roles: ['student'] },
    { icon: UserCircleIcon, text: "Instruktur", target: "dashboard", active: "home", roles: ['student'] },
    { icon: BookOpenIcon, text: "Modul Tambahan", target: "dashboard", active: "home", roles: ['student'] },
];

const links = allLinks.filter(link => link.roles.includes(user.role));

</script>

<template>
    <div v-if="mobileOpen" @click="$emit('close')" class="fixed inset-0 z-30 bg-black/50 transition-opacity md:hidden">
    </div>

    <aside
        class="fixed left-0 top-0 z-40 h-full w-64 flex flex-col bg-white border-r border-slate-200 transition-transform duration-300 ease-in-out md:translate-x-0"
        :class="mobileOpen ? 'translate-x-0' : '-translate-x-full'">

        <div class="h-20 flex justify-center items-center px-8 border-b border-slate-100 shrink-0">
            <Logo />
            <button @click="$emit('close')" class="md:hidden text-gray-500 hover:text-red-500 absolute right-0 top-0">
                <XMarkIcon class="w-6 h-6" />
            </button>
        </div>

        <div class="flex-1 overflow-y-auto min-h-0 py-6 px-4 space-y-1 custom-scrollbar">
            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu</p>

            <Link :href="route(link.target)" v-for="(link, index) in links" :key="index"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition group"
                :class="isActive(link.active) ? 'text-brand-700 bg-brand-50 font-semibold' : 'text-slate-600 hover:bg-slate-50 font-medium'">
            <component :is="link.icon" class="w-5 h-5 group-hover:scale-110 transition" />
            {{ link.text }}
            </Link>
        </div>

        <div class="p-4 border-t border-slate-100 shrink-0 relative bg-white">
            <transition enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95 translate-y-2"
                enter-to-class="transform opacity-100 scale-100 translate-y-0"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100 translate-y-0"
                leave-to-class="transform opacity-0 scale-95 translate-y-2">
                <div v-if="isDropdownOpen" class="absolute bottom-full left-0 w-full mb-2 px-4 z-50">
                    <div class="bg-white rounded-xl shadow-lg border border-slate-100 overflow-hidden py-1">
                        <Link :href="route('dashboard')"
                            class="cursor-pointer flex items-center gap-2 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-indigo-600 transition">
                        <UserCircleIcon class="w-4 h-4" />
                        Profile Setting
                        </Link>

                        <div class="border-t border-slate-50 my-1"></div>

                        <Link :href="route('logout')" method="post" as="button"
                            class="cursor-pointer w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition text-left">
                        <ArrowRightOnRectangleIcon class="w-4 h-4" />
                        Keluar
                        </Link>
                    </div>
                </div>
            </transition>

            <button @click="isDropdownOpen = !isDropdownOpen"
                class="cursor-pointer flex items-center gap-3 w-full p-2 rounded-xl hover:bg-slate-50 transition text-left group">
                <img :src="user.profile_photo_url || `https://ui-avatars.com/api/?name=${user.name}&background=eff6ff&color=4f46e5`"
                    class="w-10 h-10 rounded-full object-cover border border-slate-200" alt="User">

                <div class="flex-1 overflow-hidden">
                    <p class="text-sm font-semibold text-slate-700 truncate group-hover:text-indigo-700 transition">{{
                        user.name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ user.email }}</p>
                </div>

                <ChevronUpIcon class="w-4 h-4 text-slate-400 transition-transform duration-300"
                    :class="isDropdownOpen ? 'rotate-180' : ''" />
            </button>
        </div>
    </aside>
</template>

<style scoped>
/* Opsional: Agar scrollbar terlihat minimalis (mirip Mac OS) di Windows */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    /* slate-300 */
    border-radius: 20px;
}
</style>
