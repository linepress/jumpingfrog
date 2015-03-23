// Plugins
var gulp   = require('gulp'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat');

// Variables
var root_path = '<path-to-theme>'; // bv. '/wp-content/themes/jumpingrog'
// Source paths
var jshint_path     = root_path+'/assets/src/js/.jshintrc';
var js_path         = root_path+'/assets/src/js/*.js';
var js_plugins_path = root_path+'/assets/src/js/plugins/*.js';
var js_admin_path   = root_path+'/assets/src/js/admin/*.js';
// Dist paths
var js_dist_path    = root_path+'/assets/dist/js';

// Scripts
gulp.task('scripts', function() {
  return gulp.src(js_path)
    .pipe(jshint(jshint_path))
    .pipe(jshint.reporter('default'))
    .pipe(concat('script.js'))
    .pipe(gulp.dest(js_dist_path))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(js_dist_path));
});

gulp.task('scripts-plugins', function() {
  return gulp.src(js_plugins_path)
    .pipe(jshint.reporter('default'))
    .pipe(concat('script-plugins.js'))
    .pipe(gulp.dest(js_dist_path))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(js_dist_path));
});

gulp.task('scripts-admin', function() {
  return gulp.src(js_plugins_path)
    .pipe(jshint.reporter('default'))
    .pipe(concat('script-admin.js'))
    .pipe(gulp.dest(js_dist_path))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(js_dist_path));
});