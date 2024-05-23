<template>
    <div class="container mx-auto py-8 px-3">
        <div class="mb-4">
            <inertia-link
                :href="route('post.create')"
                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block"
            >
                Create a New Post
            </inertia-link>
        </div>
        <h1 class="text-3xl font-bold mb-4">All Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
                v-for="post in posts"
                :key="post.id"
                class="bg-white shadow-md rounded-lg overflow-hidden"
            >
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 truncate">
                        {{ post.title }}
                    </h2>
                    <p class="text-gray-700">
                        {{
                            post.content.length > 100
                                ? post.content.substring(0, 100) + "..."
                                : post.content
                        }}
                    </p>
                </div>
                <!-- <p class="text-gray-500 font-semibold text-right mr-2">
          Created by: {{ post.user.username }}
        </p> -->
                <div class="bg-gray-100 px-4 py-2">
                    <inertia-link
                        :href="route('post.show', { id: post.id })"
                        class="text-blue-500 hover:underline"
                    >
                        Show Full Post
                    </inertia-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { route } from "@inertiajs/inertia-vue3";

export default {
    props: {
        posts: Array,
    },
    setup() {
        return {
            route,
        };
    },
};
</script>

<style>
/* Add any additional styling if needed */
</style>
