module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ], darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                darkblue: "#2e64f9",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
