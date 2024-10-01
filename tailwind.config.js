/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        customBeige: '#ECDFCC',
        customGreen: '#6A9C89',
        customDarkGray: '#1E201E',
        customLightGray: '#2A2C2A',
        customLighterGray: '#3A3C3A',
      },
    },
  },
  plugins: [],
}

