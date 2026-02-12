<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Edit Assignment' }, () => [page])
}
</script>

<script setup>
import { ref, computed, reactive } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon, XMarkIcon, Cog6ToothIcon, AdjustmentsHorizontalIcon
} from '@heroicons/vue/24/outline';

// --- STATE ---
const activeTab = ref('settings'); //  | 'settings'
const showBankModal = ref(false);
const showCreateModal = ref(false);

// --- MAIN FORM (Gabungan Konten + Settings) ---
const form = useForm({
    // >> Tab Content
    title: '',
    content: '',
    subject: '',
    file: null,
    questions: [],

    // >> Tab Settings (Default Values)
    random_answer: 'No',
    random_question: 'No',
    score_setting: 'Sum',
    announce_score: 'No',
    start_type: 'Open Submission Window',
    late_tolerance: 0,
    assessment_standard: 50,
    start_time: '',
    end_time: '',
    show_result: 'Yes'
});

// --- OPSI DROPDOWN SETTINGS ---
const settingOptions = {
    startType: ['Open Submission Window', 'Fixed Schedule', 'On Demand'],
    boolean: ['Yes', 'No'],
    score: ['Sum', 'Average', 'Highest']
};

// --- DATA DUMMY BANK SOAL ---
const bankQuestions = ref([
    { id: 101, text: 'Apa fungsi dari tag <head> pada HTML?', type: 'essay', tags: ['HTML'], points: 10 },
    { id: 102, text: 'Sebutkan 3 jenis selector pada CSS!', type: 'essay', tags: ['CSS'], points: 15 },
    { id: 103, text: 'Manakah yang merupakan framework PHP?', type: 'choice', tags: ['PHP'], options: ['Laravel', 'React', 'Vue'], correct_option: 0, points: 5 },
    { id: 104, text: 'Variable di PHP diawali dengan tanda...', type: 'choice', tags: ['PHP'], options: ['$', '@', '#'], correct_option: 0, points: 5 },
]);

const searchBank = ref('');
const selectedBankIds = ref([]);

// Filter Bank Soal
const filteredBankQuestions = computed(() => {
    return bankQuestions.value.filter(q =>
        q.text.toLowerCase().includes(searchBank.value.toLowerCase()) ||
        q.tags.some(t => t.toLowerCase().includes(searchBank.value.toLowerCase()))
    );
});

// Logic Bank Soal
const toggleSelectBank = (id) => {
    if (selectedBankIds.value.includes(id)) {
        selectedBankIds.value = selectedBankIds.value.filter(itemId => itemId !== id);
    } else {
        selectedBankIds.value.push(id);
    }
};

const saveFromBank = () => {
    const selectedQuestions = bankQuestions.value.filter(q => selectedBankIds.value.includes(q.id));
    const clones = JSON.parse(JSON.stringify(selectedQuestions));
    form.questions.push(...clones);
    selectedBankIds.value = [];
    showBankModal.value = false;
};

// --- LOGIC BUAT PERTANYAAN BARU ---
const newQuestion = reactive({
    text: '',
    type: 'choice',
    options: ['', ''],
    correct_option: null,
    points: 10
});

const addOption = () => newQuestion.options.push('');
const removeOption = (index) => {
    newQuestion.options.splice(index, 1);
    if (newQuestion.correct_option === index) newQuestion.correct_option = null;
    else if (newQuestion.correct_option > index) newQuestion.correct_option--;
};

const saveNewQuestion = () => {
    if (!newQuestion.text) return alert("Pertanyaan wajib diisi!");
    if (newQuestion.type === 'choice') {
        if (newQuestion.options.some(opt => opt.trim() === '')) return alert("Semua opsi jawaban harus diisi!");
        if (newQuestion.correct_option === null) return alert("Pilih kunci jawaban yang benar!");
    }

    const questionToAdd = JSON.parse(JSON.stringify(newQuestion));
    if (questionToAdd.type === 'essay') {
        delete questionToAdd.options;
        delete questionToAdd.correct_option;
    }

    form.questions.push(questionToAdd);

    // Reset
    newQuestion.text = '';
    newQuestion.type = 'choice';
    newQuestion.options = ['', ''];
    newQuestion.correct_option = null;
    newQuestion.points = 10;
    showCreateModal.value = false;
};

const removeQuestionFromList = (index) => {
    if (confirm('Hapus pertanyaan ini dari daftar?')) {
        form.questions.splice(index, 1);
    }
};

const submit = () => {
    console.log("Full Data (Content + Settings):", form.data());
    alert("Assignment berhasil disimpan! Cek Console untuk melihat data Settings.");
};

const handleFileUpload = (e) => { form.file = e.target.files[0]; };
const removeFile = () => { form.file = null; document.getElementById('file-upload').value = ''; };
</script>

