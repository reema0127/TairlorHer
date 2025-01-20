module.exports = {
  content: ['./App/**/*.php', './public/**/*.html'],
  theme: {
    extend: {
      colors: { 
        customPink: '#b17f7f',
        littlePink: '#f1c7c6',
        dullPink : '#915655'
      },
      fontFamily: {
        playlist: ['PlaylistScript', 'cursive'], // Add your custom font
      },
    },
  },
  plugins: [],
};
