var concat  = require('gulp-concat');
var gulp    = require('gulp');
var sass    = require('gulp-sass');


var paths = {
    styles: {
        // Where are the SCSS files?
        src: 'src/scss/*.scss',
        // Where should the compiled file go?
        dest: 'src/css'
    },
    js: {
        // Where are the JS files?
        src: [
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/popper.js/dist/popper.min.js',
        ],
        // Where should the JS files go?
        dest: 'src/js'
    }
}

function style() {
    return gulp.src(paths.styles.src)

        // Use sass with the files found
        // Compress
        // Log any errors
        .pipe(sass({outputStyle: 'compressed'})).on('error', sass.logError)

        // Concatenate the files
        .pipe(concat('spm.css'))

        .pipe(gulp.dest(paths.styles.dest))
}

exports.style = style

function js() {
    return gulp.src(paths.js.src)
    
        .pipe(gulp.dest(paths.js.dest))
}

exports.js = js

function watch() {
    gulp.watch(paths.styles.src, style)
}

exports.watch = watch

// Until I figure out how to set a default task...
function go() {
    style()
    js()
    watch()
}

exports.go = go