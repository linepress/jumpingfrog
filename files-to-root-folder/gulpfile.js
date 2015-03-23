// Plugins
var gulp         = require('gulp'),
    requireDir   = require('require-dir');

// Variables
var root_path = '<path-to-theme>'; // bv. '/wp-content/themes/jumpingrog'
// Source paths
var scss_path       = root_path+'/assets/src/scss/**/*.scss',
    js_path         = root_path+'/assets/src/js/*.js',
    js_plugins_path = root_path+'/assets/src/js/plugins/*.js',
    js_admin_path   = root_path+'/assets/src/js/admin/*.js',
    img_path        = root_path+'/assets/src/img/*';

// Default task
gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'scripts', 'scripts-plugins', 'scripts-admin', 'images');
});

// Watch
gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch(scss_path, ['styles']);

  // Watch .js files
  gulp.watch(js_path, ['scripts']);
  gulp.watch(js_plugins_path, ['scripts-plugins']);
  gulp.watch(js_admin_path, ['scripts-admin']);

  // Watch image files
  gulp.watch(img_path, ['images']);
});


// Theme Tasks
requireDir('<path-to-theme>/gulp-tasks'); // bv. '/wp-content/themes/jumpingrog/gulp-tasks'