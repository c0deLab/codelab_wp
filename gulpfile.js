var gulp = require('gulp'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('autoprefixer'),
    browserify = require('browserify'),
    uglify = require('gulp-uglify'),
    fs = require('fs'),
    gm = require('gm');

var _ = require('lodash'),
    browserify = require('browserify'),
    buffer = require('vinyl-buffer'),
    gutil = require('gulp-util'),
    source = require('vinyl-source-stream'),
    watchify = require('watchify'),
    babelify = require('babelify');

var paths = {
    cssIn: 'scss/**/*.scss',
    cssOut: 'css'
};

function screenshot() {
    var css = fs.readFileSync(__dirname + '/style.css', 'utf8'),
        version;
    // break into array of lines
    css = css.split('\n');
    // find the line that starts with "Version:"
    css.forEach(function(line) {
        if ( !!line.match(/Version: /) ) version = line.slice(9);
    });

    var screenshotBase = gm(__dirname + '/screenshot-base.png');
    screenshotBase
        .font(__dirname + '/fonts/Sanchez-Regular-webfont.ttf', 28)
        .drawText(20, 40, 'v' + version, 'NorthEast')
        .write(__dirname + '/screenshot.png', function(err) {
            if ( !err ) console.log('Generated screenshot.png');
        });
}

function css() {
    var processors = [
        autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3']
        })
    ];

    gulp.src( paths.cssIn )
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules/foundation-sites/scss'],
            outputStyle: 'compressed'
        }))
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest( paths.cssOut ));
}

function js() {

    function bundle(files) {
        files.forEach(function(file) {
            var opts = _.assign({}, watchify.args, {
                entries: file,
                debug: true
            }),
            bundler = browserify(opts).transform(babelify, { presets: ['es2015', 'react'] });

            bundler.bundle()
            // log errors if they happen
            .on( 'error', gutil.log.bind( gutil, 'Browserify Error' ) )
            .pipe( source( _.last(file.split('/')) ) )
            .pipe( buffer() )
            .pipe( sourcemaps.init({ loadMaps: true }) )
            .pipe( uglify() )
            .pipe( sourcemaps.write( './' ) )
            .pipe( gulp.dest( './js/min' ) );
        });
    }

    bundle('./js/src/script.js');
}

function watch() {
    gulp.watch('style.css', ['screenshot']);
    gulp.watch('scss/**/*.scss', ['css']);
    gulp.watch('js/src/**/*.js', ['js']);
}

gulp.task('screenshot', screenshot);
gulp.task('css', css);
gulp.task('js', js);
gulp.task('watch', ['css'], watch);
gulp.task('default', ['screenshot', 'css', 'watch']);
