import gulp from 'gulp';
import autoprefixer from 'gulp-autoprefixer';
import browserSync from 'browser-sync';
import { deleteAsync as clean } from 'del';
import concat from 'gulp-concat';
import eslint from 'gulp-eslint';
import filter from 'gulp-filter';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
// const gcmq from 'gulp-group-css-media-queries';
import plumber from 'gulp-plumber';
import rename from 'gulp-rename';
import replace from 'gulp-replace';
import terser from 'gulp-terser';
import uglifycss from 'gulp-uglifycss';
import svgSprites from 'gulp-svg-sprite';

const sass = gulpSass(dartSass);
browserSync.create();

gulp.task('set-path', async () => {
	if (process.env.NODE_ENV === 'production') {
		return process.env.url = '/app/themes/flowhunt/assets';
	}
	return process.env.url = '/app/themes/flowhunt-theme/assets';
});

gulp.task('browser-reload', (done) => {
	browserSync.reload();
	done();
});

gulp.task('clean-dist', () =>
	clean(
		[
			'./assets/dist/**/*',
		],
		{ force: true }
	)
);

gulp.task('browser-sync', () => {
	browserSync.init(
		['**/*.html', '**/*.php', '**/*.{png,jpg,jpeg,gif,svg}'],
		{
			proxy: 'http://flowhunt.local',
			port: 3000,
			open: false,
			notify: false,
			injectChanges: true,
		}
	);

	gulp.watch('./assets/styles/**/*.scss', gulp.series('styles'));
	gulp.watch('./assets/scripts/app/**/*.js', gulp.series('app-js'));
	gulp.watch('./assets/scripts/custom/**/*.js', gulp.series('custom-js'));
	gulp.watch(
		'./assets/images/icons-common/*.svg',
		gulp.series('iconsSprite')
	);
});

const iconsConfig = {
	shape: {
		id: {
			separator: '/',
			generator: (name) => {
				const renamed = name.replace('/', '-').replace('.svg', '');
				return renamed;
			},
		},
	},
	svg: {
		xmlDeclaration: false,
	},
	mode: {
		symbol: {
			dest: '.',
			sprite: 'icons.svg',
			prefix: '%s',
			dimensions: '',
			inline: false,
			rootviewbox: false,
		},
	},
};

gulp.task('iconsSprite', () => gulp
	.src([
		'./vendor/qualityunit/wordpress-icons/icons/common/**/*.svg',
		'./vendor/qualityunit/wordpress-icons/icons/urlslab/**/*.svg',
	])
	.pipe(svgSprites(iconsConfig))
	.pipe(gulp.dest('./assets/images')));

gulp.task('styles', () =>
	gulp
		.src('./assets/styles/**/*.scss')
		.pipe(plumber())
		.pipe(
			sass({
				errLogToConsole: true,
				outputStyle: 'expanded',
				precision: 10,
			})
		)
		.pipe(autoprefixer('last 3 version', 'android 4', 'ie 11'))
		.pipe(plumber.stop())
		.pipe(replace(/(url\().+?(images|webfonts)/g, `$1${process.env.url}/$2`))
		.pipe(gulp.dest('./assets/dist/'))
		.pipe(filter('**/*.css'))
		// .pipe( gcmq() )
		.pipe(browserSync.reload({ stream: true }))
		.pipe(rename({ suffix: '.min' }))
		.pipe(uglifycss())
		.pipe(gulp.dest('./assets/dist'))
		.pipe(browserSync.reload({ stream: true }))
);

gulp.task('app-js', () =>
	gulp
		.src('./assets/scripts/app/**/*.js')
		.pipe(concat('app.js'))
		.pipe(gulp.dest('./assets/dist'))
		.pipe(
			rename({
				basename: 'app',
				suffix: '.min',
			})
		)
		.pipe(terser())
		.pipe(gulp.dest('./assets/dist/'))
		.pipe(browserSync.reload({ stream: true }))
);

gulp.task('custom-js', () =>
	gulp
		.src('./assets/scripts/custom/**/*.js')
		.pipe(gulp.dest('./assets/dist'))
		.pipe(
			rename((path) => {
				// eslint-disable-next-line no-param-reassign
				path.basename += '.min';
			})
		)
		.pipe(terser())
		.pipe(gulp.dest('./assets/dist/'))
		.pipe(browserSync.reload({ stream: true }))
);


gulp.task('vendor-js', () =>
	gulp
		.src('./assets/scripts/vendor/**/*.js')
		.pipe(gulp.dest('./assets/dist'))
		.pipe(
			rename((path) => {
				// eslint-disable-next-line no-param-reassign
				path.basename += '.min';
			})
		)
		.pipe(terser())
		.pipe(gulp.dest('./assets/dist/'))
		.pipe(browserSync.reload({ stream: true }))
);

gulp.task('eslint', () =>
	gulp
		.src(['gulpfile.js', 'assets/scripts/**/*.js'])
		.pipe(eslint())
		.pipe(eslint.format())
		.pipe(eslint.failAfterError())
);

gulp.task(
	'build',
	gulp.series(
		'set-path',
		'clean-dist',
		'iconsSprite',
		'styles',
		'vendor-js',
		'app-js',
		'custom-js',
	)
);

gulp.task(
	'default',
	gulp.series(
		'set-path',
		'clean-dist',
		'iconsSprite',
		'styles',
		'vendor-js',
		'app-js',
		'custom-js',
		'browser-sync'
	)
);
