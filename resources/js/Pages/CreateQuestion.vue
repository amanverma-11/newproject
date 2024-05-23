<template>
    <div class="max-w-md mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Add Question</h2>
        <form @submit.prevent="addQuestion">
            <input type="hidden" name="_token" :value="csrfToken" />

            <div class="mb-4">
                <label
                    for="question"
                    class="block text-sm font-medium text-gray-700"
                    >Question</label
                >
                <input
                    type="text"
                    id="question"
                    v-model="question"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    for="option1"
                    class="block text-sm font-medium text-gray-700"
                    >Option 1</label
                >
                <input
                    type="text"
                    id="option1"
                    v-model="option1"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    for="option2"
                    class="block text-sm font-medium text-gray-700"
                    >Option 2</label
                >
                <input
                    type="text"
                    id="option2"
                    v-model="option2"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    for="option3"
                    class="block text-sm font-medium text-gray-700"
                    >Option 3</label
                >
                <input
                    type="text"
                    id="option3"
                    v-model="option3"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    for="option4"
                    class="block text-sm font-medium text-gray-700"
                    >Option 4</label
                >
                <input
                    type="text"
                    id="option4"
                    v-model="option4"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    for="correctAnswer"
                    class="block text-sm font-medium text-gray-700"
                    >Correct Answer</label
                >
                <input
                    type="text"
                    id="correctAnswer"
                    v-model="correctAnswer"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                />
            </div>

            <button
                type="submit"
                class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Add Question
            </button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            csrfToken: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            question: "",
            option1: "",
            option2: "",
            option3: "",
            option4: "",
            correctAnswer: "",
        };
    },
    methods: {
        async addQuestion() {
            const formData = {
                _token: this.csrfToken,
                question: this.question,
                option1: this.option1,
                option2: this.option2,
                option3: this.option3,
                option4: this.option4,
                correct_answer: this.correctAnswer,
            };

            try {
                await axios.post("/questions/create", formData);
                this.resetForm();
            } catch (error) {
                console.error("Error submitting form:", error);
            }
        },
        resetForm() {
            this.question = "";
            this.option1 = "";
            this.option2 = "";
            this.option3 = "";
            this.option4 = "";
            this.correctAnswer = "";
        },
    },
};
</script>

<style scoped>
.form-control {
    margin-bottom: 1rem;
}
</style>
