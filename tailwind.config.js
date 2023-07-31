/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins']
      },
      colors:{
        'primary': '#F29E08',
        'primary-hover': '#F4AD2D'
      }
    },
  },
  plugins: [
    require("daisyui"),
  ]
}

