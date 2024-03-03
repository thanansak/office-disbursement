<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-white',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-danger shadow',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => 'fa-lg text-danger',
    'classes_auth_btn' => 'btn-danger',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'text-sm',
    'classes_brand' => 'shadow-custom',
    'classes_brand_text' => '',
    'classes_content_wrapper' => 'bg-white-custom',
    'classes_content_header' => '',
    'classes_content' => 'bg-white-custom text-sm',
    'classes_sidebar' => 'sidebar-light-white-custom shadow-custom fixed',
    'classes_sidebar_nav' => 'nav-child-indent text-sm',
    'classes_topnav' => 'navbar-white navbar-light shadow-custom',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',
    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => NULL,
    'sidebar_collapse' => NULL,
    'sidebar_collapse_auto_size' => 1024,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => false,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // ['header' => 'สรุปผล', 'can' => ['*','dashboard']],
        [
            'text' => 'รายงานผล',
            'route'  => 'dashboard.index',
            'icon' => 'fas fa-fw fa-chart-area',
            'active'      => ['','*dashboard*'],
            'can'  => ['*', 'dashboard'],
        ],
        [
            'text'    => 'จัดการอุปกรณ์',
            'icon'    => 'fas fa-fw fa-computer',
            'can'  => ['*','all product','view product','all product_type','view product_type'],
            'submenu' => [
                [
                    'text' => 'ประเภทอุปกรณ์',
                    'route'  => 'product_type.index',
                    'icon' => 'fas fa-fw fa-list',
                    'active'      => ['product_type'],
                    'can'  => ['*','all product_type','view product_type'],
                ],
                [
                    'text' => 'อุปกรณ์',
                    'route'  => 'product.index',
                    'icon' => 'fas fa-fw fa-mouse',
                    'active'  => ['product'],
                    'can'  => ['*','all product','view product'],
                ],

            ],
        ],
        [
            'text'    => 'เบิกอุปกรณ์สำนักงาน',
            'icon'    => 'fas fa-fw fa-box-open',
            'route'  => 'disbursement.index',
            'active'      => ['*disbursement/index*', '*disbursement/create*', '*disbursement/edit*'],
            'can'  => ['*','all disbursement','view disbursement'],
        ],
        [
            'text' => 'อนุมัติการเบิกอุปกรณ์สำนักงาน',
            'route'  => 'disbursement_admin.index',
            'icon' => 'fas fa-fw fa-chart-area',
            'active'      => ['*disbursement_admin*'],
            'can'  => ['*', 'disbursement_detail'],
        ],
        [
            'text'    => 'การตั้งค่าผู้ใช้งาน',
            'icon'    => 'fas fa-fw fa-users-cog',
            'can'  => ['*', 'all user', 'view user', 'all role', 'view role', 'all permission', 'view permission'],
            'submenu' => [
                [
                    'text' => 'จัดการผู้ใช้งาน',
                    'route'  => 'user.index',
                    'icon' => 'fas fa-fw fa-user',
                    'active'      => ['user'],
                    'can'  => ['*', 'all user', 'view user'],
                ],
                [
                    'text' => 'บทบาท',
                    'icon' => 'fa-solid fa-user-shield',
                    'route'  => 'role.index',
                    'active'      => ['*role*'],
                    'can'  => ['*', 'all role', 'view role'],
                ],
                [
                    'text' => 'สิทธิ์การใช้งาน',
                    'icon' => 'fa-solid fa-user-check',
                    'route'  => 'permission.index',
                    'active'      => ['*permission*'],
                    'can'  => ['*', 'all permission', 'view permission'],
                ],
            ],
        ],
        [
            'text' => 'ตั้งค่าเว็บไซต์',
            'icon' => 'fas fa-fw fa-globe',
            'route' => 'setting.index',
            'can' => ['*']
        ],
        [
            'text'    => 'ประวัติผู้ใช้งาน',
            'icon'    => 'fas fa-fw fa-history',
            'route'  => 'user_history.index',
            'active'      => ['user_history'],
            'can'  => ['*', 'all user_history', 'view user_history'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js'
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css'
                ],
                //pdfmake
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'
                ],
                //vfs_font
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'
                ]
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Dropzone' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/dropzone/dropzone.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/dropzone/dropzone.css',
                ],
            ],
        ],
        'FontAwesomeV5' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'fontawesome/css/fontawesome.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'fontawesome/css/brands.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'fontawesome/css/solid.css',
                ],
            ],
        ],
        'SummerNote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/summernote/summernote-bs4.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/summernote/plugin/tam-emoji/css/emoji.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/summernote/summernote-bs4.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/summernote/plugin/tam-emoji/js/config.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/summernote/plugin/tam-emoji/js/tam-emoji.min.js',
                ],
            ],
        ],
        'CKEditor' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/ckeditorV5/build/ckeditor.js',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/chart.js',
                ],
            ],
        ],
        'MomentJs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js',
                ],
            ],
        ],
        'JqueryPlugins' => [
            'active' => true,
            'files' => [
                //InputMasks
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js'
                ],
                //progressbar
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.min.js'
                ],
                //Date Range Picker
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'
                ],
                //Flat Picker
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/flatpickr'
                ],
                // iCheck
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css'
                ],
            ]
        ],
        'JqueryUI' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js',
                ],
                //Cupertino Theme
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//code.jquery.com/ui/1.13.2/themes/cupertino/jquery-ui.css'
                ]
            ],
        ],
        'ZebraDatePicker' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js'
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/bootstrap/zebra_datepicker.min.css',
                ],
            ],
        ],
        'ekko-lightbox' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css',
                ],
            ],
        ],
        'jsTree' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js',
                ],
            ],
        ],
        'SortableJs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'CustomFileInput' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js',
                ],
            ],
        ],
        'Duallistbox' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/jquery.bootstrap-duallistbox.min.js',
                ],
            ],
        ],
        'Toastr' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',
                ],
            ],
        ],
        'Thailand' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/jquery.Thailand.js/dependencies/JQL.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/jquery.Thailand.js/dependencies/typeahead.bundle.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'plugins/jquery.Thailand.js/dist/jquery.Thailand.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'plugins/jquery.Thailand.js/dist/jquery.Thailand.min.js',
                ],
            ],
        ],
        'BootstrapSwitch' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css',
                ],

            ],
        ],
        'Leaflet' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//unpkg.com/leaflet@1.9.4/dist/leaflet.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//unpkg.com/leaflet@1.9.4/dist/leaflet.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];