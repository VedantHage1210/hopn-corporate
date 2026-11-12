import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // Brand blue replaces Tailwind's indigo everywhere (keeps the site blue/white).
                indigo: {
                    50: '#EAF2F5', 100: '#D3E6EE', 200: '#B7D3E0', 300: '#9FC8DA', 400: '#8FB8CC',
                    500: '#2F6F8F', 600: '#245B78', 700: '#1D4D66', 800: '#153B50', 900: '#0B3549', 950: '#061A27',
                },
                hopn: {
                    primary: '#0A0F1E',
                    accent: '#245B78',
                    soft: '#111A2F',
                    muted: '#94A3B8',
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
