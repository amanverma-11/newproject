const Ziggy = {
    url: "http://localhost",
    port: null,
    defaults: {},
    routes: {
        "sanctum.csrf-cookie": {
            uri: "sanctum/csrf-cookie",
            methods: ["GET", "HEAD"],
        },
        "ignition.healthCheck": {
            uri: "_ignition/health-check",
            methods: ["GET", "HEAD"],
        },
        "ignition.executeSolution": {
            uri: "_ignition/execute-solution",
            methods: ["POST"],
        },
        "ignition.updateConfig": {
            uri: "_ignition/update-config",
            methods: ["POST"],
        },
        "post.create": { uri: "post/create", methods: ["GET", "HEAD"] },
        "post.store": { uri: "post/create", methods: ["POST"] },
        "posts.show": { uri: "posts", methods: ["GET", "HEAD"] },
        "post.show": {
            uri: "post/{id}",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "post.edit": {
            uri: "post/{id}/edit",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "post.update": {
            uri: "posts/{id}",
            methods: ["PUT"],
            parameters: ["id"],
        },
        "post.delete": {
            uri: "posts/{id}",
            methods: ["DELETE"],
            parameters: ["id"],
        },
        register: { uri: "register", methods: ["POST"] },
        login: { uri: "login", methods: ["POST"] },
        logout: { uri: "logout", methods: ["POST"] },
        "quiz.show": { uri: "quiz", methods: ["GET", "HEAD"] },
        "quiz.submit": { uri: "submit-quiz", methods: ["POST"] },
        "question.create": {
            uri: "questions/create",
            methods: ["GET", "HEAD"],
        },
    },
};

if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
