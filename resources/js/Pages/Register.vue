<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full mx-auto p-8 bg-white shadow-md rounded-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Register</h2>
            <form @submit.prevent="register">
                <div class="mb-4">
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                        >Name</label
                    >
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email</label
                    >
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        name="email"
                        autocomplete="email"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
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
                        v-model="form.password"
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="new-password"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700"
                        >Confirm Password</label
                    >
                    <input
                        v-model="form.password_confirmation"
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        autocomplete="new-password"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-purple-500 text-white py-2 px-4 rounded-md hover:bg-purple-700 transition-colors duration-300"
                >
                    Register
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post("/register", this.form);
                Inertia.visit("/quiz");

                // Handle successful registration (e.g., redirect to login page)
            } catch (error) {
                console.error(error.response.data);
                // Handle error (e.g., display error messages)
            }
        },
    },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
