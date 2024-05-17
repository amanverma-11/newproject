import React from "react";
import { Inertia } from "@inertiajs/inertia";

const CreatePost = () => {
    const handleSubmit = (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        Inertia.post("/post/create", formData);
    };

    return (
        <div className="container mx-auto py-8 px-3">
            <div className="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div className="p-6">
                    <h1 className="text-3xl font-bold mb-4">
                        Create a New Post
                    </h1>
                    <form method="POST" onSubmit={handleSubmit}>
                        <div className="mb-4">
                            <label
                                htmlFor="title"
                                className="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Title:
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                className="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 shadow-sm"
                            />
                        </div>
                        <div className="mb-6">
                            <label
                                htmlFor="content"
                                className="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Content:
                            </label>
                            <textarea
                                id="content"
                                name="content"
                                className="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 shadow-sm"
                                rows="5"
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            className="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md"
                        >
                            Create Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default CreatePost;
