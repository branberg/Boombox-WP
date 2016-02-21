var gulp = require('gulp');
var runSequence = require('run-sequence');
var del = require('del');
var zip = require('gulp-zip');
var p = require('./package.json');

gulp.task('wipe', function(){
  return del('dist/**/*')
});

gulp.task('copy', function(){
  return gulp.src('theme/**/*')
    .pipe(gulp.dest('dist'))
});

gulp.task('pre-clean', function(){
  return del('dist/config.codekit')
});

gulp.task('zip', function() {
  return gulp.src('dist/**/*')
    .pipe(zip('boombox-v' + p.version + '.zip'))
    .pipe(gulp.dest('dist'));
});

gulp.task('post-clean', function(){
  return del(['dist/**/*', '!dist/*.zip'])
});

gulp.task('release', function(callback){
  runSequence('wipe', 'copy', 'pre-clean', 'zip', 'post-clean');
});

/*

Steps required:

1. Clean out current dist directory
2. Copy "theme" to dist
3. Remove codekit crap
4. Zip it up (naming it with version number)
5. Remove folder and keep only zip

1. Copy theme dir to work on
2. Clean things up
  a. Remove .codekit crap (.config.codekit & .codekit-cache)
3. Pull version number from style.css
4. zip folder, name boombox-vX.X.X
5. Push to Github?

*/
