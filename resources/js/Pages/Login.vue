<template>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-semibold mb-6 text-center">Login</h1>
            <form @submit.prevent="login">
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email</label
                    >
                    <input
                        type="email"
                        v-model="form.email"
                        id="email"
                        name="email"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        autocomplete="email"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        type="password"
                        v-model="form.password"
                        id="password"
                        name="password"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        autocomplete="current-password"
                        required
                    />
                </div>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="w-full bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-700 transition-colors duration-300"
                    >
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    setup() {
        const form = useForm({
            email: "",
            password: "",
        });

        const login = () => {
            form.post("/login", {
                onFinish: () => form.reset("password"),
            });
        };

        return {
            form,
            login,
        };
    },
};
</script>

<style scoped>
/* Add any styles you need for the login page */
</style>
