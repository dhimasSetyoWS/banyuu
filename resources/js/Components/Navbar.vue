<script setup>
import { Link, usePage } from '@inertiajs/vue3';
const links = [
    {
        text : "Home",
        target : "home",
        active : "home",
    },
    {
        text : "Catalog",
        target : "catalog",
        active : "catalog",
    },
    {
        text : "About Us",
        target : "aboutus",
        active : "aboutus",
    },
    {
        text : "Contact",
        target : "contact",
        active : "contact",
    }
]

const user = usePage().props.auth.user;
</script>
<template>
    <Head title="Home"/>
    <nav
        class="fixed w-full z-50 top-0 bg-white/80 backdrop-blur-md border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="shrink-0 flex items-center gap-2 cursor-pointer">
                    <Link :href="route('home')">
                        <img src="img/banuacourse-icon.png" alt="" width="120">
                    </Link>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <template v-for="link in links">
                        <Link :href="route(link.target)" class="text-sm hover:text-brand-600 transition" :class="route().current(link.active) ? 'text-brand-600 font-bold' : 'text-slate-600 font-medium'">{{ link.text }}</Link>
                    </template>
                </div>

                <div class="hidden md:flex items-center gap-4">
                    <template v-if="!user">
                        <Link :href="route('login')" class="text-sm font-medium text-slate-600 hover:text-brand-600">Masuk</Link>
                        <Link :href="route('register')"
                            class="px-5 py-2.5 text-sm font-medium bg-brand-600 text-white rounded-full hover:bg-brand-900 transition shadow-lg shadow-brand-600/20">Daftar
                            Gratis</Link>
                    </template>
                    <template v-else>
                        <Link :href="user.role == 'teacher' ? route('teacher.dashboard') : route('dashboard')" class="text-sm font-semibold text-slate-600 hover:text-brand-600">Dashboard</Link>
                    </template>
                </div>

                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>
