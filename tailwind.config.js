/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        playfair: ['Playfair Display', 'serif'],
        montserrat: ['Montserrat', 'sans-serif']
      },
      colors: {
        'green': {
          100: '#007965',
          200: '#027360'
        },
        'yellow': {
          100: '#FDC815',
          200: '#E7BA34'
        },
        'white': {
          100: '#FFFFFF',
          200: '#f8f6f4'
        },
        'black': {
          100: '#3c4043',
          200: '#262626'
        }
      }
    },
  },
  plugins: [],
}
