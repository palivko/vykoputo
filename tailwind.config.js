/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './public/**/*.php',
        './public/**/*.html',
        './includes/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                // Primární tmavá
                ink: {
                    DEFAULT: '#0F100F',
                    900: '#1A1C1A',
                    800: '#262925',
                    700: '#3A3D38',
                },
                // Primární světlá
                cream: {
                    DEFAULT: '#F5F1EA',
                    50:  '#FBF8F3',
                    200: '#D8D2C7',
                },
                // Akcent — JCB oranžová
                clay: {
                    DEFAULT: '#E87722',
                    600: '#C9651C',
                },
                // Doplňkové
                stone: {
                    500: '#8B857A',
                },
                success: '#4F7B3A',
                error:   '#A33B3B',
            },
            fontFamily: {
                display: ['Archivo', 'system-ui', 'sans-serif'],
                body:    ['Inter',   'system-ui', 'sans-serif'],
            },
            fontSize: {
                // Fluid hero nadpis
                hero: ['clamp(2.75rem, 7vw, 4.5rem)', { lineHeight: '1.05', letterSpacing: '-0.02em' }],
                h2:   ['clamp(2rem,   4vw, 3rem)',     { lineHeight: '1.1',  letterSpacing: '-0.015em' }],
            },
        },
    },
    plugins: [],
};
