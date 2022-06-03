module.exports = {
    content: [
        "./resources/**/*.jsx",
        "./resources/**/*.js",
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            maxWidth: {
                card: "14rem",
                cardMobile: "10rem",
                cardBasket: "18rem"
            },
            fontFamily: {
                'nunito': ["Nunito", "sans-serif"]
            },
            screens: {
                "phone": "450px"
            }
        },
    },
    plugins: [],
}
