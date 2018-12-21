var gulp = require("gulp"),
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano"),
    sourcemaps = require("gulp-sourcemaps"),
    browserSync = require("browser-sync").create(),
    uglify = require("gulp-uglify"),
    concat = require("gulp-concat");

// Put this after including our dependencies
var paths = {
    dest: "dist",
    styles: {
        // By using styles/**/*.sass we're telling gulp to check all folders for any sass file
        src: "resources/styles/**/*.scss",
        // Compiled files will end up in whichever folder it's found in (partials are not compiled)
        dest: "dist"
    },

    js: {
        src: "resources/js/**/*js",
        dest: "dist/main.js"
    }

    // Easily add additional paths
    // ,html: {
    //  src: '...',
    //  dest: '...'
    // }
};

function style() {
    return (
        gulp
            .src(paths.styles.src)
            .pipe(sourcemaps.init())
            .pipe(sass())
            .on("error", sass.logError)
            .pipe(postcss([autoprefixer(), cssnano()]))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.dest))
            // Add browsersync stream pipe after compilation
            .pipe(browserSync.stream())
    );
}

function compressJs() {
    return gulp
        .src(paths.js.src)
        .pipe(concat("main.js"))
        .pipe(uglify())
        .pipe(gulp.dest(paths.dest));
}

function reload() {
    browserSync.cleanup();
    browserSync.reload();
}

// Add browsersync initialization at the start of the watch task
function watch() {
    browserSync.init({
        proxy: "http://localhost:8888/gorilla/",
        files: "**/*"
    });

    gulp.watch(paths.styles.src, style);
    gulp.watch(paths.js.src, compressJs);
    // We should tell gulp which files to watch to trigger the reload
    // This can be html or whatever you're using to develop your website
    // Note -- you can obviously add the path to the Paths object
}

exports.watch = watch;
exports.default = gulp.parallel(compressJs, style);
