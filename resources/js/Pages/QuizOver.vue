<template>
    <div class="max-w-md mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Quiz Over</h1>
        <p class="text-lg mb-2">User: {{ user.name }}</p>
        <p class="text-lg mb-2">Your Score: {{ currentScore }}</p>
        <p class="text-lg mb-4">Max Score: {{ user.score }}</p>
        <button
            @click="retryQuiz"
            class="bg-blue-500 text-white py-2 px-4 rounded"
        >
            Retry Quiz
        </button>
    </div>
</template>

<script>
export default {
    props: {
        user: Object,
        currentScore: Number,
    },
    methods: {
        retryQuiz() {
            window.location.href = "/quiz";
        },
    },
};
</script>

<style scoped></style>
