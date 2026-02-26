<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Mengerjakan Ujian' }, () => [page])
}
</script>

<script setup>
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Swal from 'sweetalert2';
import {
    ChevronLeftIcon,
    ChevronRightIcon,
    Squares2X2Icon,
    ClockIcon,
    XMarkIcon,
    CheckCircleIcon,
    ListBulletIcon
} from '@heroicons/vue/24/outline';

// --- DATA DUMMY UJIAN & SOAL ---
const examInfo = {
    title: "Ujian Tengah Semester: Web Development",
    duration: 90,
    time_left: "01:25:00",
};

// Data soal sekarang memiliki 'type' (essay, single, multiple) dan 'options' jika bukan essay.
// Note: untuk multiple, answer inisialisasinya adalah array kosong [].
const questions = ref([
    {
        id: 1,
        type: 'essay',
        text: "Jelaskan apa yang dimaksud dengan semantic HTML dan sebutkan minimal 3 contoh tag semantic beserta fungsinya!",
        points: 20,
        answer: ''
    },
    {
        id: 2,
        type: 'single',
        text: "Manakah dari berikut ini yang BUKAN merupakan framework dari bahasa pemrograman JavaScript?",
        points: 10,
        options: ['Vue.js', 'React.js', 'Laravel', 'Angular'],
        answer: '' // Hanya menerima 1 string
    },
    {
        id: 3,
        type: 'multiple',
        text: "Pilihlah semua tag di bawah ini yang digunakan untuk membuat form pada HTML!",
        points: 15,
        options: ['<input>', '<table>', '<select>', '<footer>', '<textarea>'],
        answer: [] // Menerima banyak jawaban dalam bentuk array
    },
    {
        id: 4,
        type: 'single',
        text: "Apa singkatan dari CSS?",
        points: 10,
        options: ['Computer Style Sheets', 'Cascading Style Sheets', 'Creative Style Sheets', 'Colorful Style Sheets'],
        answer: ''
    },
    {
        id: 5,
        type: 'essay',
        text: "Jelaskan konsep DOM (Document Object Model) secara singkat.",
        points: 20,
        answer: ''
    }
]);

// --- STATE MANAGEMENT ---
const activeIndex = ref(0);
const showGridModal = ref(false);

const activeQuestion = computed(() => questions.value[activeIndex.value]);

// --- LOGIC CEK JAWABAN (Disesuaikan dengan Type Soal) ---
const isAnswered = (index) => {
    const q = questions.value[index];

    if (q.type === 'essay') {
        if (!q.answer) return false;
        // Hapus tag HTML kosong bawaan Quill
        const cleanAns = q.answer.replace(/<[^>]*>?/gm, '').trim();
        return cleanAns.length > 0;
    }
    else if (q.type === 'multiple') {
        // Cek apakah array answer memiliki isi
        return Array.isArray(q.answer) && q.answer.length > 0;
    }
    else if (q.type === 'single') {
        // Cek apakah answer string tidak kosong
        return q.answer !== '' && q.answer !== null;
    }
    return false;
};

// --- LOGIC NAVIGASI ---
const nextQuestion = () => {
    if (activeIndex.value < questions.value.length - 1) activeIndex.value++;
};

const prevQuestion = () => {
    if (activeIndex.value > 0) activeIndex.value--;
};

const jumpToQuestion = (index) => {
    activeIndex.value = index;
    showGridModal.value = false;
};

const submitExam = () => {
    const unansweredCount = questions.value.filter((q, idx) => !isAnswered(idx)).length;

    if (unansweredCount > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Tidak bisa kumpul!',
            text: 'Anda belum menjawab semua soal.',
            confirmButtonText: 'Jawab Soal',
            confirmButtonColor: '#4F39F6', // Sesuaikan warna dengan tema (Blue-600)
            cancelButtonColor: '#EC2F37',
            cancelButtonText: 'Batal kumpul',
            heightAuto: false // Fix agar tidak loncat di beberapa layout
        });
        return
    } else {
        Swal.fire({
            icon: 'info',
            title: 'Yakin?',
            text: 'Yakin ingin mengumpulkan jawaban anda?',
            showCancelButton: true,
            confirmButtonText: 'Kumpul',
            confirmButtonColor: '#009966', // Sesuaikan warna dengan tema (Blue-600)
            cancelButtonColor: '#EC2F37',
            cancelButtonText: 'Batal kumpul',
            heightAuto: false // Fix agar tidak loncat di beberapa layout
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim Jawaban ke backend
                alert("AWJAKWDHJKDW");
            }
        });
        return;
    }

    console.log("Jawaban yang dikirim:", questions.value);
    alert("Ujian berhasil dikumpulkan! Silakan cek console untuk melihat payload data.");
};
</script>

