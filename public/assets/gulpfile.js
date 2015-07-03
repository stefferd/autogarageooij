/**
 * Created by stefvandenberg on 20/11/14.
 */

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var del = require('del');

var paths = {
    scripts: ['js/**/*.js'],
    images: ['img/**/*'],
    sass: ['sass/**/*.scss'],
    css: ['sass/**/*.scss'],
    output: ['build/']
};

gulp.task('default', ['watch', 'copy']);

gulp.task('sass', function() {
   gulp.src(paths.sass).pipe(sass()).pipe(gulp.dest('build/css'));
   gulp.src('bower_components/foundation/scss/**/*.scss').pipe(sass()).pipe(gulp.dest('build/css/library/foundation'));
});

gulp.task('scripts', function() {
    // Minify and copy all JavaScript (except vendor scripts)
    // with sourcemaps all the way down
    return gulp.src(paths.scripts)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('build/js'));
});

// Copy all static images
gulp.task('images', function() {
    return gulp.src(paths.images)
        // Pass in options to the task
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('build/img'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch([paths.sass, 'bower_components/foundation/scss/**/*.scss'], ['sass']);
});

gulp.task('copy', function() {
    gulp.src(paths.images)
        .pipe(gulp.dest('build/img'));
    gulp.src('bower_components/fastclick/lib/fastclick.js')
        .pipe(gulp.dest('build/js/library/fastclick'));
    gulp.src('bower_components/modernizr/modernizr.js')
        .pipe(gulp.dest('build/js/library/modernizr'));
    gulp.src('bower_components/foundation/js/foundation.min.js')
        .pipe(gulp.dest('build/js/library/foundation'))
});