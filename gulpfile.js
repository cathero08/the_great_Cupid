const {
    src,
    dest,
    series,
    parallel,
    watch
} = require('gulp');

// 第一個任務 console 
function tasks(cb){
  console.log('gulp 第一個任務');
  cb();
}

exports.do = tasks;

//第二個任務 搬家
function move(){
   return src('style.css').pipe(dest('css/'));
}

exports.copy = move; 


// sass編譯
const sass = require('gulp-sass')(require('sass'));
function sassstyle(){
   return src('src/sass/*.scss') // 來源路徑
   .pipe(sass().on('error', sass.logError))
   .pipe(dest('dist/css/')) // 目的地路徑
}

exports.style =sassstyle;

// html template

const fileinclude = require('gulp-file-include');

function html(){
   return src('src/*.html') // 來源路徑
   .pipe(fileinclude({
    prefix: '@@',
    basepath: '@file'
     }))
   .pipe(dest('./dist')); // 目的地路徑
}

exports.template = html;

// js uglify

const uglify = require('gulp-uglify');

function jsmini(){
   return src('src/js/*.js')
   .pipe(uglify())
   .pipe(dest('dist/js'))
}

exports.js =jsmini;

//壓縮圖片

const imagemin = require('gulp-imagemin');

function min_images(){
    return src('src/images/*.*')
    .pipe(imagemin([
        imagemin.mozjpeg({quality: 30, progressive: true}) // 壓縮品質      quality越低 -> 壓縮越大 -> 品質越差 
    ]))
    .pipe(dest('dist/images'))
}

exports.img = min_images;


function img_copy(){
  return src('src/images/*.*').pipe(dest('dist/images'))
}








// watch
function watchall(){
   watch(['src/*.html' , 'src/layout/*.html'] , html);
   watch(['src/sass/*.scss' , 'src/sass/**/*.scss'] , sassstyle)
   watch('src/js/*.js' , jsmini)
}

exports.w = watchall;





const browserSync = require('browser-sync');
const reload = browserSync.reload;


function browser(done) {
    browserSync.init({
        server: {
            baseDir: "./dist",
            index: "index.html"
        },
        port: 3000
    });
     watch(['src/*.html' , 'src/layout/*.html'] , html).on('change' , reload);
     watch(['src/sass/*.scss' , 'src/sass/**/*.scss'] , sassstyle).on('change' , reload);
     watch('src/js/*.js' , jsmini).on('change' , reload);
     done();
}

exports.default = series(browser , img_copy) ;


