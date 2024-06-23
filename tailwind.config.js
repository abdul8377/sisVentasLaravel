const Color = require('color')
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        './src/**/*.html',
        "./resources/**/*.vue",
        './src/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

        },
    },

    plugins: [forms, typography],
};


