<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const form = useForm({
    name: "",
    username: "",
    email: "",
    phone_number: "", // Menambahkan field phone_number
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: (errors) => {
            // Ambil pesan error pertama untuk ditampilkan di SweetAlert
            const firstMessage = Object.values(errors)[0];

            Swal.fire({
                icon: 'error',
                title: 'Registrasi Gagal!',
                text: firstMessage || 'Mohon periksa kembali data isian anda.',
                confirmButtonText: 'Perbaiki',
                confirmButtonColor: '#4F39F6',
                heightAuto: false
            });
        }
    });
}
</script>

<template>
    <Head title="Daftar Akun" />

    <div class="grid min-h-screen lg:grid-cols-2">
        <div class="flex flex-col gap-4 p-6 md:p-10">
            <div class="flex justify-center gap-2">
                <Link :href="route('home')" class="flex items-center md:gap-2 font-medium hover:animate-pulse">
                    <img src="/img/banuacourse-icon.png" alt="Logo" width="100">
                </Link>
            </div>

            <div class="fadeIn flex flex-1 items-center justify-center">
                <div class="w-full max-w-lg">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold">Daftar Sekarang</h1>
                        <p class="text-slate-500 text-sm">Bergabunglah bersama kami untuk mulai belajar.</p>
                    </div>

                    <form @submit.prevent="submit" class="space-y-5">

                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="w-full md:w-1/2">
                                <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                                <div class="mt-1">
                                    <input
                                        v-model="form.name"
                                        id="name"
                                        type="text"
                                        autocomplete="name"
                                        placeholder="John Doe"
                                        :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.name }"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    >
                                    <p v-if="form.errors.name" class="mt-1 text-xs text-red-600">{{ form.errors.name }}</p>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <label for="username" class="block text-sm font-medium text-slate-700">Username</label>
                                <div class="mt-1">
                                    <input
                                        v-model="form.username"
                                        id="username"
                                        type="text"
                                        placeholder="joe_doe"
                                        :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.username }"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    >
                                    <p v-if="form.errors.username" class="mt-1 text-xs text-red-600">{{ form.errors.username }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Alamat Email</label>
                            <div class="mt-1">
                                <input
                                    v-model="form.email"
                                    id="email"
                                    type="email"
                                    autocomplete="email"
                                    placeholder="user@gmail.com"
                                    :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.email }"
                                    class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                >
                                <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
                            </div>
                        </div>

                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-slate-700">No. Telp (WhatsApp)</label>
                            <div class="mt-1">
                                <input
                                    v-model="form.phone_number"
                                    id="phone_number"
                                    type="tel"
                                    placeholder="08123456789"
                                    :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.phone_number }"
                                    class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                >
                                <p v-if="form.errors.phone_number" class="mt-1 text-xs text-red-600">{{ form.errors.phone_number }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="w-full md:w-1/2">
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                <div class="mt-1">
                                    <input
                                        v-model="form.password"
                                        id="password"
                                        type="password"
                                        autocomplete="new-password"
                                        :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.password }"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    >
                                    <p v-if="form.errors.password" class="mt-1 text-xs text-red-600">{{ form.errors.password }}</p>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2">
                                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                                <div class="mt-1">
                                    <input
                                        v-model="form.password_confirmation"
                                        id="password_confirmation"
                                        type="password"
                                        autocomplete="new-password"
                                        :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.password }"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                :disabled="form.processing"
                                :class="{ 'opacity-75 cursor-not-allowed': form.processing }"
                                class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all"
                            >
                                <span v-if="form.processing">Mendaftarkan...</span>
                                <span v-else>Daftar Akun</span>
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-sm text-slate-600">
                        Sudah punya akun?
                        <Link :href="route('login')" class="font-medium text-blue-600 hover:text-blue-500">
                            Masuk.
                        </Link>
                    </p>
                </div>
            </div>
        </div>

        <div class="fadeIn bg-slate-100 relative hidden lg:block">
            <img src="/img/auth/register-wp.jpg" alt="Image" class="absolute inset-0 h-full w-full object-cover brightness-[0.5] grayscale" />
        </div>
    </div>
</template>
