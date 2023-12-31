const gulp = require( 'gulp' ),
	clean = require( 'gulp-clean' ),
	concatCss = require( 'gulp-concat-css' ),
	postcss = require( 'gulp-postcss' ),
	rename = require( 'gulp-rename' ),
	cssnano = require( 'cssnano' );

gulp.task( 'watch', function () {
	gulp.watch( [ 'assets/css/**/*.css' ] ).on(
		'change',
		gulp.series(
			'clean-shared',
			'clean-blocks',
			'minify-shared',
			'minify-blocks'
		)
	);
} );

gulp.task( 'clean-shared', function () {
	return gulp
		.src( 'assets/css/style-shared.min.css', {
			read: false,
			allowEmpty: true,
		} )
		.pipe( clean() );
} );

gulp.task( 'clean-blocks', function () {
	return gulp
		.src( 'assets/css/blocks/*.min.css', {
			read: false,
			allowEmpty: true,
		} )
		.pipe( clean() );
} );

gulp.task( 'minify-shared', function () {
	return gulp
		.src( 'assets/css/*.css' )
		.pipe( concatCss( 'style-shared.min.css' ) )
		.pipe( postcss( cssnano() ) )
		.pipe( gulp.dest( 'assets/css/' ) );
} );

gulp.task( 'minify-blocks', function () {
	return gulp
		.src( 'assets/css/blocks/*.css' )
		.pipe( postcss( cssnano() ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( 'assets/css/blocks' ) );
} );

gulp.task(
	'default',
	gulp.series(
		'clean-shared',
		'clean-blocks',
		'minify-shared',
		'minify-blocks'
	)
);
