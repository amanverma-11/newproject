<template>
    <div class="max-w-lg mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2 truncate">
                    {{ post.title }}
                </h2>
                <p class="text-gray-700">{{ post.content }}</p>
                <!-- Uncomment this line if you want to show the creator -->
                <!-- <p class="text-gray-500 text-right">Created by: {{ post.user.username }}</p> -->
            </div>
            <div class="bg-gray-100 px-4 py-2 flex justify-end space-x-2">
                <inertia-link
                    :href="'/post/edit/' + post.id"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
                >
                    Edit
                </inertia-link>
                <button
                    @click="handleDelete"
                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        post: Object,
    },
    methods: {
        handleDelete() {
            if (confirm("Are you sure you want to delete this post?")) {
                Inertia.delete(`/post/delete/${this.post.id}`, {
                    _method: "delete",
                });
            }
        },
    },
};
</script>

<style>
/* Add any additional styling if needed */
</style>
