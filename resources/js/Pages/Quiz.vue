<template>
    <div class="max-w-md mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">User: {{ user.name }}</h2>
            <button
                @click="logout"
                class="bg-red-500 text-white py-1 px-3 rounded"
            >
                Logout
            </button>
        </div>
        <div class="flex justify-between mb-4">
            <div>Max Score: {{ user.score }}</div>
            <div>Current Score: {{ currentScore }}</div>
        </div>
        <div
            v-if="currentQuestion"
            class="question-container bg-purple-500 text-white p-4 rounded-md mb-4"
        >
            <h1 class="text-xl font-semibold">
                {{ currentQuestion.question }}
            </h1>
        </div>
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div
                v-for="(option, index) in options"
                :key="index"
                class="option bg-blue-500 text-white p-4 rounded-md cursor-pointer"
                @dragstart="dragStart($event, option)"
                @dragend="dragEnd"
                :style="{ opacity: isDragging ? 0.5 : 1 }"
                draggable="true"
            >
                {{ option }}
            </div>
        </div>
        <div
            class="answer p-4 rounded-md"
            :class="{
                'bg-green-500': isCorrect,
                'bg-red-500': !isCorrect && droppedItem,
            }"
            style="min-height: 100px"
            @dragover.prevent
            @drop="checkAnswer"
        >
            {{ dropMessage }}
        </div>
        <button
            v-if="currentQuestionIndex < questions.length - 1"
            @click="nextQuestion"
            class="mt-4 bg-gray-800 text-white px-4 py-2 rounded"
        >
            Next Question
        </button>
        <button
            v-else
            @click="submitQuiz"
            class="mt-4 bg-green-800 text-white px-4 py-2 rounded"
        >
            Submit Quiz
        </button>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

export default {
    props: {
        questions: Array,
        user: Object,
    },
    data() {
        return {
            currentQuestionIndex: 0,
            droppedItem: null,
            isDragging: false,
            currentScore: 0,
        };
    },
    computed: {
        currentQuestion() {
            return this.questions[this.currentQuestionIndex];
        },
        options() {
            if (this.currentQuestion && this.currentQuestion.options[0]) {
                return [
                    this.currentQuestion.options[0].option1,
                    this.currentQuestion.options[0].option2,
                    this.currentQuestion.options[0].option3,
                    this.currentQuestion.options[0].option4,
                ];
            }
            return [];
        },
        correctAnswer() {
            return this.currentQuestion.options[0].correct_answer;
        },
        isCorrect() {
            return this.droppedItem === this.correctAnswer;
        },
        dropMessage() {
            if (this.droppedItem) {
                return this.isCorrect
                    ? `Correct: ${this.droppedItem}`
                    : `Incorrect: ${this.droppedItem}`;
            } else {
                return "Drag an option here";
            }
        },
    },
    methods: {
        dragStart(event, option) {
            this.isDragging = true;
            event.dataTransfer.setData("text/plain", option);
        },
        dragEnd() {
            this.isDragging = false;
        },
        checkAnswer(event) {
            event.preventDefault();
            let droppedOption = event.dataTransfer.getData("text/plain");
            this.droppedItem = droppedOption;
            if (this.droppedItem) {
                if (this.isCorrect) {
                    this.currentScore++;
                } else {
                    this.currentScore--;
                }
            }
        },
        nextQuestion() {
            if (this.currentQuestionIndex < this.questions.length - 1) {
                this.currentQuestionIndex++;
                this.droppedItem = null;
            } else {
                this.currentQuestionIndex = null;
            }
        },
        submitQuiz() {
            axios
                .post(route("quiz.submit", { score: this.currentScore }))
                .then((response) => {
                    this.maxScore = response.data.maxScore;
                    alert(`Quiz completed! Your score: ${this.currentScore}`);
                    this.currentScore = 0;
                    this.currentQuestionIndex = 0;
                    this.droppedItem = null;
                    Inertia.get(route("quizzes.show"));
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        logout() {
            axios
                .post(route("logout"))
                .then(() => {
                    Inertia.get(route("login"));
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>

<style scoped>
.answer {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
</style>
