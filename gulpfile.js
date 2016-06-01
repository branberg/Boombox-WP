var gulp = require('gulp');
var runSequence = require('run-sequence');
var del = require('del');
var replace = require('gulp-replace');
var bump = require('gulp-bump');
var zip = require('gulp-zip');
var fs = require('fs');

// Tasks to bump version number
gulp.task('bump-package', function(){
  gulp.src('./package.json')
    .pipe(bump())
    .pipe(gulp.dest('./'));
});

gulp.task('bump-style', function(){
  var config = JSON.parse(fs.readFileSync('./package.json', 'utf-8'));
  gulp.src(['./theme/style.css'])
    .pipe(replace(/(Version: )(.{5})/g, 'Version: ' + config.version))
    .pipe(gulp.dest('./theme/'));
});

// Tasks to create a .zip theme release
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
  var config = JSON.parse(fs.readFileSync('./package.json', 'utf-8'));
  return gulp.src('dist/**/*')
    .pipe(zip('boombox-v' + config.version + '.zip'))
    .pipe(gulp.dest('dist'));
});

gulp.task('post-clean', function(){
  return del(['dist/**/*', '!dist/*.zip'])
});

// Sequences
gulp.task('bump', function(callback){
  runSequence('bump-package', 'bump-style');
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
