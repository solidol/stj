import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            publicDirectory: './public_html/',
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            build: {
                outDir: './public_html/build/'
            },
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});