const path = require( 'path' );

module.exports = {
        entry: './assets/js/src/canvas/canvas.js',
        output: {
            filename: 'canvas.min.js',
            path: path.resolve( __dirname, 'assets/js/dist' )
        }
}
