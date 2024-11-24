/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary : {
                    50:    "#F7F7FF",
                    100:   "#715AFF",
                    200:   "#0F084B",
                    300:   "#0D0221"
                },
            }
        },
    },
    plugins: [],
}
