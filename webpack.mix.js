const mix = require('laravel-mix');
const lodash = require("lodash");
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const folder = {
        src: "resources/admin/", // source files
        dist: "public/", // build files
        dist_assets: "public/assets/" //build assets files
    }
    /*
     |--------------------------------------------------------------------------
     | Mix Asset Management
     |--------------------------------------------------------------------------
     |
     | Mix provides a clean, fluent API for defining some Webpack build steps
     | for your Laravel application. By default, we are compiling the Sass
     | file for the application as well as bundling up all the JS files.
     |
     */
var third_party_assets = {
    css_js: [{
            "name": "bootstrap",
            "assets": ["./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", ]
        },

        {
            "name": "metismenujs",
            "assets": ["./node_modules/metismenujs/dist/metismenujs.min.js", ]
        },

        {
            "name": "simplebar",
            "assets": ["./node_modules/simplebar/dist/simplebar.min.js", ]
        },

        {
            "name": "feather-icons",
            "assets": ["./node_modules/feather-icons/dist/feather.min.js", ]
        },

        {
            "name": "@ckeditor",
            "assets": ["./node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js", ]
        },

        {
            "name": "@simonwep",
            "assets": ["./node_modules/@simonwep/pickr/dist/pickr.min.js",
                "./node_modules/@simonwep/pickr/dist/themes/classic.min.css",
                "./node_modules/@simonwep/pickr/dist/themes/monolith.min.css",
                "./node_modules/@simonwep/pickr/dist/themes/nano.min.css",
                "./node_modules/@simonwep/pickr/dist/pickr.es5.min.js"
            ]
        },

        {
            "name": "alertifyjs",
            "assets": ["./node_modules/alertifyjs/build/alertify.min.js",
                "./node_modules/alertifyjs/build/css/alertify.min.css",
                "./node_modules/alertifyjs/build/css/themes/default.min.css"
            ]
        },

        { "name": "apexcharts", "assets": ["./node_modules/apexcharts/dist/apexcharts.min.js"] },

        { "name": "chart", "assets": ["./node_modules/chart.js/dist/chart.min.js"] },

        {
            "name": "choices.js",
            "assets": ["./node_modules/choices.js/public/assets/scripts/choices.min.js",
                "./node_modules/choices.js/public/assets/styles/choices.min.css"
            ]
        },

        {
            "name": "flatpickr",
            "assets": ["./node_modules/flatpickr/dist/flatpickr.min.js",
                "./node_modules/flatpickr/dist/flatpickr.min.css"
            ]
        },

        {
            "name": "fullcalendar",
            "assets": ["./node_modules/fullcalendar/main.min.js",
                "./node_modules/fullcalendar/main.min.css"
            ]
        },

        {
            "name": "glightbox",
            "assets": ["./node_modules/glightbox/dist/js/glightbox.min.js",
                "./node_modules/glightbox/dist/css/glightbox.min.css",
            ]
        },

        {
            "name": "gmaps",
            "assets": ["./node_modules/gmaps/gmaps.min.js", ]
        },

        {
            "name": "gridjs",
            "assets": ["./node_modules/gridjs/dist/gridjs.umd.js",
                "./node_modules/gridjs/dist/theme/mermaid.min.css"
            ]
        },

        { "name": "imask", "assets": ["./node_modules/imask/dist/imask.min.js"] },

        {
            "name": "dropzone",
            "assets": ["./node_modules/dropzone/dist/min/dropzone.min.js",
                "./node_modules/dropzone/dist/min/dropzone.min.css",
            ]
        },

        {
            "name": "jsvectormap",
            "assets": ["./node_modules/jsvectormap/dist/js/jsvectormap.min.js",
                "./node_modules/jsvectormap/dist/css/jsvectormap.min.css",
                //"./node_modules/jsvectormap/dist/maps/canada.js",
                //"./node_modules/jsvectormap/dist/maps/us-merc-en.js",
                "./node_modules/jsvectormap/dist/maps/world-merc.js"
            ]
        },

        {
            "name": "leaflet",
            "assets": ["./node_modules/leaflet/dist/leaflet.js",
                "./node_modules/leaflet/dist/leaflet.css"
            ]
        },

        { "name": "masonry-layout", "assets": ["./node_modules/masonry-layout/dist/masonry.pkgd.min.js"] },

        { "name": "moment", "assets": ["./node_modules/moment/min/moment.min.js"] },

        {
            "name": "quill",
            "assets": ["./node_modules/quill/dist/quill.min.js",
                "./node_modules/quill/dist/quill.core.css",
                "./node_modules/quill/dist/quill.bubble.css",
                "./node_modules/quill/dist/quill.snow.css"
            ]
        },

        { "name": "rater-js", "assets": ["./node_modules/rater-js/index.js"] },

        {
            "name": "nouislider",
            "assets": ["./node_modules/nouislider/dist/nouislider.min.js",
                "./node_modules/nouislider/dist/nouislider.min.css"
            ]
        },

        {
            "name": "sweetalert2",
            "assets": ["./node_modules/sweetalert2/dist/sweetalert2.min.js",
                "./node_modules/sweetalert2/dist/sweetalert2.min.css"
            ]
        },

        {
            "name": "swiper",
            "assets": ["./node_modules/swiper/swiper-bundle.min.js",
                "./node_modules/swiper/swiper-bundle.min.css"
            ]
        },

        { "name": "wnumb", "assets": ["./node_modules/wnumb/wNumb.min.js"] }
    ]
};
//copying third party assets
lodash(third_party_assets).forEach(function(assets, type) {
    if (type == "css_js") {
        lodash(assets).forEach(function(plugin) {
            var name = plugin['name'],
                assetlist = plugin['assets'],
                css = [],
                js = [];
            lodash(assetlist).forEach(function(asset) {
                var ass = asset.split(',');
                for (let i = 0; i < ass.length; ++i) {
                    if (ass[i].substr(ass[i].length - 3) == ".js") {
                        js.push(ass[i]);
                    } else {
                        css.push(ass[i]);
                    }
                };
            });
            if (js.length > 0) {
                mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            }
            if (css.length > 0) {
                mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            }
        });
    }
});

