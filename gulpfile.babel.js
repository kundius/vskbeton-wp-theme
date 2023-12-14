import { series, src, dest, parallel, watch } from "gulp";
import yargs from "yargs";
import cleanCss from "gulp-clean-css";
import gulpif from "gulp-if";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import postcss from "gulp-postcss";
import sourcemaps from "gulp-sourcemaps";
import autoprefixer from "autoprefixer";
import imagemin from "gulp-imagemin";
import del from "del";
import webpack from "webpack-stream";
import named from "vinyl-named";
import concat from "gulp-concat";

const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);
export const stylesTask = () => {
  return src([
    "node_modules/normalize.css/normalize.css",
    "node_modules/hystmodal/dist/hystmodal.min.css",
    "node_modules/swiper/swiper-bundle.min.css",
    // "node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css",
    // "node_modules/@fortawesome/fontawesome-free/css/all.min.css",
    // "node_modules/swiper/modules/pagination/pagination.min.css",
    // "node_modules/swiper/modules/effect-fade/effect-fade.min.css",
    // "node_modules/swiper/modules/thumbs/thumbs.min.css",
    // "node_modules/swiper/modules/navigation/navigation.min.css",
    "src/styles/app.scss",
  ])
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(concat("bundle.css"))
    .pipe(dest("dist/styles"));
};

export const scriptsTask = () => {
  return src("src/scripts/bundle.js")
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              loader: "babel-loader",
            },
          ],
        },
        mode: PRODUCTION ? "production" : "development",
        devtool: !PRODUCTION ? "inline-source-map" : false,
        output: {
          filename: "[name].js",
        },
      })
    )
    .pipe(dest("dist/scripts"));
};

export const imagesTask = () => {
  return src("src/images/**/*.{jpg,jpeg,png,svg,gif}")
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest("dist/images"));
};

export const fontsTask = () => {
  return src("src/fonts/**/*.{ttf,woff,woff2}").pipe(dest("dist/fonts"));
};

export const fontsAwesomeTask = () => {
  return src(
    "node_modules/@fortawesome/fontawesome-free/webfonts/*.{ttf,woff,woff2}"
  ).pipe(dest("dist/webfonts"));
};

export const cleanTask = () => del(["dist"]);

export const watchTask = () => {
  watch("src/styles/**/*.{scss,css,sass}", stylesTask);
  watch("src/images/**/*.{jpg,jpeg,png,svg,gif}", series(imagesTask));
  watch("src/fonts/**/*.{ttf,woff,woff2}", series(fontsTask));
  watch("src/scripts/**/*.js", series(scriptsTask));
  watch("**/*.php");
};

export const dev = series(
  cleanTask,
  parallel(stylesTask, imagesTask, fontsAwesomeTask, fontsTask, scriptsTask),
  watchTask
);

export const build = series(
  cleanTask,
  parallel(stylesTask, imagesTask, fontsAwesomeTask, fontsTask, scriptsTask)
);

export default dev;
