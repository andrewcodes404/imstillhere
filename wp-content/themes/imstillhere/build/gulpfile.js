const { src, dest, parallel, series, watch } = require('gulp');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
const postcss = require('gulp-postcss')
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');

//.js
function jsFn(cb) {
  return src('../assets/src/js/main.js')
    //babel needs the preset object or it won't work
    .pipe(babel({
      plugins: ['@babel/transform-runtime'],
      presets: ['@babel/preset-env']
    }))
    // The gulp-uglify plugin won't update the filename
    .pipe(uglify())
    // So use gulp-rename to change the extension
    .pipe(rename({ extname: '.min.js' }))
    .pipe(dest('../assets/dist'))
    .pipe(browserSync.stream());
}

// .scss
function sassFn(cb) {
  //1.where is my scss
  return src('../assets/src/sass/main.scss') //gets all files ending with .scss in src/scss
    //2. pass that file through sass compiler
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([
      autoprefixer(),
      cssnano()
    ]))
    //3. rename
    .pipe(rename({ extname: '.min.css' }))
    //4. where do I save the compiled css file
    .pipe(dest('../assets/dist'))
    //5. stream change to all browsers
    .pipe(browserSync.stream());
}


// .scss
// function gutenburgFn(cb) {
//   //1.where is my scss
//   return src('../sass/gutenburg.scss') //gets all files ending with .scss in src/scss
//     //2. pass that file through sass compiler
//     .pipe(sass().on('error', sass.logError))
//     .pipe(postcss([
//       autoprefixer(),
//       cssnano()
//     ]))
//     //3. rename
//     .pipe(rename({ extname: '.min.css' }))
//     //4. where do I save the compiled css file
//     .pipe(dest('../style'))
// }




//blocks
// function blocksFn(cb) {
//   //1.where is my scss
//   return src('../blocks/**/*.scss') //gets all files ending with .scss in src/scss
//     //2. pass that file through sass compiler
//     .pipe(sass().on('error', sass.logError))
//     //3. autoprefix and minimise
//     .pipe(postcss([
//       autoprefixer(),
//       cssnano()
//     ]))
//     //4. rename
//     .pipe(rename({ extname: '.min.css' }))
//     //5. where do I save the compiled css file
//     .pipe(dest(function (file) {
//       return file.base;
//     }))
//     //6. stream change to all browsers
//     .pipe(browserSync.stream());
// }


// default function
function serve() {
  browserSync.init({
    proxy: "https://im-still-here.local/",
    notify: false,
    port: 8000,
    ui: {
      port: 8001
    },

  });

  // .php
  watch('../**/*.php').on('change', browserSync.reload);
  // blocks
  // watch("../blocks/**/*.scss", blocksFn)
  // ./sass/*.scss
  watch('../assets/src/sass/**/*.scss', sassFn)

  // ./js/main.js
  watch('../assets/src/js/main.js', jsFn)

}

// Set the  default gulp function(s)
exports.default = function () {
  serve()
};

// exports.gutenburg = function () {
//   return gutenburgFn()
// }

exports.sass = function () {
  return sassFn()
}

