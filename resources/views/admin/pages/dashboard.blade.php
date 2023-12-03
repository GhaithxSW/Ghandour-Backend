<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        {{-- @vite(['resources/rtl/scss/light/assets/apps/blog-post.scss']) --}}
        {{-- @vite(['resources/rtl/scss/dark/assets/apps/blog-post.scss']) --}}
        @vite(['resources/scss/light/assets/apps/blog-post.scss'])
        @vite(['resources/scss/dark/assets/apps/blog-post.scss'])

        @vite(['resources/rtl/scss/light/assets/components/modal.scss'])
        @vite(['resources/rtl/scss/dark/assets/components/modal.scss'])
        @vite(['resources/scss/light/assets/components/modal.scss'])
        @vite(['resources/scss/dark/assets/components/modal.scss'])

        @vite(['public/plugins-rtl/filepond/filepond.min.css'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImagePreview.min.css'])
        @vite(['public/plugins-rtl/tagify/tagify.css'])
        @vite(['resources/rtl/scss/light/assets/forms/switches.scss'])
        @vite(['resources/rtl/scss/dark/assets/forms/switches.scss'])
        @vite(['resources/rtl/scss/light/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/rtl/scss/dark/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/rtl/scss/light/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/rtl/scss/dark/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/rtl/scss/light/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/rtl/scss/dark/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/rtl/scss/light/assets/apps/ecommerce-create.scss'])
        @vite(['resources/rtl/scss/dark/assets/apps/ecommerce-create.scss'])
        @vite(['public/plugins-rtl/leaflet/leaflet.css'])
        @vite(['resources/rtl/scss/light/assets/pages/contact_us.scss'])
        @vite(['resources/rtl/scss/dark/assets/pages/contact_us.scss'])

        <style>
            @media screen and (max-width: 990px) {
                .font-bg {
                    font-size: 26px;
                }
            }

            @media screen and (max-width: 600px) {
                .font-bg {
                    font-size: 18px;
                }

                .font-bg-btn {
                    font-size: 15px;
                }
            }

            @media screen and (max-width: 300px) {
                .font-bg {
                    font-size: 16px;
                }

                .font-bg-btn {
                    font-size: 14px;
                }
            }
        </style>

    </x-slot>

    <div class="m-4">
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="/admin-panel-management/requests" class="card style-2 mb-md-0 mb-4">
                    <img src="{{ Vite::asset('resources/images/requests.png') }}" class="card-img-top" alt="..."
                        style="height: 210px">
                    <div class="card-body px-0 pb-0 text-center">
                        <h5 class="card-title mb-3 font-bg">الطلبات</h5>
                    </div>
                </a>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="/admin-panel-management/users" class="card style-2 mb-md-0 mb-4">
                    <img src="{{ Vite::asset('resources/images/users.jpeg') }}" class="card-img-top" alt="..."
                        style="height: 210px">
                    <div class="card-body px-0 pb-0 text-center">
                        <h5 class="card-title mb-3 font-bg">المستخدمين</h5>
                    </div>
                </a>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="/admin-panel-management/users" class="card style-2 mb-md-0 mb-4">
                    <img src="{{ Vite::asset('resources/images/users.jpeg') }}" class="card-img-top" alt="..."
                        style="height: 210px">
                    <div class="card-body px-0 pb-0 text-center">
                        <h5 class="card-title mb-3 font-bg">الابحاث</h5>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/editors/quill/quill.js'])
        @vite(['public/plugins-rtl/filepond/filepond.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginFileValidateType.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageExifOrientation.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImagePreview.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageCrop.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageResize.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageTransform.min.js'])
        @vite(['public/plugins-rtl/filepond/filepondPluginFileValidateSize.min.js'])
        @vite(['public/plugins-rtl/tagify/tagify.min.js'])
        @vite(['resources/rtl/assets/js/apps/ecommerce-create.js'])
        @vite(['public/plugins-rtl/leaflet/leaflet.js'])
        @vite(['public/plugins-rtl/leaflet/us-states.js'])
        @vite(['public/plugins-rtl/leaflet/eu-countries.js'])
    </x-slot>

</x-admin.base-layout>
