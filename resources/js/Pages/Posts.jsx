import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

const Posts = ({ posts }) => {
    return (
        <div className="container mx-auto py-8 px-3">
            <div className="mb-4">
                <InertiaLink
                    href={route("post.create")}
                    className="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-block"
                >
                    Create a New Post
                </InertiaLink>
            </div>
            <h1 className="text-3xl font-bold mb-4">All Posts</h1>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {posts.map((post) => (
                    <div
                        key={post.id}
                        className="bg-white shadow-md rounded-lg overflow-hidden"
                    >
                        <div className="p-4">
                            <h2 className="text-xl font-semibold mb-2 truncate">
                                {post.title}
                            </h2>
                            <p className="text-gray-700">
                                {post.content.length > 100
                                    ? post.content.substring(0, 100) + "..."
                                    : post.content}
                            </p>
                        </div>
                        {/* <p className="text-gray-500 font-semibold text-right mr-2">
                            Created by: {post.user.username}
                        </p> */}
                        <div className="bg-gray-100 px-4 py-2">
                            <InertiaLink
                                href={route("post.show", { id: post.id })}
                                className="text-blue-500 hover:underline"
                            >
                                Show Full Post
                            </InertiaLink>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Posts;
