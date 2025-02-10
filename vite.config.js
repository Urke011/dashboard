import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import dotenv from 'dotenv';

// Load environment variables from Laravel's .env
dotenv.config();

const isProduction = process.env.APP_ENV === 'production';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/sass/app.scss'],
            refresh: !isProduction, // Enable live reload only in non-production
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    base: isProduction ? '/build/' : '/', // Use correct base URL for assets
});
