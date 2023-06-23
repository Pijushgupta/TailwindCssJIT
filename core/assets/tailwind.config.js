/** @type {import('tailwindcss').Config} */ 
module.exports = { 
content: ['./pages/*.html', 
"C:\\Users\\pijus\\Local Sites\\tailwind\\app\\public/wp-content/themes/twentytwentythree/**/*.{php,js,jsx,vue}", 
"C:\\Users\\pijus\\Local Sites\\tailwind\\app\\public/wp-content/themes/twentytwentythree/*.{php,js,jsx,vue}"
],
theme: { extend: {}, }, 
plugins: [require('@tailwindcss/typography'),require('@tailwindcss/forms')],
}