/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./pages/*.html",
  ],
  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/typography'),require('@tailwindcss/forms')],
}

