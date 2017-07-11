/**
 * Created by Midi Hipi on 7/10/2017.
 */
var gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    sass = require('gulp-sass');

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function () {

    browserSync.init({
        server: "./"
    });

    gulp.watch("src/scss/*.scss", ['sass']);
    gulp.watch("src/css/*.css").on('change', browserSync.reload);
});

// Compile scss into CSS & auto-inject into browsers
gulp.task('sass', function () {
    return gulp.src("src/scss/app.scss")
        .pipe(sass())
        .pipe(gulp.dest("src/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);