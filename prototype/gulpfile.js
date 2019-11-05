var gulp = require('gulp');
var plumber = require('gulp-plumber');
var fileInclude = require('gulp-file-include');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoPrefixer = require('gulp-autoprefixer');
//if node version is lower than v.0.1.2
require('es6-promise').polyfill();
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var imageMin = require('gulp-imagemin');
var webp = require("imagemin-webp");
var extReplace = require("gulp-ext-replace");
var cache = require('gulp-cache');
const browsersync = require('browser-sync').create();
/**
 * Log changes in console
 */
var log = function (event) {
    console.log('\n -- File ' + event.path + ' was ' + event.type + ' -->>>');
};
//src path
var src = {
    // root: 'src',
    // css: 'src/css',
    includes: 'src/includes',
    // scss: 'src/scss',
    // js: 'src/js',
    // sass: './sass',
    // img: 'src/img',
    // fonts: 'src/fonts',
    // html: 'build',
    // buildJs: './build/assets/js',
    // buildCss: './build/assets/css',
    // buildImg: './build/assets/img',
    // buildFonts: './build/assets/fonts',
    // portJs: '../build/themes/sative/assets/js',
    // portCss: '../build/themes/sative/assets/css',
    // portImg: '../build/themes/sative/assets/img',
    // portFonts: '../build/themes/sative/assets/fonts'
};

gulp.task('browsersync', function(callback) {
    browsersync.init({
      server: {
        baseDir: ['./dist']
      },
    });
    callback();
});
  
gulp.task('browsersyncReload', function(callback) {
    browsersync.reload();
    callback();
});

gulp.task('sass',function(){
    return gulp.src(['src/sass/**/*.scss'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass({
            includePaths: require('node-neat').includePaths
        }).on('error', sass.logError))
        .pipe(autoPrefixer())
        .pipe(cssComb())
        .pipe(cmq({log:true}))
        .pipe(concat('main.css'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCss())
        .pipe(gulp.dest('dist/css'))
        .pipe(gulp.dest('../build/wp-content/themes/sative/assets/css'))
        .pipe(browsersync.stream());
});
gulp.task('js',function(){
    return gulp.src(['src/js/**/*.js'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(concat('main.js'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
        .pipe(gulp.dest('../build/wp-content/themes/sative/assets/js'));
});
gulp.task('html',function(){
    return gulp.src(['src/**/*.html'])
        .pipe(fileInclude({
            prefix: '@@',
            basepath: src.includes
        }))
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(gulp.dest('dist/'))
});
gulp.task('image',function(){
    return gulp.src(['src/img/**/*'])
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(cache(imageMin({ optimizationLevel: 7, progressive: true, interlaced: true })))
        .pipe(gulp.dest('dist/img'))
        .pipe(gulp.dest('../build/wp-content/themes/sative/assets/img'));
});
gulp.task('exportWebP', function() {
    return gulp.src(['src/img/**/*'])
      .pipe(imageMin({ optimizationLevel: 7, progressive: true, interlaced: true },[
        webp({
          quality: 85
        })
      ]))
      .pipe(extReplace(".webp"))
      .pipe(gulp.dest('dist/img'))
      .pipe(gulp.dest('../build/wp-content/themes/sative/assets/img'));
});

gulp.task('watch', function() {
    gulp.watch('src/sass/**/*.scss', gulp.series('sass'));
    gulp.watch('src/js/**/*.js', gulp.series('js', 'browsersyncReload'));
    gulp.watch('src/**/*.html', gulp.series('html', 'browsersyncReload'));
    gulp.watch('src/img/**/*', gulp.series('image', 'browsersyncReload'));
    gulp.watch('src/img/**/*', gulp.series('exportWebP', 'browsersyncReload'));
  });

gulp.task('default', gulp.series(gulp.parallel('sass'), gulp.parallel('browsersync', 'watch')));

// gulp.task('default',function(){
//     gulp.series('browsersync');
//     gulp.watch('src/js/**/*.js',gulp.series('js', 'browsersyncReload')).once('change', log);
//     gulp.watch('src/sass/**/*.scss',gulp.series('sass', 'browsersyncReload')).once('change', log);
//     gulp.watch('src/**/*.html',gulp.series('html', 'browsersyncReload')).once('change', log);
//     gulp.watch('src/img/**/*',gulp.series('image')).once('change', log);
//     gulp.watch('src/img/**/*',gulp.series('exportWebP')).once('change', log);
// });
