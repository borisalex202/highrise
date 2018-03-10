var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    fileinclude = require('gulp-file-include'),
    uglify      = require('gulp-uglify'),
    sourcemaps  = require('gulp-sourcemaps'),
    ifElse      = require('gulp-if-else'),
    config      = require('../config');

/*
 *
 * Build js with minify
 *
 */

gulp.task('js', [
    'js-internal',
    'js-external',
    'js-all'
]);

gulp.task('js-all', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling js...');

    return gulp.src(config.js.srcAll)
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file',
            indent: true
        }).on('error', error))
        .pipe(
            ifElse(
                config.permission.minify.js,
                function() {
                    return uglify()
                }
            )
        )
        .pipe(gulp.dest(config.js.development.dest))
}));

gulp.task('js-internal', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling js...');

    return gulp.src(config.js.srcInternal)
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file',
            indent: true
        }).on('error', error))
        .pipe(
            ifElse(
                config.permission.minify.js,
                function() {
                    return uglify()
                }
            )
        )
        .pipe(gulp.dest(config.js.development.dest))
}));

gulp.task('js-external', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling js...');

    gulp.src(config.js.srcJquery)
        .pipe(gulp.dest(config.js.development.destJquery));

    gulp.src(config.js.srcHtml5shiv)
        .pipe(gulp.dest(config.js.development.destHtml5shiv));

    return gulp.src(config.js.srcExternal)
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file',
            indent: true
        }).on('error', error))
        .pipe(
            ifElse(
                config.permission.minify.js,
                function() {
                    return uglify()
                }
            )
        )
        .pipe(gulp.dest(config.js.development.dest))
}));
