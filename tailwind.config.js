/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    content: [
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'nunito': ['Nunito', 'sans-serif']
            },
            colors: {
                'alabaster': '#f8f8f8',
                'tundora': '#4b4b4b',
                'persian-blue': '#3224d2'
            }
        },
    },
    plugins: [],
}
