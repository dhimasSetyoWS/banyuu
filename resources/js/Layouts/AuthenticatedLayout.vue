<script setup>
import Sidebar from '@/Components/dashboard/Sidebar.vue';
import { ref } from 'vue';
defineProps({
    header: String,
    title: String
});
const isSidebarOpen = ref(false);
</script>
<template>

    <Head :title="title" />
    <div class="flex h-screen overflow-hidden">
        <Sidebar :mobile-open="isSidebarOpen" @close="isSidebarOpen = false" />

        <main class="flex-1 flex flex-col h-full relative md:ml-64 overflow-y-auto">

            <header
                class="h-20 py-8 bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <button @click="isSidebarOpen = true" class="md:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-xl font-bold text-slate-900 hidden sm:block">{{ header }}</h1>
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari pertanyaan, artikel, atau kelas..."
                            class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-brand-600/20 focus:border-brand-600 w-80 transition">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full relative">
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
            </header>

            <div class="p-6 md:p-8 max-w-7xl mx-auto w-full space-y-8">
                <slot />
            </div>
        </main>
    </div>
</template>
