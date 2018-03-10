var gulp = require('gulp'),
	config 	= require('../config');


gulp.task('css', [
    'minify-css'
]);

gulp.task("minify-css", function(){
	return gulp.src(config.css.srcApp)
    	.pipe(gulp.dest(config.css.development.dest));
})


