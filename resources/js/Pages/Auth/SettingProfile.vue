<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Pengaturan Profil' }, () => [page])
}
</script>

<script setup>
import { ref } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import {
    UserIcon,
    KeyIcon,
    BellIcon,
    CameraIcon,
    CheckCircleIcon,
    ShieldCheckIcon
} from '@heroicons/vue/24/outline';

// --- STATE ---
const activeTab = ref('profile'); // 'profile' | 'security' | 'notifications'
const user = usePage().props.auth.user;
// --- FORM DATA ---
const profileForm = useForm({
    name: user.name,
    email: user.email,
    bio: 'Ini Biodata',
    avatar: `https://ui-avatars.com/api/?name=${user.name}&background=eff6ff&color=4f46e5`
});

const passwordForm = useForm({
    current_password: '',
    new_password: '',
    password_confirmation: ''
});

// --- LOGIC ---
const updateProfile = () => {
    console.log("Mengupdate Profil:", profileForm.data());
    alert("Profil berhasil diperbarui!");
};

const updatePassword = () => {
    console.log("Mengupdate Password...");
    passwordForm.reset();
    alert("Kata sandi berhasil diubah!");
};

const handleAvatarChange = (e) => {
    const file = e.target.files[0];
    if (file) profileForm.avatar = URL.createObjectURL(file);
};
</script>

<template>

    <Head title="Pengaturan Akun" />

    <div class="max-w-5xl mx-auto pb-20 px-4 sm:px-6">

        <div class="flex flex-col md:flex-row gap-8 items-start">

            <div class="w-full md:w-64 bg-white rounded-3xl border border-slate-200 p-4 shadow-sm">
                <div class="space-y-1">
                    <button @click="activeTab = 'profile'"
                        :class="activeTab === 'profile' ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition">
                        <UserIcon class="w-5 h-5" /> Profil Saya
                    </button>
                    <button @click="activeTab = 'security'"
                        :class="activeTab === 'security' ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition">
                        <ShieldCheckIcon class="w-5 h-5" /> Keamanan Akun
                    </button>
                    <button @click="activeTab = 'notifications'"
                        :class="activeTab === 'notifications' ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition">
                        <BellIcon class="w-5 h-5" /> Notifikasi
                    </button>
                </div>
            </div>

            <div class="flex-1 w-full space-y-6">

                <div v-if="activeTab === 'profile'"
                    class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden animate-fade-in">
                    <div class="p-6 md:p-8 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="text-lg font-black text-slate-900 uppercase tracking-wider">Detail Profil</h3>
                    </div>

                    <form @submit.prevent="updateProfile" class="p-6 md:p-8 space-y-8">
                        <div class="flex items-center gap-6">
                            <div class="relative group">
                                <div
                                    class="w-24 h-24 rounded-3xl bg-slate-100 overflow-hidden border-4 border-white ring-1 ring-slate-200 shadow-lg">
                                    <img v-if="profileForm.avatar" :src="profileForm.avatar"
                                        class="w-full h-full object-cover" />
                                    <UserIcon v-else class="w-full h-full p-4 text-slate-300" />
                                </div>
                                <label
                                    class="absolute -bottom-2 -right-2 bg-indigo-600 p-2 rounded-xl text-white shadow-lg cursor-pointer hover:bg-indigo-700 transition active:scale-90">
                                    <CameraIcon class="w-4 h-4" />
                                    <input type="file" class="hidden" @change="handleAvatarChange">
                                </label>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">Foto Profil</h4>
                                <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest font-medium">SVG, PNG,
                                    JPG (Max 2MB)</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Nama
                                    Lengkap</label>
                                <input v-model="profileForm.name" type="text"
                                    class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 focus:border-indigo-500 transition shadow-inner">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Alamat
                                    Email</label>
                                <input v-model="profileForm.email" type="email"
                                    class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 focus:border-indigo-500 transition shadow-inner">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Bio
                                Singkat</label>
                            <textarea v-model="profileForm.bio" rows="4"
                                class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 focus:border-indigo-500 transition shadow-inner"
                                placeholder="Tuliskan sedikit tentang Anda..."></textarea>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="px-10 py-3 bg-slate-900 text-white font-black rounded-2xl text-xs uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-lg active:scale-95">
                                Simpan Profil
                            </button>
                        </div>
                    </form>
                </div>

                <div v-if="activeTab === 'security'"
                    class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden animate-fade-in">
                    <div class="p-6 md:p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/30">
                        <h3 class="text-lg font-black text-slate-900 uppercase tracking-wider">Ubah Kata Sandi</h3>
                    </div>

                    <form @submit.prevent="updatePassword" class="p-6 md:p-8 space-y-6 max-w-2xl">
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Kata
                                Sandi Saat Ini</label>
                            <input v-model="passwordForm.current_password" type="password"
                                class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 transition shadow-inner">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Kata
                                    Sandi Baru</label>
                                <input v-model="passwordForm.new_password" type="password"
                                    class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 transition shadow-inner">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black uppercase text-slate-400 tracking-widest block ml-1">Konfirmasi
                                    Sandi Baru</label>
                                <input v-model="passwordForm.password_confirmation" type="password"
                                    class="w-full bg-slate-50 border-slate-200 rounded-2xl px-5 py-3 text-sm focus:ring-indigo-500 transition shadow-inner">
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="px-10 py-3 bg-indigo-600 text-white font-black rounded-2xl text-xs uppercase tracking-widest hover:bg-indigo-700 transition shadow-lg active:scale-95">
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>

                <div v-if="activeTab === 'notifications'"
                    class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden animate-fade-in">
                    <div class="p-6 md:p-8 border-b border-slate-100 bg-slate-50/30">
                        <h3 class="text-lg font-black text-slate-900 uppercase tracking-wider">Preferensi Notifikasi
                        </h3>
                    </div>

                    <div class="p-6 md:p-8 space-y-6">
                        <div v-for="i in 3" :key="i"
                            class="flex items-center justify-between p-4 rounded-2xl border border-slate-100 hover:border-indigo-100 transition">
                            <div class="flex gap-4 items-start">
                                <div class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                                    <BellIcon class="w-5 h-5" />
                                </div>
                                <div>
                                    <h4 class="text-sm font-black text-slate-800">{{ i === 1 ? 'Pengingat Deadline' : i
                                        === 2 ? 'Pengumuman Baru' : 'Nilai Tugas Keluar' }}</h4>
                                    <p class="text-xs text-slate-400 mt-0.5">Dapatkan notifikasi langsung ke email Anda.
                                    </p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div
                                    class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
}
</style>
