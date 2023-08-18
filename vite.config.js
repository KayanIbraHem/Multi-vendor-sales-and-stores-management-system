import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app-ltr.css',
                'resources/css/app-rtl.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
