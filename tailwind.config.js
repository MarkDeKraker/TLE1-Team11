/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins' : ['poppins', 'sans-serif'],
        'ranchers': ['ranchers', 'sans-serif']
      }
    },
  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.shadow-md-top': {
          '--tw-shadow': '0px -4px 15px 0px rgba(0, 0, 0, 0.15)',
          'box-shadow': 'var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)',
        },
      };




      addUtilities(newUtilities, ['before', 'after']);
    },
  ],
};


