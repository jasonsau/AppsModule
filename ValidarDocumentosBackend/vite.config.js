import { defineConfig } from 'vite';
import fs from 'fs';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

const inputFunction = () => {
    const files = fs.readdirSync(path.join(__dirname, 'apps'));
    const input = [];
    files.forEach(file => {
        input.push(path.join(__dirname, 'apps', file, 'src', 'main.js'));
    });
    return input;
};

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: inputFunction(),
            refresh: true,
        }),
    ],
});