mix.copyDirectory("./node_modules/leaflet/dist/images", folder.dist_assets + "/libs/leaflet/images");

// copy all fonts
var out = folder.dist_assets + "fonts";
mix.copyDirectory(folder.src + "fonts", out);

// copy all images
var out = folder.dist_assets + "images";
mix.copyDirectory(folder.src + "images", out);

mix.sass('resources/admin/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css");
mix.sass('resources/admin/scss/icons.scss', folder.dist_assets + "css").options({ processCssUrls: false }).minify(folder.dist_assets + "css/icons.css");
mix.sass('resources/admin/scss/app.scss', folder.dist_assets + "css").options({ processCssUrls: false }).minify(folder.dist_assets + "css/app.css");

mix.webpackConfig({
    plugins: [
        new WebpackRTLPlugin()
    ]
});
//copying demo pages related assets
var app_pages_assets = {
    js: [
        folder.src + "js/pages/calendar.init.js",
        folder.src + "js/pages/two-step-verification.init.js",
        folder.src + "js/pages/apexcharts.init.js",
        folder.src + "js/pages/chartjs.init.js",
        folder.src + "js/pages/ecommerce-choices.init.js",
        folder.src + "js/pages/product-filter-range.init.js",
        folder.src + "js/pages/email-editor.init.js",
        folder.src + "js/pages/lightbox.init.js",
        folder.src + "js/pages/notification.init.js",
        folder.src + "js/pages/rangeslider.init.js",
        folder.src + "js/pages/rating.init.js",
        folder.src + "js/pages/sweet-alerts.init.js",
        folder.src + "js/pages/form-advanced.init.js",
        folder.src + "js/pages/form-editor.init.js",
        folder.src + "js/pages/form-mask.init.js",
        folder.src + "js/pages/form-validation.init.js",
        folder.src + "js/pages/materialdesign.init.js",
        folder.src + "js/pages/fontawesome.init.js",
        folder.src + "js/pages/dashboard.init.js",
        folder.src + "js/pages/gmaps.init.js",
        folder.src + "js/pages/vector-maps.init.js",
        folder.src + "js/pages/coming-soon.init.js",
        folder.src + "js/pages/timeline.init.js",
        folder.src + "js/pages/gridjs.init.js",
        folder.src + "js/pages/alert.init.js",
        folder.src + "js/pages/ecommerce-orders.init.js",
        folder.src + "js/pages/ecommerce-customers.init.js",
        folder.src + "js/pages/ecommerce-shops.init.js",
        folder.src + "js/pages/contacts-list.init.js"
    ]
};
var out = folder.dist_assets + "js/";
lodash(app_pages_assets).forEach(function(assets, type) {
    for (let i = 0; i < assets.length; ++i) {
        mix.js(assets[i], out + "pages");
    };
});
mix.combine('resources/admin/js/pages/invoice-list.init.js', folder.dist_assets + "js/pages/invoice-list.init.js");
mix.combine('resources/admin/js/pages/leaflet-us-states.js', folder.dist_assets + "js/pages/leaflet-us-states.js");
mix.combine('resources/admin/js/pages/leaflet-map.init.js', folder.dist_assets + "js/pages/leaflet-map.init.js");
mix.combine('resources/admin/js/pages/form-wizard.init.js', folder.dist_assets + "js/pages/form-wizard.init.js");
mix.combine('resources/admin/js/pages/chartjs.js', folder.dist_assets + "js/pages/chartjs.js");
mix.combine('resources/admin/js/app.js', folder.dist_assets + "js/app.js");
