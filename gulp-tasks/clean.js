// Plugins
var gulp = require('gulp'),
    del  = require('del');

// Variables
var root_path = '<path-to-theme>'; // bv. '/wp-content/themes/jumpingrog'
// Dist paths
var css_dist_path = root_path+'/assets/dist/css';
var js_dist_path  = root_path+'/assets/dist/js';
var img_dist_path = root_path+'/assets/dist/img';

// Clean
gulp.task('clean', function(cb) {
  del([css_dist_path, js_dist_path, img_dist_path], cb)
});