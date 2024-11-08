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
        customDarkBeige: '#D3C5B4',
        customGreen: '#1ab76a',
        customDarkGreen: '#158F5A',
        customDarkGray: '#1E201E',
        customLightGray: '#2A2C2A',
        customLighterGray: '#3A3C3A',
        customBtnGreen: '#22c55e',
        customOrange: '#F97316',
      },
    },
  },
  plugins: [],
}

