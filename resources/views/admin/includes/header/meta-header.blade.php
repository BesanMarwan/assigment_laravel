<head><base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('assets/admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    @if (App::getLocale() == 'en')
        <link href="{{asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
{{--        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">--}}

        <style>
            *{
                direction:rtl;
            }
        </style>
    @endif

    @toastr_css

    <link rel="shortcut icon" href="{{asset('assets/admin/media/logos/favicon.ico')}}" />
</head>
