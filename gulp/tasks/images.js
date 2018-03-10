var gulp        = require('gulp'),
    browsersync = require('browser-sync'),
    imagemin    = require('gulp-imagemin'),
    pngquant    = require('imagemin-pngquant'),
    svgSprite   = require("gulp-svg-sprites"),
    newer       = require('gulp-newer'),
    ifElse      = require('gulp-if-else'),
    config      = require('../config');

config.imagemin.use = [pngquant()];

/*
 *
 * Build images
 *
 */

gulp.task('images', config.wrapPipe(function(success, error) {
    browsersync.notify('Compiling images...');

    return gulp.src(config.images.src)
        .pipe(
            ifElse(
                !newer(config.images.dest),
                function() {
                    return imagemin(config.imagemin).on('error', error)
                }
            )
        )
        .pipe(gulp.dest(config.images.development.dest))
}));

gulp.task('sprites', function () {
    return gulp.src(config.svg.sprites)
        .pipe(
            svgSprite({
                preview: false,
                svgId: 'icon-%f',
                mode: 'symbols',
                svg: {
                    symbols: 'icons.svg'
                },
                templates: {
                    scss: true
                }
            })
        )
        .pipe(gulp.dest(config.svg.dest));
});