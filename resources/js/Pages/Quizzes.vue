<!-- resources/js/Pages/Quizzes.vue -->

<template>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Quizzes</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="quiz in quizzes"
                :key="quiz.id"
                class="quiz-card p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
            >
                <h2 class="text-xl font-semibold mb-2">{{ quiz.title }}</h2>
                <p class="text-gray-700 mb-4">{{ quiz.description }}</p>
                <button
                    @click="playQuiz(quiz.id)"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Play Quiz
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        quizzes: Array,
    },
    methods: {
        playQuiz(id) {
            Inertia.visit(route("quiz.show", { id: id }));
        },
    },
};
</script>
