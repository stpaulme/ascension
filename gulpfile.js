var gulp    = require('gulp');
var sass    = require('gulp-sass');
var concat  = require('gulp-concat');

var paths = {
    styles: {
        // Where are the sass files?
        src: 'static/sass/*.scss',
        // Where should the compiled file go?
        dest: 'static/css'
    }
}

function style(){
    return gulp.src(paths.styles.src)

        // Use sass with the files found
        // Compress
        // Log any errors
        .pipe(sass({outputStyle: 'compressed'})).on('error', sass.logError)

        // Concatenate the files
        .pipe(concat('spm.css'))

        .pipe(gulp.dest(paths.styles.dest))
}

// Lets you use $ gulp style
exports.style = style

function watch(){
    gulp.watch(paths.styles.src, style)
}

// Lets you use $ gulp watch
exports.watch = watch