var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var imagemin    = require('gulp-imagemin');
var pngquant    = require('imagemin-pngquant');

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

	browserSync.init({
		proxy: "http://localhost"
	});

	gulp.watch("scss/**/*.scss", ['sass']);
	gulp.watch("js/*.js").on('change', browserSync.reload);
	gulp.watch("*.php").on('change', browserSync.reload);
	gulp.watch("**/*.php").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
	return gulp.src("scss/**/*.scss")
		.pipe(sass())
		.pipe(gulp.dest("./css"))
		.pipe(browserSync.stream());
});

// Compress images
gulp.task('img', function () {
	return gulp.src('./images/**/*')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe(gulp.dest('./images_compressed'));
});

gulp.task('default', ['serve', 'img']);