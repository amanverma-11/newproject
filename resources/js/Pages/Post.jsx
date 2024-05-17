import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const Post = ({ post }) => {
    const handleDelete = () => {
        if (confirm("Are you sure you want to delete this post?")) {
            Inertia.delete(route("post.delete", { id: post.id }), {
                _method: "delete",
            });
        }
    };

    return (
        <div className="max-w-lg mx-auto mt-8">
            <div className="bg-white shadow-lg rounded-lg overflow-hidden">
                <div className="p-4">
                    <h2 className="text-xl font-semibold mb-2 truncate">
                        {post.title}
                    </h2>
                    <p className="text-gray-700">{post.content}</p>
                    {/* Uncomment this line if you want to show the creator */}
                    {/* <p className="text-gray-500 text-right">Created by: {post.user.username}</p> */}
                </div>
                <div className="bg-gray-100 px-4 py-2 flex justify-end space-x-2">
                    <InertiaLink
                        href={route("post.edit", { id: post.id })}
                        className="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
                    >
                        Edit
                    </InertiaLink>
                    <button
                        onClick={handleDelete}
                        className="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    );
};

export default Post;
