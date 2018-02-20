// Require gulp and plugins
var gulp = require('gulp'),  
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    gutil = require('gulp-util'),
    babel = require('gulp-babel');


// Define file sources
var sassMain = ['dev/scss/master.scss'];  
var sassSources = ['dev/scss/**/*.scss']; // Any .scss file in any sub-directory  
var jsSources = ['dev/js/*.js']; // Any .js file in scripts directory


// Task to compile SASS files
gulp.task('sass', function() {  
    gulp.src(sassMain) // use sassMain file source
        .pipe(sass({
            outputStyle: 'compressed' // Style of compiled CSS
        })
        .on('error', gutil.log)) // Log descriptive errors to the terminal
        .pipe(gulp.dest('app/css')); // The destination for the compiled file
});


// Task to concatenate and uglify js files
gulp.task('concat', function() {  
    gulp.src(jsSources) // use jsSources
        // .pipe(concat('script.js')) // Concat to a file named 'script.js'
        .pipe(babel({
            presets: ['env']
        }))
        // .pipe(uglify()) // Uglify concatenated file
        .pipe(gulp.dest('app/js')); // The destination for the concatenated and uglified file
});


// Task to watch for changes in our file sources
gulp.task('watch', function() {  
	gulp.watch('*.html'); 
    gulp.watch(sassMain,['sass']); // If any changes in 'sassMain', perform 'sass' task
    gulp.watch(sassSources,['sass']); 
    gulp.watch(jsSources,['concat']); 
});


// Default gulp task
gulp.task('default', ['sass', 'concat', 'watch']);  