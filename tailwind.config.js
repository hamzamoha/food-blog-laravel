/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      animation: {
        pop: 'pop 0.2s linear 1',
        push: 'push 0.2s linear 1',
      }
    },
    fontFamily: {
      'sans': ['Exo2', 'sans-serif'],
    },
  },
  plugins: [],
}

