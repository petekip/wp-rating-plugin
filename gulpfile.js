/**
 * WP Plugin Rating · Show plugin rating in WordPress administration pages.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   eliasis-framework\wp-plugin-rating
 * @copyright 2017 - 2018 (c) Josantonius - WP Plugin Rating
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/wp-plugin-rating.git
 * @since     1.0.0
 */

var gulp         = require('gulp'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    sass         = require('gulp-sass'),
    plumber      = require('gulp-plumber'),
    rename       = require('gulp-rename'),
    cleanCSS     = require('gulp-clean-css'),
    notify       = require('gulp-notify'),
    sourcemaps   = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function () {

    var main   = 'public/sass/wp-plugin-rating.sass',
        source = 'public/css/source/',
        dest   = 'public/css/',

        sourcemapsOption = { 

            content: { 

                includeContent: false 
            }, 

            init: {

                loadMaps: true 
            } 
        },

        sassOptions = {

            errLogToConsole: true, 
            outputStyle:     'expanded' 
        },

        autoprefixerOptions = { 

            browsers: ['last 2 versions'], 
            cascade:  true 
        },

        notifyOptions = {

            message: 'Styles task complete'
        },

        cssOptions = {

            compatibility: 'ie8' 
        };

        renameOptions = {

            suffix: '.min'
        };

    gulp.src(main)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(sourcemaps.write(sourcemapsOption.content))
        .pipe(sourcemaps.init(sourcemapsOption.init))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(source))
        .pipe(rename(renameOptions))
        .pipe(cleanCSS(cssOptions))
        .pipe(gulp.dest(dest))
        .pipe(notify(notifyOptions));

});

gulp.task('watch', function () {

    var sassFiles = [
            'public/sass/wp-plugin-rating.sass'
        ];

    gulp.watch(sassFiles, ['css']);

});

gulp.task('default', ['css']);
