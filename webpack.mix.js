const mix = require('laravel-mix');

mix.webpackConfig({
    stats: {
         children: true
    }
});

mix.sass('public/resources/scss/layouts/vertical-light-menu/light/loader.scss', 'public/css/light');
mix.sass('public/resources/scss/layouts/vertical-light-menu/dark/loader.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/components/carousel.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/components/carousel.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/apps/blog-create.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/apps/blog-create.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/apps/blog-post.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/apps/blog-post.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/forms/switches.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/forms/switches.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/plugins/tagify/custom-tagify.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/plugins/tagify/custom-tagify.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/plugins/filepond/custom-filepond.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/plugins/filepond/custom-filepond.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/components/tabs.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/components/tabs.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/elements/custom-pagination.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/elements/custom-pagination.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/scrollspyNav.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/scrollspyNav.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/plugins/editors/quill/quill.snow.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/plugins/editors/quill/quill.snow.scss', 'public/css/dark');
mix.sass('public/resources/scss/layouts/vertical-light-menu/light/structure.scss', 'public/css/light');
mix.sass('public/resources/scss/layouts/vertical-light-menu/dark/structure.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/plugins/plugins.min.scss', 'public/css/light');
mix.sass('public/resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss', 'public/css/light');

mix.sass('public/resources/scss/light/assets/main.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/main.scss', 'public/css/dark');

mix.sass('public/resources/scss/light/assets/components/modal.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/components/modal.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/apps/ecommerce-create.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/apps/ecommerce-create.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/pages/contact_us.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/pages/contact_us.scss', 'public/css/dark');
mix.sass('public/resources/scss/light/assets/components/timeline.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/components/timeline.scss', 'public/css/dark');

mix.sass('public/resources/scss/light/assets/elements/alert.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/assets/elements/alert.scss', 'public/css/dark');

mix.sass('public/resources/rtl/scss/layouts/vertical-light-menu/light/loader.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/layouts/vertical-light-menu/dark/loader.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/assets/components/carousel.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/components/carousel.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/assets/apps/blog-create.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/apps/blog-create.scss', 'public/rtl/css/dark');

mix.sass('public/resources/rtl/scss/light/assets/forms/switches.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/forms/switches.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/plugins/tagify/custom-tagify.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/plugins/tagify/custom-tagify.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/plugins/filepond/custom-filepond.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/plugins/filepond/custom-filepond.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/assets/components/tabs.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/components/tabs.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/assets/elements/custom-pagination.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/elements/custom-pagination.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/assets/scrollspyNav.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/scrollspyNav.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/light/plugins/editors/quill/quill.snow.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/plugins/editors/quill/quill.snow.scss', 'public/rtl/css/dark');
mix.sass('public/resources/rtl/scss/layouts/vertical-light-menu/light/structure.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/layouts/vertical-light-menu/dark/structure.scss', 'public/rtl/css/dark');

mix.sass('public/resources/rtl/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/light/assets/custom.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/custom.scss', 'public/rtl/css/dark');

mix.sass('public/resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss', 'public/rtl/css');

mix.sass('public/resources/rtl/scss/light/assets/pages/contact_us.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/pages/contact_us.scss', 'public/rtl/css/dark');

mix.sass('public/resources/rtl/scss/light/assets/apps/ecommerce-create.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/apps/ecommerce-create.scss', 'public/rtl/css/dark');

mix.sass('public/resources/rtl/scss/light/assets/components/modal.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/dark/assets/components/modal.scss', 'public/rtl/css/dark');

mix.sass('public/resources/scss/light/plugins/splide/custom-splide.min.scss', 'public/css/light');
mix.sass('public/resources/scss/dark/plugins/splide/custom-splide.min.scss', 'public/css/dark');

mix.sass('public/resources/rtl/scss/dark/plugins/splide/custom-splide.min.scss', 'public/rtl/css/light');
mix.sass('public/resources/rtl/scss/light/plugins/splide/custom-splide.min.scss', 'public/rtl/css/dark');
