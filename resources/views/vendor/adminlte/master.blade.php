<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        {{-- @yield('title_prefix', config('adminlte.title_prefix', '')) --}}
        {{-- @yield('title', config('adminlte.title', 'AdminLTE 3')) --}}
        {{-- @yield('title_postfix', config('adminlte.title_postfix', '')) --}}
        @yield('title', setting('title'))
    </title>

    {{-- <script src="https://kit.fontawesome.com/4134f7c670.js" crossorigin="anonymous"></script> --}}
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('loadingbar/loading-bar.css') }}">
    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Pace --}}
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">

    {{-- Base Stylesheets --}}
    @if (!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

        @if (config('adminlte.google_fonts.allowed', true))
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @endif
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif

    {{-- Livewire Styles --}}
    @if (config('adminlte.livewire'))
        @if (app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if (config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        {{-- Custom Favicon --}}
        <link rel="shortcut icon"
            href="@if (setting('img_favicon')) {{ asset(setting('img_favicon')) }} @else {{ asset('images/no-image.jpg') }} @endif" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" crossorigin="use-credentials" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif
    <style>
        .circle-bg {
            background-color: #FFE3E3 !important;
        }

        /* Card Design */
        .card {
            border-radius: 15px;
        }

        .login-card-body,
        .register-card-body {
            border-radius: 15px;
        }

        /* Custom */

        .login-page {
            background-color: #f6f9ff;
        }

        .bg-white-custom {
            background-color: #f6f9ff;
            color: #000000;
        }

        .bg-sidebar-white-custom {
            background: #C70000;
            color: #ffffff;
        }

        /* Navbar */
        .main-header {
            border-bottom: none !important;
        }

        /* Sidebar */
        .sidebar {
            padding-left: 0.8rem !important;
            padding-right: 0.8rem !important;
        }

        .sidebar-light-white-custom .nav-sidebar>.nav-item>.nav-link.active {
            background: linear-gradient(89deg, rgb(21, 74, 189) 0.1%, rgb(26, 138, 211) 51.5%, rgb(72, 177, 234) 100.2%);
            color: white;
        }

        .nav-sidebar .nav-item>.nav-link {
            padding: 10px;
        }

        /* เผื่ออยากแก้ตอน Hover Side Menu */
        /* [class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link,
            [class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link {
                background-color: #f6f9ff;
                color: #4154f1;
            } */

        [class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link.active {
            box-shadow: none !important;
        }

        [class*=sidebar-light-] .sidebar a {
            color: #000000;
        }

        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link {
            color: #000000;
        }

        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active,
        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: rgba(0, 0, 0, 0);
            color: rgb(51, 139, 147);

            /* font-size: 16px; */
        }

        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link:focus,
        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link:hover {
            background-color: rgba(0, 0, 0, .1);
            color: rgb(51, 139, 147);
        }

        /* Sidebar menu tree */
        .custom-icon {
            font-size: 5px;
            text-align: center;
            vertical-align: middle;
            /* ปรับขนาดตามที่คุณต้องการ */
        }

        .navbar-white-custom {
            background-color: #f6f9ff;
        }

        .shadow-custom {
            box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
        }

        /* Bg */
        .bg-custom {
            background: linear-gradient(89deg, rgb(21, 74, 189) 0.1%, rgb(26, 138, 211) 51.5%, rgb(72, 177, 234) 100.2%);
            color: white !important;
        }



        /* text-color */
        .text-custom {
            color: rgb(51, 139, 147);
        }

        /* Btn Design */
        .btn {
            border-radius: 0.5rem;
        }

        /* Modal Design */
        .modal-content {
            border: 0 !important;
            border-radius: 15px !important;
        }

        /* Border radius Custom */
        .border-custom {
            border-radius: 15px !important;
        }

        /* Search Box */
        .group {
            display: flex;
            line-height: 28px;
            align-items: center;
            position: relative;
            max-width: 190px;
        }

        .input-search {
            width: 100%;
            height: 40px;
            line-height: 28px;
            padding: 0 1rem;
            padding-left: 2.5rem;
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            background-color: #f3f3f4;
            color: #0d0c22;
            transition: .3s ease;
        }

        .input-search::placeholder {
            color: #9e9ea7;
        }

        .input-search:focus,
        input:hover {
            outline: none;
            border-color: rgba(234, 76, 137, 0.4);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
        }


        .input-custom {
            width: 100%;
            height: 40px;
            line-height: 28px;
            padding: 0 1rem;
            /* padding-left: 2.5rem; */
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            background-color: #f3f3f4;
            color: #0d0c22;
            transition: .3s ease;
        }

        .input-custom::placeholder {
            color: #9e9ea7;
        }

        .input-custom:focus,
        input:hover {
            outline: none;
            border-color: rgba(234, 76, 137, 0.4);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
        }

        .icon {
            position: absolute;
            left: 1rem;
            fill: #9e9ea7;
            width: 1rem;
            height: 1rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: rgb(72, 177, 234);
            border-color: rgb(26, 138, 211) !important;
        }

        /*
        .form-control-sm {
            border-radius: 0.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
        } */

        div:where(.swal2-container) div:where(.swal2-popup) {
            border-radius: 15px !important;
        }

        /* ********************************* end custom ********************************* */

        /* The switch - the box around the slider */
        .switch {
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 3em;
            height: 1.5em;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #cc1100;
            transition: .4s;
            border-radius: 6px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 1em;
            width: 1em;
            border-radius: 4px;
            left: 0.25em;
            bottom: 0.25em;
            transform: rotate(270deg);
            background-color: rgb(255, 255, 255);
            transition: .4s;
        }

        .switch input:checked+.slider {
            background-color: #4bc6ff;
        }

        .switch input:checked+.slider:before {
            transform: translateX(1.5em);
        }

        /* switch 2 */

        .switch2 {
            font-size: 13px;
            position: relative;
            display: inline-block;
            width: 3.5em;
            height: 2em;
        }

        /* Hide default HTML checkbox */
        .switch2 input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider2 {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 30px;
            box-shadow: 0 0 0 2px #508D69;
            border: 4px solid transparent;
            overflow: hidden;
            transition: .4s;
            background: transparent;
        }

        .slider2:before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 30px;
            background-color: #508D69;
            transform: translateX(-50%);
            transition: .4s;
        }

        input:checked+.slider2 {
            background-color: rgb(182, 244, 146);
        }

        input:focus:checked+.slider2 {
            box-shadow: 0 0 0 2px #508D69, 0 0 4px #777;
        }

        input:checked+.slider2:before {
            transform: translateX(1.5em);
        }

        /* Dropzone */
        .dropzone .dz-preview .dz-image img {
            width: 100% !important;
            display: block;
        }

        /* .fa-exclamation-triangle:before,
        .fa-triangle-exclamation:before,
        .fa-warning:before,
        .fa-bell:before {
            color: white !important;
        } */

        /* CKEditor */
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        /* Sidebar menu tree */
        .custom-icon {
            font-size: 5px;
            text-align: center;
            vertical-align: middle;
            /* ปรับขนาดตามที่คุณต้องการ */
        }

        /* datatable */
        .table thead th {
            border-bottom: 0.3px solid #dee2e69f;
        }

        div.dataTables_scrollBody {
            border-left: 0px !important;
        }

        .table td {
            vertical-align: 0;
            border-top: 0.3px solid #dee2e69f;
        }

        .table th {
            border-top: 0;
        }


        body {
            font-family: kanit !important;
        }
    </style>
</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if (!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if (config('adminlte.livewire'))
        @if (app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- SummerNote --}}
    <link href="{{ asset('plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/summernote/plugin/tam-emoji/css/emoji.css') }}" rel="stylesheet">

    <script src="{{ asset('plugins/summernote/summernote-bs4.js') }}"></script>

    <script src="{{ asset('plugins/summernote/plugin/tam-emoji/js/config.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('plugins/summernote/plugin/tam-emoji/js/tam-emoji.min.js') }}" rel="stylesheet"></script>

    {{-- LoadingBar --}}
    <script type="text/javascript" src="{{ asset('loadingbar/loading-bar.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // # Emoji Button
        document.emojiButton = 'fas fa-smile'; // default: fa fa-smile-o
        // #The Emoji selector to input Unicode characters instead of images
        document.emojiType = 'unicode'; // default: image
        // #Relative path to emojis
        document.emojiSource = '{{ asset('plugins/summernote/plugin/tam-emoji/img') }}';

        //Lightbox for Bootstrap
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        //SummerNote
        $(document).ready(function() {

            // //Prevent View Source Code
            // $(document).keydown(function (event) {
            //     if (event.keyCode == 123) { // Prevent F12
            //         return false;
            //     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
            //         return false;
            //     } else if(event.ctrlKey && event.shiftKey && event.keyCode == 74){ // Prevent Ctrl+Shift+J
            //         return false;
            //     } else if(event.ctrlKey && event.shiftKey && event.keyCode == 67){ // Prevent Ctrl+Shift+C
            //         return false;
            //     } else if(event.ctrlKey && event.keyCode == 85){ //Prevent Ctrl+U
            //         return false;
            //     } else if(event.keyCode == 83 && (navigator.platform.match("Mac") ? event.metaKey : event.ctrlKey)){ //Prevent S key + macOS
            //         return false;
            //     }
            // });

            // // Prevent Right Click
            // $(document).on("contextmenu", function (e) {
            //     e.preventDefault();
            // });

            //DualListbox
            $('.duallistbox').bootstrapDualListbox({
                infoText: 'ทั้งหมด {0} รายการ',
                infoTextEmpty: 'ไม่มีรายการ',
                filterPlaceHolder: 'ค้นหา',
                moveAllLabel: 'เลือกทั้งหมด',
                removeAllLabel: 'นำออกทั้งหมด',
                infoTextFiltered: 'ทั้งหมด {0} จาก {1} รายการ',
                filterTextClear: '',
            });

            //toastr
            toastr.options = {
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "progressBar": true,
                "newestOnTop": true,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            //Select2
            $('.sel2').select2();

            //Select2 Taging
            $(".sel2Tag").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })

            //Date Picker
            $(".datepicker").Zebra_DatePicker({
                format: "d/m/Y",
                show_icon: false,
                readonly_element: false,
            });

            $(".datepicker-year").Zebra_DatePicker({
                format: 'Y',
                show_icon: false,
                readonly_element: false,
            });

            //FlatPicker
            $(".flatpicker").flatpickr({
                dateFormat: "d/m/Y",
            });

            $(".flatpicker-maxToday").flatpickr({
                dateFormat: "d/m/Y",
                maxDate: "today",
            });

            //Inputmask
            $(".inputmask-phone").inputmask("999-999-9999", {
                inputmode: "numeric"
            });

            $(".inputmask-date").inputmask("99/99/9999", {
                alias: "date",
                inputFormat: "dd/mm/yyyy",
                inputmode: "numeric"
            });

            $(".inputmask-year").inputmask("9999", {
                alias: "date",
                inputFormat: "yyyy",
                inputmode: "numeric"
            });

            bsCustomFileInput.init();
            // emojione.ascii = true;

        });

        //CKEditor
        //CK th
        ClassicEditor.create(document.querySelector('.ckEditor-th'), {
                width: '800px', // กำหนดความกว้าง
                height: '400px', // กำหนดความสูง
                fontSize: {
                    options: [
                        8,
                        10,
                        12,
                        14,
                        'default',
                        18,
                        20,
                        22,
                        24,
                        26,
                    ]
                },
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                },
            }).then(editor => {
                editor.editing.view.document.on('keydown', (event, data) => {
                    if (data.domEvent.key === 'Delete' || data.domEvent.key === 'Backspace') {
                        // ส่งคำขอลบรูปภาพ
                        const selection = editor.model.document.selection;
                        const selectedElement = selection.getSelectedElement();

                        if (selectedElement && selectedElement) {
                            if (selectedElement.getAttribute('src')) {
                                const imageUrl = selectedElement.getAttribute('src');
                                image = imageUrl.split('/');

                                data = new FormData();
                                data.append("image", image[5]);
                                data.append("_token", CSRF_TOKEN);
                                // ส่งคำขอลบรูปภาพ
                                $.ajax({
                                    type: "POST",
                                    data: data,
                                    url: "{{ route('ckeditor.delete') }}", // delete file
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        //nothing
                                    }
                                });
                            }
                        }
                    }
                });
            })
            .catch(error => {
                // console.error(error);
            });

        // CK en
        ClassicEditor.create(document.querySelector('.ckEditor-en'), {
                width: '800px', // กำหนดความกว้าง
                height: '400px', // กำหนดความสูง
                fontSize: {
                    options: [
                        8,
                        10,
                        12,
                        14,
                        'default',
                        18,
                        20,
                        22,
                        24,
                        26,
                    ]
                },
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                },
            }).then(editor => {
                editor.editing.view.document.on('keydown', (event, data) => {
                    if (data.domEvent.key === 'Delete' || data.domEvent.key === 'Backspace') {
                        // ส่งคำขอลบรูปภาพ
                        const selection = editor.model.document.selection;
                        const selectedElement = selection.getSelectedElement();

                        if (selectedElement && selectedElement) {
                            if (selectedElement.getAttribute('src')) {
                                const imageUrl = selectedElement.getAttribute('src');
                                image = imageUrl.split('/');

                                data = new FormData();
                                data.append("image", image[5]);
                                data.append("_token", CSRF_TOKEN);
                                // ส่งคำขอลบรูปภาพ
                                $.ajax({
                                    type: "POST",
                                    data: data,
                                    url: "{{ route('ckeditor.delete') }}", // this file uploads the picture and
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        //nothing
                                    }
                                });
                            }
                        }
                    }
                });
            })
            .catch(error => {
                // console.error(error);
            });

        //CK short th
        ClassicEditor.create(document.querySelector('.ckEditor-short-th'), {
                width: '800px', // กำหนดความกว้าง
                height: '400px', // กำหนดความสูง
                fontSize: {
                    options: [
                        8,
                        10,
                        12,
                        14,
                        'default',
                        18,
                        20,
                        22,
                        24,
                        26,
                    ]
                },
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                },
            }).then(editor => {
                editor.editing.view.document.on('keydown', (event, data) => {
                    if (data.domEvent.key === 'Delete' || data.domEvent.key === 'Backspace') {
                        // ส่งคำขอลบรูปภาพ
                        const selection = editor.model.document.selection;
                        const selectedElement = selection.getSelectedElement();

                        if (selectedElement && selectedElement) {
                            if (selectedElement.getAttribute('src')) {
                                const imageUrl = selectedElement.getAttribute('src');
                                image = imageUrl.split('/');

                                data = new FormData();
                                data.append("image", image[5]);
                                data.append("_token", CSRF_TOKEN);
                                // ส่งคำขอลบรูปภาพ
                                $.ajax({
                                    type: "POST",
                                    data: data,
                                    url: "{{ route('ckeditor.delete') }}", // this file uploads the picture and
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        //nothing
                                    }
                                });
                            }
                        }
                    }
                });
            })
            .catch(error => {
                // console.error(error);
            });

        //CK short en
        ClassicEditor.create(document.querySelector('.ckEditor-short-en'), {
                width: '800px', // กำหนดความกว้าง
                height: '400px', // กำหนดความสูง
                fontSize: {
                    options: [
                        8,
                        10,
                        12,
                        14,
                        'default',
                        18,
                        20,
                        22,
                        24,
                        26,
                    ]
                },
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
                },
            }).then(editor => {
                editor.editing.view.document.on('keydown', (event, data) => {
                    if (data.domEvent.key === 'Delete' || data.domEvent.key === 'Backspace') {
                        // ส่งคำขอลบรูปภาพ
                        const selection = editor.model.document.selection;
                        const selectedElement = selection.getSelectedElement();

                        if (selectedElement && selectedElement) {
                            if (selectedElement.getAttribute('src')) {
                                const imageUrl = selectedElement.getAttribute('src');
                                image = imageUrl.split('/');

                                data = new FormData();
                                data.append("image", image[5]);
                                data.append("_token", CSRF_TOKEN);
                                // ส่งคำขอลบรูปภาพ
                                $.ajax({
                                    type: "POST",
                                    data: data,
                                    url: "{{ route('ckeditor.delete') }}", // this file uploads the picture and
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        //nothing
                                    }
                                });
                            }
                        }
                    }
                });
            })
            .catch(error => {
                // console.error(error);
            });

        //Dropzone

        Dropzone.prototype.defaultOptions.dictRemoveFile =
            "<i class=\"fa fa-trash ml-auto mt-2 fa-1x text-danger\"></i> ลบรูปภาพ";
        Dropzone.autoDiscover = false;
        var uploadedImageMap = {}
        $('#imageDropzone').dropzone({
            url: "{{ route('dropzone.upload') }}",
            addRemoveLinks: true,
            dictCancelUpload: 'ยกเลิกอัพโหลด',
            acceptedFiles: 'image/*',
            //alert accepted file
            "error": function(file, message, xhr) {
                if (xhr == null) this.removeFile(file); // perhaps not remove on xhr errors
                if (file.type == 'application/pdf') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด',
                        text: 'ไฟล์ที่นำเข้าต้องเป็นไฟล์รูปภาพเท่านั้น',
                        timer: 1500
                    })
                }
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $(file.previewElement).append('<input type="hidden" name="image[]" value="' + response.name +
                    '">')
                uploadedImageMap[file.name] = response.name
            },
            init: function() {
                @if (isset($images))
                    @foreach ($images as $key => $image)
                        var file = {!! json_encode($image) !!};
                        file.url = '{!! $image->getUrl() !!}';
                        file.name = '{!! $image->file_name !!}';
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.url);
                        file.previewElement.classList.add('dz-complete')
                        $(file.previewElement).append('<input type="hidden" name="image[]" value="' + file
                            .file_name + '">')
                    @endforeach
                @endif
                this.on('removedfile', (file) => {
                    filename = JSON.parse(file.xhr.response).name;
                    let data = {
                        '_token': '{{ csrf_token() }}',
                        'name': filename,
                    }

                    $.ajax({
                        type: 'post',
                        url: "{{ route('dropzone.delete') }}",
                        data: data,
                        success: (response) => {

                        }
                    });
                });
            }
        });
        $(function() {
            $("#imageDropzone").sortable({
                items: '.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                containment: '#imageDropzone',
                distance: 20,
                tolerance: 'pointer'
            });
        });
    </script>
    {{-- component function --}}
    <script src="{{ asset('js/admin/component.js') }}"></script>

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

</body>

</html>
