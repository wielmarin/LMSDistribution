/* - Save this file as gulpfile.js in directory (eg /wordpress/)
- Open gitbash and enter 'cd *directory*
- Install node on computer (waarschijnlijk al gedaan)
- Gitbash enter 'npm init --y' & accept alles
- Enter 'npm install gulp --g'
- Enter 'npm install gulp gulp-watch gulp-sass browser-sync gulp-plumber gulp-autoprefixer --save-dev (duurt wel even)
- Fill in details below (waarschijnlijk nodig _sass folder maken voor scss files in root)
- Enter 'gulp'
(Als het niet lukt, probeer 'style.css' verwijderen en probeer gulp nog eens)

*/

var gulp = require('gulp'),
watch = require('gulp-watch'),
sass = require('gulp-sass'),
plumber = require('gulp-plumber'),
autoprefixer = require('gulp-autoprefixer'),
browserSync = require('browser-sync').create();



gulp.task('browser-sync', function() {
    var files = [
   	 './style.css',
   	 './*.php'
    ];
    // Initialise BrowserSync
    
    browserSync.init(files, {
   	 injectChanges: true,
   	 proxy: 'http://localhost/lms/',
	 tunnel: "test-lmswebstef",
    });
});

gulp.task('sass', function () {
    return gulp.src('_sass/*.scss')
    .pipe(plumber({
   	 errorHandler: function(err) {
   	 // display the error message
   	 console.log(err);
   	 // end the errored task
   	 this.emit('end') }
    }))
    .pipe(sass({
   	 'outputStyle': 'compressed'
    }))
    .pipe(autoprefixer({
    	browsers: ['last 2 versions'],
    	cascade: false
	}))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream({match: '**/*.css'}));
})

gulp.task('default', ['sass', 'browser-sync'], function() {
    gulp.watch('./_sass/**/*.scss', ['sass'])
});
