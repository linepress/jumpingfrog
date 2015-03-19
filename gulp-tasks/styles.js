// Plugins
var gulp         = require('gulp'),
    sass         = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss    = require('gulp-minify-css'),
    rename       = require('gulp-rename');

// Variables
var root_path = '<path-to-theme>'; // bv. '/wp-content/themes/jumpingrog'
var autoprefixerSettings = {
  browsers: ['> 5%', 'last 2 versions' ],
  cascade: false
};
// Source paths
var scss_path            = root_path+'/assets/src/scss/**/*.scss';
var scss_file_path       = root_path+'/assets/src/scss/style.scss';
var scss_file_font_path  = root_path+'/assets/src/scss/style-font.scss';
var scss_file_admin_path = root_path+'/assets/src/scss/style-admin.scss';
// Dist paths
var css_dist_path        = root_path+'/assets/dist/css';

// Styles
gulp.task('styles', function() {
  return gulp.src([scss_file_path, scss_file_font_path, scss_file_admin_path])
    .pipe(sass({ loadPath: root_path, style: 'expanded', sourcemap: false, container: 'child-styles' }))
    .pipe(autoprefixer(autoprefixerSettings))
    .pipe(gulp.dest(css_dist_path))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(gulp.dest(css_dist_path));
});