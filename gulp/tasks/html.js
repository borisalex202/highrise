var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    fileinclude = require('gulp-file-include'),
    htmlmin     = require('gulp-htmlmin'),
    ifElse      = require('gulp-if-else'),
    config      = require('../config');

/*
 *
 * Build html with minify
 *
 */

gulp.task('html', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling html...');

    return gulp.src(config.html.src)
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file',
            indent: true
        }).on('error', error))
        .pipe(
            ifElse(
                config.permission.minify.html,
                function() {
                    return htmlmin({collapseWhitespace: true})
                }
            )
        )
        .pipe(gulp.dest(config.html.dest))
}));