<template>

    <Head title="Mengerjakan Ujian" />

    <div class="max-w-5xl mx-auto pb-20 space-y-6">

        <div
            class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 md:px-8 flex flex-col md:flex-row md:items-center justify-between gap-4 z-30">
            <div>
                <h2 class="text-lg md:text-xl font-bold text-slate-900">{{ examInfo.title }}</h2>
                <div class="flex items-center gap-2 text-sm text-slate-500 mt-1">
                    <ListBulletIcon class="w-4 h-4" />
                    <span>{{ questions.length }} Soal Ujian</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div
                    class="flex items-center gap-2 bg-red-50 text-red-600 border border-red-100 px-4 py-2 rounded-xl font-bold font-mono">
                    <ClockIcon class="w-5 h-5 animate-pulse" />
                    {{ examInfo.time_left }}
                </div>
                <button @click="submitExam"
                    class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-emerald-200 transition">
                    Kumpulkan
                </button>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col min-h-[600px]">

            <div class="w-full bg-slate-100 h-1.5">
                <div class="bg-indigo-600 h-1.5 transition-all duration-300"
                    :style="`width: ${((activeIndex + 1) / questions.length) * 100}%`"></div>
            </div>

            <div class="p-6 md:p-8 flex-1 flex flex-col">

                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                    <div class="flex items-center gap-3">
                        <span
                            class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-black text-lg">
                            {{ activeIndex + 1 }}
                        </span>
                        <div>
                            <div class="flex items-center gap-2 mb-0.5">
                                <h3 class="font-bold text-slate-700 text-sm uppercase tracking-wide">Pertanyaan</h3>
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-600 uppercase">
                                    {{ activeQuestion.type === 'single' ? 'Pilihan Tunggal' : activeQuestion.type ===
                                        'multiple' ? 'Pilihan Ganda' : 'Essay' }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-500">Dari total {{ questions.length }} soal</p>
                        </div>
                    </div>

                    <div
                        class="bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-lg text-sm font-bold flex items-center gap-1">
                        {{ activeQuestion.points }} Poin
                    </div>
                </div>

                <div class="prose prose-slate max-w-none mb-8">
                    <p class="text-lg text-slate-800 leading-relaxed font-medium" v-html="activeQuestion.text"></p>
                </div>

                <div class="flex-1 flex flex-col">
                    <div class="flex items-center justify-between mb-3">
                        <label class="text-sm font-bold text-slate-700 flex items-center gap-2">
                            Lembar Jawaban
                            <CheckCircleIcon v-if="isAnswered(activeIndex)" class="w-5 h-5 text-emerald-500" />
                        </label>
                        <span v-if="activeQuestion.type === 'multiple'"
                            class="text-xs text-indigo-600 font-medium bg-indigo-50 px-2 py-1 rounded-md">
                            *Pilih lebih dari satu
                        </span>
                    </div>

                    <div v-if="activeQuestion.type === 'essay'" class="prose-editor-wrapper flex-1 relative">
                        <QuillEditor v-model:content="activeQuestion.answer" contentType="html" theme="snow"
                            toolbar="full" placeholder="Ketik jawaban Anda di sini..." />
                    </div>

                    <div v-else-if="activeQuestion.type === 'single'" class="space-y-3">
                        <label v-for="(opt, idx) in activeQuestion.options" :key="idx"
                            class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200"
                            :class="activeQuestion.answer === opt ? 'border-indigo-500 bg-indigo-50/50 shadow-sm' : 'border-slate-200 bg-white hover:border-indigo-300 hover:bg-slate-50'">

                            <input type="radio" :value="opt" v-model="activeQuestion.answer"
                                class="w-5 h-5 text-indigo-600 border-slate-300 focus:ring-indigo-600 cursor-pointer">
                            <span class="text-base text-slate-800 font-medium leading-relaxed">{{ opt }}</span>
                        </label>
                    </div>

                    <div v-else-if="activeQuestion.type === 'multiple'" class="space-y-3">
                        <label v-for="(opt, idx) in activeQuestion.options" :key="idx"
                            class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200"
                            :class="activeQuestion.answer.includes(opt) ? 'border-indigo-500 bg-indigo-50/50 shadow-sm' : 'border-slate-200 bg-white hover:border-indigo-300 hover:bg-slate-50'">

                            <input type="checkbox" :value="opt" v-model="activeQuestion.answer"
                                class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-indigo-600 cursor-pointer">
                            <span class="text-base text-slate-800 font-medium leading-relaxed">{{ opt }}</span>
                        </label>
                    </div>

                </div>

            </div>

            <div
                class="p-4 md:px-8 border-t border-slate-100 bg-slate-50 flex flex-wrap items-center justify-between gap-4 mt-auto">

                <button @click="prevQuestion" :disabled="activeIndex === 0"
                    class="flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm transition disabled:opacity-50 disabled:cursor-not-allowed"
                    :class="activeIndex === 0 ? 'bg-slate-200 text-slate-400' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-100'">
                    <ChevronLeftIcon class="w-5 h-5" /> Sebelumnya
                </button>

                <button @click="showGridModal = true"
                    class="flex items-center gap-2 px-5 py-2.5 bg-white border border-indigo-200 text-indigo-700 font-bold text-sm rounded-xl hover:bg-indigo-50 transition shadow-sm">
                    <Squares2X2Icon class="w-5 h-5" /> Daftar Soal
                </button>

                <button v-if="activeIndex < questions.length - 1" @click="nextQuestion"
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 shadow-md shadow-indigo-200 transition">
                    Selanjutnya
                    <ChevronRightIcon class="w-5 h-5" />
                </button>
                <button v-else @click="submitExam"
                    class="flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white font-bold text-sm rounded-xl hover:bg-emerald-700 shadow-md shadow-emerald-200 transition">
                    <CheckCircleIcon class="w-5 h-5" /> Selesai & Kumpulkan
                </button>

            </div>
        </div>

        <div v-if="showGridModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showGridModal = false"></div>

            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md flex flex-col overflow-hidden animate-scale-up">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center bg-white">
                    <div>
                        <h3 class="font-bold text-lg text-slate-800">Navigasi Soal</h3>
                    </div>
                    <button @click="showGridModal = false"
                        class="text-slate-400 hover:text-slate-600 p-2 bg-slate-50 rounded-lg">
                        <XMarkIcon class="w-5 h-5" />
                    </button>
                </div>

                <div class="p-6 bg-slate-50">
                    <div class="flex items-center justify-center gap-4 mb-6 text-xs font-medium text-slate-600">
                        <div class="flex items-center gap-1.5">
                            <div class="w-3 h-3 rounded bg-emerald-500"></div> Dijawab
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-3 h-3 rounded bg-white border border-slate-300"></div> Kosong
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-3 h-3 rounded ring-2 ring-indigo-500 ring-offset-1 bg-white"></div> Aktif
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-3">
                        <button v-for="(q, index) in questions" :key="q.id" @click="jumpToQuestion(index)" :class="[
                            'h-12 rounded-xl text-sm font-bold transition-all duration-200 border flex items-center justify-center relative',
                            activeIndex === index ? 'ring-2 ring-indigo-500 ring-offset-2 border-indigo-200 z-10 scale-105' : 'hover:scale-105',
                            isAnswered(index) ? 'bg-emerald-500 text-white border-emerald-600 shadow-inner' : 'bg-white text-slate-600 border-slate-300 hover:bg-slate-50'
                        ]">
                            {{ index + 1 }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style>
/* Kustomisasi Tampilan Quill */
.prose-editor-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 300px;
}

.prose-editor-wrapper .ql-toolbar {
    border-radius: 0.75rem 0.75rem 0 0;
    border-color: #e2e8f0;
    background: #f8fafc;
    font-family: 'Inter', sans-serif;
}

.prose-editor-wrapper .ql-container {
    border-radius: 0 0 0.75rem 0.75rem;
    border-color: #e2e8f0;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: #334155;
    flex: 1;
    background: #ffffff;
}

.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1;
}

/* Modal Animation */
@keyframes scaleUp {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(10px);
    }

    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.animate-scale-up {
    animation: scaleUp 0.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
