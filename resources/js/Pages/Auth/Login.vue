<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2'; // Import SweetAlert2

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        // FUNGSI INI AKAN JALAN KALAU LOGIN GAGAL (Validasi Error)
        onError: (errors) => {
            // Kita ambil pesan error pertama yang muncul (biasanya error email)
            const firstMessage = Object.values(errors)[0];

            Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: firstMessage || 'Periksa kembali email dan password anda.',
                confirmButtonText: 'Coba Lagi',
                confirmButtonColor: '#4F39F6', // Sesuaikan warna dengan tema (Blue-600)
                heightAuto: false // Fix agar tidak loncat di beberapa layout
            });
        }
    });
}
</script>

<template>
    <Head title="Login" />

    <div class="grid min-h-screen lg:grid-cols-2">
        <div class="flex flex-col gap-4 p-6 md:p-10">
            <div class="flex justify-center gap-2">
                <Link :href="route('home')" class="flex items-center md:gap-2 font-medium hover:animate-pulse">
                    <img src="/img/banuacourse-icon.png" alt="Logo" width="100">
                </Link>
            </div>

            <div class="fadeIn flex flex-1 items-center justify-center">
                <div class="w-full max-w-sm">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold">Masuk ke akun anda</h1>
                        <p class="text-slate-500 text-sm text-balance">
                            Masukkan email di bawah untuk masuk ke akun anda.
                        </p>
                    </div>

                    <form @submit.prevent="submit" class="space-y-6">
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
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                            <div class="mt-1">
                                <input
                                    v-model="form.password"
                                    id="password"
                                    type="password"
                                    autocomplete="current-password"
                                    :class="{ 'border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500': form.errors.password }"
                                    class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                >
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    v-model="form.remember"
                                    id="remember-me"
                                    type="checkbox"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded-sm"
                                >
                                <label for="remember-me" class="ml-2 block text-sm text-slate-900">Ingat saya</label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Lupa password?</a>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                :class="{ 'opacity-75 cursor-not-allowed': form.processing }"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all"
                            >
                                <span v-if="form.processing">Memproses...</span>
                                <span v-else>Masuk</span>
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-sm text-slate-600">
                        Belum punya akun?
                        <Link :href="route('register')" class="font-medium text-blue-600 hover:text-blue-500">
                            Daftar di sini
                        </Link>
                    </p>
                </div>
            </div>
        </div>

        <div class="fadeIn bg-slate-100 relative hidden lg:block">
            <img src="/img/auth/login-wp.jpg" alt="Image" class="absolute inset-0 h-full w-full object-cover brightness-[0.5] grayscale" />
        </div>
    </div>
</template>
