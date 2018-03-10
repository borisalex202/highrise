var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    postcss     = require('gulp-postcss'),
    svg         = require('postcss-svg'),
    prefixer    = require('gulp-autoprefixer'),
    cssmin      = require('gulp-minify-css'),
    sass        = require('gulp-sass'),
    ifElse      = require('gulp-if-else'),
    config      = require('../config');

/*
 *
 * Build scss width minify
 *
 */

gulp.task('sass', [
    'sass-internal',
    'sass-external'
]);

gulp.task('sass-internal', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling sass...');

    return gulp.src(config.sass.srcInternal)
        .pipe(sass(config.sass.options).on('error', error))
        .pipe(prefixer(config.autoprefixer))
        .pipe(
            ifElse(
                config.permission.minify.css,
                function() {
                    return cssmin()
                }
            )
        )
        .pipe(gulp.dest(config.sass.development.dest))
}));
gulp.task('sass-external', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling sass...');

    return gulp.src(config.sass.srcExternal)
        .pipe(sass(config.sass.options).on('error', error))
        .pipe(
            ifElse(
                config.permission.minify.css,
                function() {
                    return cssmin()
                }
            )
        )
        .pipe(gulp.dest(config.sass.development.dest))
}));
