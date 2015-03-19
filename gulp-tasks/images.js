// Plugins
var gulp     = require('gulp'),
    imagemin = require('gulp-imagemin'),
    cache    = require('gulp-cache');

// Variables
var root_path = '<path-to-theme>'; // bv. '/wp-content/themes/jumpingrog'
var imageOptimizationSettings = {
  optimizationLevel: 3,
  progressive: true,
  interlaced: true
};
// Source paths
var img_path      = root_path+'/assets/src/img/*';
// Dist paths
var img_dist_path = root_path+'/assets/dist/img';

// Images
gulp.task('images', function() {
  return gulp.src(img_path)
    .pipe(cache(imagemin(imageOptimizationSettings))
    .pipe(gulp.dest(img_dist_path));
});