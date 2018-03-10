var gulp   = require('gulp'),
    rimraf = require('rimraf'),
    config = require('../config');

/*
 *
 * Remove dest
 *
 */

gulp.task('clean', function(cb) {
    rimraf(config.clean.development.dest, cb);
});