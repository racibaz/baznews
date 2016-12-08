var gulp        = require('gulp');
var sass        = require('gulp-sass');
var cssnano        = require('gulp-cssnano');
var browserSync = require('browser-sync').create();
var ts = require('gulp-typescript');

// Static Server + watching scss/html files
gulp.task('serve', function() {

    browserSync.init({
        server: "./"
    });

    gulp.watch('./css/*.*').on('change', browserSync.reload);
    gulp.watch('./sass/*.*',['styles']).on('change', browserSync.reload);
    gulp.watch('./type/*.*',['type']).on('change', browserSync.reload);
    gulp.watch('./*.*').on('change',browserSync.reload);
});

gulp.task('jquery',function () {
    gulp.src('www/lib/jquery/dist/*.js')
        .pipe(gulp.dest('js/jquery/'));
});

gulp.task('bootstrap',function () {
    gulp.src('node_modules/bootstrap/dist/*/*.*')
        .pipe(gulp.dest('js/bootstrap/'));
});

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano())
        .pipe(gulp.dest('./css/'))
});


gulp.task('type', function () {
    return gulp.src('type/**/*.ts')
        .pipe(ts({
            noImplicitAny: true,
            out: 'output.js'
        }))
        .pipe(gulp.dest('js/'));
});

gulp.task('default', ['serve','bootstrap','styles']);
