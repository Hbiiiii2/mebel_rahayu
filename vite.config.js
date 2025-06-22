import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/frontend.css", // <-- Tambahkan ini
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
