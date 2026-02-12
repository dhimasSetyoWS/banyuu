<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    layout: (h, page) => h(AuthenticatedLayout, { header: 'Tambah Exam Baru' }, () => [page])
}
</script>

<script setup>
import { ref, computed, reactive } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {
    ChevronLeftIcon, DocumentTextIcon, TagIcon, CloudArrowUpIcon, XMarkIcon, PaperClipIcon,
    ListBulletIcon, ArchiveBoxIcon, PlusCircleIcon, MagnifyingGlassIcon, CheckCircleIcon,
    TrashIcon, PlusIcon, KeyIcon
} from '@heroicons/vue/24/outline';

// --- STATE ---
const showBankModal = ref(false);
const showCreateModal = ref(false);

const form = useForm({
    title: '',
    content: '',
    subject: '',
    file: null,
    questions: []
});

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
    // Gunakan JSON parse/stringify untuk deep copy agar tidak reaktif ke data bank asal
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
    correct_option: null, // Nullable di awal
    points: 10
});

const addOption = () => newQuestion.options.push('');
const removeOption = (index) => {
    newQuestion.options.splice(index, 1);
    // Reset kunci jawaban jika opsi yang dihapus adalah kunci
    if (newQuestion.correct_option === index) newQuestion.correct_option = null;
    else if (newQuestion.correct_option > index) newQuestion.correct_option--;
};

const saveNewQuestion = () => {
    // Validasi
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

    // Reset Form
    newQuestion.text = '';
    newQuestion.type = 'choice';
    newQuestion.options = ['', ''];
    newQuestion.correct_option = null;
    newQuestion.points = 10;
    showCreateModal.value = false;
};

// --- LOGIC UMUM ---
const removeQuestionFromList = (index) => {
    if (confirm('Hapus pertanyaan ini dari daftar?')) {
        form.questions.splice(index, 1);
    }
};

const submit = () => {
    console.log(form.data());
    // form.post(...)
    alert("Exam beserta soal berhasil disimpan (Cek Console)!");
};
const handleFileUpload = (e) => { form.file = e.target.files[0]; };
const removeFile = () => { form.file = null; document.getElementById('file-upload').value = ''; };
</script>

