<template>
    <div class="container mx-auto py-8 px-3">
        <div
            class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden"
        >
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">Create a New Post</h1>
                <form @submit.prevent="handleSubmit">
                    <div class="mb-4">
                        <label
                            for="title"
                            class="block text-gray-700 text-sm font-bold mb-2"
                        >
                            Title:
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            v-model="formData.title"
                            class="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 shadow-sm"
                        />
                    </div>
                    <div class="mb-6">
                        <label
                            for="content"
                            class="block text-gray-700 text-sm font-bold mb-2"
                        >
                            Content:
                        </label>
                        <textarea
                            id="content"
                            name="content"
                            v-model="formData.content"
                            class="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 shadow-sm"
                            rows="5"
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md"
                    >
                        Create Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "CreatePost",
    data() {
        return {
            formData: {
                title: "",
                content: "",
            },
        };
    },
    methods: {
        handleSubmit() {
            Inertia.post("/post/create", this.formData);
        },
    },
};
</script>

<style>
/* Add any additional styling if needed */
</style>
