/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./storage/framework/views/*.php",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        outfit: ['Outfit', 'sans-serif'],
        jost: ['Jost', 'sans-serif'],
      },
      colors: {
        beige: '#F5F5DC',
        linen: '#FAF0E6',
      },
    },
  },
  plugins: [
    require('daisyui'),
    require('flowbite/plugin')
  ],
}