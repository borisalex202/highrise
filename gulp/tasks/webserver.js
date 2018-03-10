var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    config      = require('../config');

/*
 * Запуск вебсервера BrowserSync
 */

gulp.task('webserver', function() {
    browsersync(config.browsersync);
});
