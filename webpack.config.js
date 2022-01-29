var path = require('path');

module.exports = {
  entry: './resources/js/app.js',
  output: {
    path: path.resolve(__dirname, 'public'),
    filename: './js/bundle.js',
    libraryTarget: 'var',
    library: 'EntryPoint'
  },
  mode: 'production'
};
