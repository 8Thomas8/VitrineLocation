module.exports = {
    purge: [
        './assets/vue/**.js',
        './assets/vue/**.vue'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            height: {
                screen: "100vh",
                window: "calc(100vh - 7rem)",
            },
            minHeight: {
                screen: "100vh",
                window: "calc(100vh - 7rem)",
            },
            inset: {
                auto: "auto",
                "1": "1rem",
                "4": "4rem",
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
