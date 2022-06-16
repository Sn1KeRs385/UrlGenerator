const spacing0to100px = Object.fromEntries(
    Array.from({length: 101}).map((_, index) => [index, `${index}px`])
)

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    important: true,

    theme: {
        borderWidth: {
            DEFAULT: '1px',
            ...spacing0to100px,
        },

        borderRadius: {
            ...spacing0to100px,
            full: '9999px',
        },

        spacing: {
            ...spacing0to100px,
        },

        fontSize: {
            ...spacing0to100px,
        },

        minWidth: {
            '4/5': '80%',
        },
    },
}