<template>

    <Head title="Edit Assignment" />

    <div class="max-w-5xl mx-auto pb-20 relative">

        <form @submit.prevent="submit" class="space-y-6">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <Link :href="route('teacher.dashboard.class.edit.session')"
                    class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                    <ChevronLeftIcon class="w-4 h-4" />
                    Kembali ke Edit Session
                </Link>

                <button type="submit" :disabled="form.processing"
                    class="hidden sm:block px-6 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70">
                    <span v-if="form.processing">Menyimpan...</span>
                    <span v-else>Simpan Perubahan</span>
                </button>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="flex border-b border-slate-200">
                    <button type="button" @click="activeTab = 'settings'"
                        :class="activeTab === 'settings' ? 'border-indigo-500 text-indigo-600 bg-indigo-50/50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                        class="flex-1 py-4 text-sm font-bold text-center border-b-2 transition flex items-center justify-center gap-2">
                        <Cog6ToothIcon class="w-5 h-5" />
                        Pengaturan (Settings)
                    </button>
                </div>

                <div v-show="activeTab === 'settings'" class="p-6 md:p-8 space-y-8 animate-fade-in">

                    <div class="flex items-start gap-4 p-4 bg-blue-50 border border-blue-100 rounded-xl">
                        <AdjustmentsHorizontalIcon class="w-6 h-6 text-blue-600 flex-shrink-0" />
                        <div>
                            <h4 class="font-bold text-blue-800 text-sm">Konfigurasi Assignment</h4>
                            <p class="text-xs text-blue-600 mt-1">Pengaturan ini menentukan bagaimana siswa mengerjakan
                                ujian/tugas, termasuk waktu pengerjaan dan penilaian.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Random Answer</label>
                                <select v-model="form.random_answer" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.boolean" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Score Setting</label>
                                <select v-model="form.score_setting" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.score" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                                <p class="text-[10px] text-slate-500 mt-1.5 leading-relaxed">
                                    <strong>Sum:</strong> Total nilai dihitung dari penjumlahan poin semua soal.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Assessment Start Type</label>
                                <select v-model="form.start_type" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.startType" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Assessment Start</label>
                                <input v-model="form.start_time" type="datetime-local" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Assessment End Time</label>
                                <input v-model="form.end_time" type="datetime-local" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Random Question</label>
                                <select v-model="form.random_question" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.boolean" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Announce Score</label>
                                <select v-model="form.announce_score" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.boolean" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Late Tolerance
                                    (Minutes)</label>
                                <input v-model="form.late_tolerance" type="number" min="0" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Assessment Standard
                                    (KKM)</label>
                                <input v-model="form.assessment_standard" type="number" min="0" max="100"
                                    class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Show Result After
                                    Exam</label>
                                <select v-model="form.show_result" class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm text-slate-700 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none appearance-none">
                                    <option v-for="opt in settingOptions.boolean" :key="opt" :value="opt">{{ opt }}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="sm:hidden pt-4">
                <button type="submit" :disabled="form.processing"
                    class="w-full px-6 py-3 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>

        <div v-if="showBankModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showBankModal = false"></div>
            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] flex flex-col overflow-hidden animate-scale-up">
                <div class="p-5 border-b flex justify-between items-center">
                    <h3 class="font-bold">Bank Soal</h3><button @click="showBankModal = false">
                        <XMarkIcon class="w-6 h-6" />
                    </button>
                </div>
                <div class="p-5 flex-1 overflow-y-auto bg-slate-50">
                    <div v-for="q in filteredBankQuestions" :key="q.id" @click="toggleSelectBank(q.id)"
                        :class="selectedBankIds.includes(q.id) ? 'bg-indigo-50 border-indigo-500' : 'bg-white'"
                        class="p-4 border rounded-xl mb-2 cursor-pointer">{{ q.text }}</div>
                </div>
                <div class="p-5 border-t flex justify-end gap-2"><button @click="showBankModal = false"
                        class="px-4 py-2 rounded hover:bg-slate-100">Batal</button><button @click="saveFromBank"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">Pilih</button></div>
            </div>
        </div>

        <div v-if="showCreateModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showCreateModal = false"></div>
            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col overflow-hidden animate-scale-up">
                <div class="p-5 border-b flex justify-between items-center">
                    <h3 class="font-bold">Buat Soal</h3><button @click="showCreateModal = false">
                        <XMarkIcon class="w-6 h-6" />
                    </button>
                </div>
                <div class="p-6 flex-1 overflow-y-auto space-y-4">
                    <div><label class="font-bold text-sm">Soal</label><textarea v-model="newQuestion.text"
                            class="w-full border rounded p-2"></textarea></div>
                    <div class="flex gap-4"><label><input type="radio" v-model="newQuestion.type" value="choice">
                            Pilihan Ganda</label><label><input type="radio" v-model="newQuestion.type" value="essay">
                            Essay</label></div>
                    <div v-if="newQuestion.type === 'choice'">
                        <div v-for="(opt, i) in newQuestion.options" :key="i" class="flex gap-2 mb-2"><input type="radio"
                                :value="i" v-model="newQuestion.correct_option"><input v-model="newQuestion.options[i]"
                                class="border rounded w-full p-1"><button @click="removeOption(i)">X</button></div>
                        <button @click="addOption" class="text-sm text-blue-600">+ Opsi</button>
                    </div>
                </div>
                <div class="p-5 border-t flex justify-end gap-2"><button @click="showCreateModal = false"
                        class="px-4 py-2 rounded hover:bg-slate-100">Batal</button><button @click="saveNewQuestion"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan</button></div>
            </div>
        </div>

    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
}

@keyframes scaleUp {
    from {
        opacity: 0;
        transform: scale(0.95);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Kustomisasi Quill & Animation */
.prose-editor-wrapper .ql-toolbar {
    border-radius: 0.75rem 0.75rem 0 0;
    border-color: #e2e8f0;
    background: #f8fafc;
}

.prose-editor-wrapper .ql-container {
    border-radius: 0 0 0.75rem 0.75rem;
    border-color: #e2e8f0;
    min-height: 250px;
}

.prose-editor-wrapper:focus-within .ql-toolbar,
.prose-editor-wrapper:focus-within .ql-container {
    border-color: #6366f1;
}

.animate-scale-up {
    animation: scaleUp 0.2s ease-out forwards;
}

.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}
</style>