<template>

    <Head title="Tambah Exam" />

    <div class="max-w-5xl mx-auto pb-20 relative">

        <form @submit.prevent="submit" class="space-y-8">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <Link :href="route('teacher.dashboard.class.edit.session')"
                    class="flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">
                    <ChevronLeftIcon class="w-4 h-4" />
                    Kembali ke Edit Session
                </Link>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="font-bold text-slate-900 text-lg mb-6 flex items-center gap-2">
                    <DocumentTextIcon class="w-5 h-5 text-slate-400" />
                    Konten Exam
                </h3>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Exam</label>
                        <input v-model="form.title" type="text"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition outline-none text-slate-900 placeholder:text-slate-400 font-medium"
                            placeholder="Contoh: Pengenalan HTML5 & Struktur Dasar">
                        <p v-if="form.errors.title" class="text-xs text-red-500 mt-1">{{ form.errors.title }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Subject</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <TagIcon class="h-4 w-4 text-slate-400" />
                                </div>
                                <select v-model="form.subject"
                                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl bg-white text-slate-600 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 sm:text-sm cursor-pointer">
                                    <option disabled value="">Pilih subject</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Biologi">Biologi</option>
                                    <option value="Teknologi">Teknologi</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Lampiran (Opsional)</label>
                            <div v-if="!form.file" class="relative group">
                                <input type="file" id="file-upload" @change="handleFileUpload" class="hidden" />
                                <label for="file-upload"
                                    class="flex flex-col items-center justify-center w-full h-[46px] border-2 border-dashed border-slate-300 rounded-xl cursor-pointer bg-slate-50 hover:bg-indigo-50 hover:border-indigo-300 transition group-hover:text-indigo-600">
                                    <div class="flex items-center gap-2 text-slate-400 group-hover:text-indigo-600">
                                        <CloudArrowUpIcon class="w-5 h-5" /><span class="text-xs font-bold">Upload
                                            File</span>
                                    </div>
                                </label>
                            </div>
                            <div v-else
                                class="flex items-center justify-between w-full h-[46px] px-3 border border-indigo-200 bg-indigo-50 rounded-xl">
                                <div class="flex items-center gap-2 overflow-hidden">
                                    <PaperClipIcon class="w-4 h-4 text-indigo-600 flex-shrink-0" />
                                    <span class="text-xs font-medium text-indigo-700 truncate max-w-[200px]">{{
                                        form.file.name }}</span>
                                </div>
                                <button type="button" @click="removeFile"
                                    class="text-slate-400 hover:text-red-500 transition">
                                    <XMarkIcon class="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Instruksi Exam</label>
                        <div class="prose-editor-wrapper">
                            <QuillEditor v-model:content="form.content" contentType="html" theme="snow" toolbar="full"
                                placeholder="Tulis instruksi exam di sini..." />
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">

                <div class="border-b border-slate-100 pb-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
                            <ListBulletIcon class="w-5 h-5 text-slate-400" />
                            Daftar Pertanyaan
                        </h3>
                    </div>
                    <div
                        class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-lg text-xs font-bold border border-indigo-100">
                        {{ form.questions.length }} Soal
                    </div>
                </div>

                <div v-if="form.questions.length > 0" class="space-y-3">
                    <div v-for="(q, index) in form.questions" :key="index"
                        class="group relative flex gap-4 p-5 border border-slate-200 rounded-xl hover:border-indigo-300 hover:bg-slate-50 transition bg-white">
                        <span
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-white border border-slate-200 rounded-full text-xs font-bold text-slate-500 shadow-sm">
                            {{ index + 1 }}
                        </span>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-2">
                                <span v-if="q.type === 'choice'"
                                    class="text-[10px] font-bold uppercase bg-blue-100 text-blue-700 px-2 py-0.5 rounded">Pilihan
                                    Ganda</span>
                                <span v-else
                                    class="text-[10px] font-bold uppercase bg-orange-100 text-orange-700 px-2 py-0.5 rounded">Essay</span>
                                <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded">{{
                                    q.points }} Poin</span>
                            </div>

                            <p class="text-sm font-semibold text-slate-800 mb-2 line-clamp-2" v-html="q.text"></p>

                            <div v-if="q.type === 'choice'" class="pl-4 border-l-2 border-slate-200 space-y-1">
                                <div v-for="(opt, oIdx) in q.options" :key="oIdx"
                                    class="flex items-center gap-2 text-xs text-slate-600">
                                    <div :class="q.correct_option === oIdx ? 'bg-emerald-500 border-emerald-500' : 'border-slate-300'"
                                        class="w-2 h-2 rounded-full border"></div>
                                    <span :class="{ 'font-bold text-emerald-600': q.correct_option === oIdx }">{{ opt
                                        }}</span>
                                    <KeyIcon v-if="q.correct_option === oIdx" class="w-3 h-3 text-emerald-500" />
                                </div>
                            </div>
                        </div>

                        <button type="button" @click="removeQuestionFromList(index)"
                            class="absolute top-4 right-4 text-slate-300 hover:text-red-500 transition">
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <div v-else class="text-center py-10 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                    <p class="text-slate-500 text-sm">Belum ada pertanyaan yang ditambahkan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <button type="button" @click="showBankModal = true"
                        class="group cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 hover:shadow-md transition text-left bg-white">
                        <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                            <ArchiveBoxIcon class="w-6 h-6" />
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Ambil dari Bank Soal</h4>
                        </div>
                    </button>
                    <button type="button" @click="showCreateModal = true"
                        class="group cursor-pointer flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 hover:shadow-md transition text-left bg-white">
                        <div class="p-2 bg-emerald-100 text-emerald-600 rounded-lg">
                            <PlusCircleIcon class="w-6 h-6" />
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Buat Pertanyaan Baru</h4>
                        </div>
                    </button>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" :disabled="form.processing"
                    class="px-8 py-3 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition disabled:opacity-70 cursor-pointer w-full sm:w-auto">
                    <span v-if="form.processing">Menyimpan...</span>
                    <span v-else>Simpan Exam</span>
                </button>
            </div>

        </form>

        <div v-if="showBankModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showBankModal = false"></div>

            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] flex flex-col overflow-hidden animate-scale-up">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center bg-white">
                    <h3 class="font-bold text-lg text-slate-800">Bank Soal</h3>
                    <button @click="showBankModal = false" class="text-slate-400 hover:text-slate-600">
                        <XMarkIcon class="w-6 h-6" />
                    </button>
                </div>

                <div class="p-5 flex-1 overflow-y-auto bg-slate-50 custom-scrollbar">
                    <div class="relative mb-4">
                        <MagnifyingGlassIcon class="absolute left-3 top-3 w-5 h-5 text-slate-400" />
                        <input v-model="searchBank" type="text" placeholder="Cari soal..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>
                    <div class="space-y-2">
                        <div v-for="q in filteredBankQuestions" :key="q.id" @click="toggleSelectBank(q.id)"
                            :class="{ 'border-indigo-500 bg-indigo-50 ring-1 ring-indigo-500': selectedBankIds.includes(q.id), 'border-slate-200 bg-white hover:border-indigo-300': !selectedBankIds.includes(q.id) }"
                            class="p-4 rounded-xl border cursor-pointer transition flex gap-3 items-start select-none">
                            <div :class="selectedBankIds.includes(q.id) ? 'bg-indigo-600 border-indigo-600' : 'bg-white border-slate-300'"
                                class="w-5 h-5 rounded border flex items-center justify-center mt-0.5 transition-colors">
                                <CheckCircleIcon v-if="selectedBankIds.includes(q.id)" class="w-4 h-4 text-white" />
                            </div>
                            <div class="flex-1">
                                <div class="flex gap-2 mb-1">
                                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wide">{{ q.type
                                        }}</span>
                                    <span v-for="tag in q.tags" :key="tag"
                                        class="text-[10px] bg-slate-100 text-slate-600 px-1.5 rounded">{{ tag }}</span>
                                    <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-1.5 rounded">{{
                                        q.points }} Poin</span>
                                </div>
                                <p class="text-sm text-slate-700 font-medium">{{ q.text }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-5 border-t border-slate-100 bg-white flex justify-between items-center">
                    <span class="text-sm text-slate-500">{{ selectedBankIds.length }} Soal dipilih</span>
                    <div class="flex gap-3">
                        <button @click="showBankModal = false"
                            class="px-4 py-2 text-slate-600 font-bold text-sm hover:bg-slate-100 rounded-lg">Batal</button>
                        <button @click="saveFromBank" :disabled="selectedBankIds.length === 0"
                            class="px-6 py-2 bg-indigo-600 text-white font-bold text-sm rounded-lg hover:bg-indigo-700 disabled:opacity-50">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="showCreateModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showCreateModal = false"></div>

            <div
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col overflow-hidden animate-scale-up">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center bg-white">
                    <h3 class="font-bold text-lg text-slate-800">Buat Pertanyaan Baru</h3>
                    <button @click="showCreateModal = false" class="text-slate-400 hover:text-slate-600">
                        <XMarkIcon class="w-6 h-6" />
                    </button>
                </div>

                <div class="p-6 flex-1 overflow-y-auto custom-scrollbar">
                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tipe Soal</label>
                        <div class="flex gap-4">
                            <label
                                class="flex items-center gap-2 cursor-pointer p-3 border rounded-xl w-1/2 hover:bg-slate-50"
                                :class="newQuestion.type === 'choice' ? 'border-indigo-500 ring-1 ring-indigo-500 bg-indigo-50' : 'border-slate-200'">
                                <input type="radio" v-model="newQuestion.type" value="choice"
                                    class="text-indigo-600 focus:ring-indigo-600">
                                <span class="text-sm font-bold text-slate-700">Pilihan Ganda</span>
                            </label>
                            <label
                                class="flex items-center gap-2 cursor-pointer p-3 border rounded-xl w-1/2 hover:bg-slate-50"
                                :class="newQuestion.type === 'essay' ? 'border-indigo-500 ring-1 ring-indigo-500 bg-indigo-50' : 'border-slate-200'">
                                <input type="radio" v-model="newQuestion.type" value="essay"
                                    class="text-indigo-600 focus:ring-indigo-600">
                                <span class="text-sm font-bold text-slate-700">Essay / Isian</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Pertanyaan</label>
                        <textarea v-model="newQuestion.text" rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                            placeholder="Tulis soal di sini..."></textarea>
                    </div>

                    <div v-if="newQuestion.type === 'choice'"
                        class="mb-5 space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-bold text-slate-700">Opsi Jawaban</label>
                            <span class="text-xs text-slate-500">Pilih radio button untuk kunci jawaban</span>
                        </div>
                        <div v-for="(opt, idx) in newQuestion.options" :key="idx" class="flex items-center gap-2">
                            <input type="radio" name="correct_opt_new" :value="idx" v-model="newQuestion.correct_option"
                                class="w-5 h-5 text-emerald-600 focus:ring-emerald-600 cursor-pointer">
                            <input type="text" v-model="newQuestion.options[idx]"
                                class="flex-1 px-3 py-2 rounded-lg border border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                :placeholder="'Opsi ' + (idx + 1)">
                            <button @click="removeOption(idx)" class="text-slate-400 hover:text-red-500 p-1"
                                v-if="newQuestion.options.length > 2">
                                <XMarkIcon class="w-5 h-5" />
                            </button>
                        </div>
                        <button @click="addOption"
                            class="mt-2 text-sm text-indigo-600 font-bold hover:underline flex items-center gap-1">
                            <PlusIcon class="w-4 h-4" /> Tambah Opsi Lain
                        </button>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Bobot Nilai (Poin)</label>
                        <input type="number" v-model="newQuestion.points"
                            class="w-24 px-3 py-2 rounded-lg border border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="p-5 border-t border-slate-100 bg-white flex justify-end gap-3">
                    <button @click="showCreateModal = false"
                        class="px-4 py-2 text-slate-600 font-bold text-sm hover:bg-slate-100 rounded-lg">Batal</button>
                    <button @click="saveNewQuestion"
                        class="px-6 py-2 bg-indigo-600 text-white font-bold text-sm rounded-lg hover:bg-indigo-700">Simpan
                        Pertanyaan</button>
                </div>
            </div>
        </div>

    </div>
</template>

<style>
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

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>
