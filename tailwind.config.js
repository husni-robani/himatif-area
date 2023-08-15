import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#faf9f7",
                secondary: "#E2E8F0",
                darkPrimary: "#212121",
                darkSecondary: "#313131",
                accent: "#9EBFE2",
                secondaryAccent: "#B83933",
            },
            textColor: {
                lightFontPrimary: "#000000",
                lightFontSecondary: "rgb(75 85 99 / var(--tw-text-opacity))",
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin.js')
    ],


};
