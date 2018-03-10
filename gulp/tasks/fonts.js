var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    config      = require('../config');

/*
 *
 * Build fonts
 *
 */

gulp.task('fonts', function() {
    browsersync.notify('Compiling fonts...');

    gulp.src(config.fonts.src)
        .pipe(gulp.dest(config.fonts.development.dest))
});
