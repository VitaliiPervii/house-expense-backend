const path = require('path');

module.exports = {

    context: path.resolve(__dirname, 'assets'),

    entry: './js/app.js',

    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public/build/js')
    },

    watch: false
};