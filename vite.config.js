import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import React from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        React(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
