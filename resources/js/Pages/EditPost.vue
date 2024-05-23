<template>
    <div class="max-w-lg mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-4">Edit Post</h1>
        <form @submit.prevent="handleSubmit">
            <div class="mb-4">
                <label
                    for="title"
                    class="block text-sm font-medium text-gray-700"
                    >Title:</label
                >
                <input
                    type="text"
                    id="title"
                    name="title"
                    v-model="title"
                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />
            </div>

            <div class="mb-4">
                <label
                    for="content"
                    class="block text-sm font-medium text-gray-700"
                    >Content:</label
                >
                <textarea
                    id="content"
                    name="content"
                    v-model="content"
                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>
            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
            >
                Update Post
            </button>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia-vue3";

export default {
    props: {
        post: Object,
    },
    setup(props) {
        const title = ref(props.post.title);
        const content = ref(props.post.content);

        const handleSubmit = () => {
            Inertia.put(`/post/update/${props.post.id}`, {
                title: title.value,
                content: content.value,
            });
        };

        return {
            title,
            content,
            handleSubmit,
        };
    },
};
</script>

<style>
/* Add any additional styling if needed */
</style>
