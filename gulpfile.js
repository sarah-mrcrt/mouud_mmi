/* gulpfile.js
	Fichier de config de Gulp
	Task Runner => lanceur de taches
 */
// on choppe la lib gulp
var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("autoprefixer");
var postcss = require("gulp-postcss");
var cleanCSS = require("gulp-clean-css");
var pxtorem = require("gulp-pxtorem");
var flexbug_fixes = require("postcss-flexbugs-fixes");
var browserSync = require("browser-sync").create();
var sourcemaps = require("gulp-sourcemaps");
var gulpWebpack = require("webpack-stream");

//on ecrit une tache
gulp.task("hello", function(done) {
  console.log("Hello from Gulp !");
  done();
});

gulp.task("sass", function(done) {
  return gulp
    .src("./assets/scss/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(
      pxtorem({
        rootValue: 16,
        unitPrecision: 5,
        propList: ["*"],
        selectorBlackList: [],
        replace: true,
        mediaQuery: false,
        minPixelValue: 0
      })
    )
    .pipe(
      postcss([
        flexbug_fixes,
        autoprefixer({
          grid: "autoplace"
        })
      ])
    )
    .pipe(cleanCSS())
    .pipe(sourcemaps.write("."))
    .on("error", sass.logError)
    .pipe(gulp.dest("./assets/css"));
});

/* la tache watch, se lance avec gulp watch, et surveille la modification de certains fichiers*/
gulp.task("watch", function() {
  gulp.watch(["./assets/scss/**/*.scss"], gulp.series("sass"));
  gulp.watch(["./assets/js/dev/**/*.js"], gulp.series("js"));
});

/* notre tache browser-sync, quand elle est lancée, va pouvoir recharger le browser a chaque changement */
gulp.task("browser-sync", function() {
  browserSync.init({
    server: {
      baseDir: "./"
    }
  });
  gulp
    .watch("./assets/scss/**/*.scss", gulp.series("sass"))
    .on("change", browserSync.reload);
  gulp
    .watch("./assets/js/dev/**/*.js", gulp.series("js"))
    .on("change", browserSync.reload);
  gulp.watch("./*.html").on("change", browserSync.reload);
});

gulp.task("js", function() {
  return gulp
    .src("./")
    .pipe(
      gulpWebpack({
        mode: "development",
        devtool: "inline-source-map",
        entry: {
          script: "./assets/js/dev/script.js"
        },
        output: {
          filename: "[name].bundle.js"
        },
        module: {
          rules: [
            {
              test: /\.js$/,
              exclude: /(node_modules)/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [["@babel/preset-env"]]
                }
              }
            }
          ]
        }
      })
    )
    .pipe(gulp.dest("assets/js"));
});

gulp.task("default", gulp.series("sass", "js"));
