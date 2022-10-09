/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                headline: ["F1-Regular"],
                boldHeadline: ["F1-Bold"],
            },
        },
    },
    plugins: [],
};
