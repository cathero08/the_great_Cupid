const {
    src,
    dest,
    series,
    parallel,
    watch
} = require('gulp');

const autoprefixer = require('gulp-autoprefixer');

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
   .pipe(autoprefixer({
    cascade: false
    }))
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
  return src('src/images/**/*.*').pipe(dest('dist/images'))
}
exports.imgmove = img_copy;








// watch
function watchall(){
   watch(['src/*.html' , 'src/layout/*.html'] , html);
   watch(['src/sass/*.scss' , 'src/sass/**/*.scss'] , sassstyle);
   watch('src/js/*.js' , jsmini);
   watch('src/API/*.php' , move_php);
}

exports.w = watchall;





const browserSync = require('browser-sync');
const reload = browserSync.reload;


function browser(done) {
    browserSync.init({
        server: {
            baseDir: "./dist",
            index: "homepage.html"
        },
        port: 3000
    });
     watch(['src/*.html' , 'src/layout/*.html'] , html).on('change' , reload);
     watch(['src/sass/*.scss' , 'src/sass/**/*.scss'] , sassstyle).on('change' , reload);
     watch(['src/js/*.js'] , jsmini).on('change' , reload);
     watch(['src/API/*.php'] , move_php).on('change' , reload);
     done();
}

exports.default = series(browser , img_copy) ;



// =====================================================
// const babel = require('gulp-babel');

// function babel5() {
//     return src('dev/js/*.js')
//         .pipe(babel({
//             presets: ['@babel/env']
//         }))         // ==================ES6轉ES5
//         .pipe(dest('js'));
// }

var concat = require('gulp-concat');

function concatcss(){
    return src('./dist/css/*.css')
    .pipe(concat('all.css'))
    .pipe(dest('dist/css/all/'))
}                    //整何css到all============

exports.all  = concatcss;


const clean = require('gulp-clean');

function clear() {
  return src('dist' ,{ read: false ,allowEmpty: true })//不去讀檔案結構，增加刪除效率  / allowEmpty : 允許刪除空的檔案
  .pipe(clean({force: true})); //強制刪除檔案 
}      //刪檔案

exports.cleardist  = clear;



exports.packages = series(clear , parallel(sassstyle , html , jsmini, move_php) , img_copy ) ;
//   ===============全部整個打包套裝



// php 搬家

function move_php(){
  return src('./src/API/*.php').pipe(dest("dist/API"));
}

exports.movephp = move_php; 
