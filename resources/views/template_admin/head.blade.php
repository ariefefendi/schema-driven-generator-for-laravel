<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Content Management</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/icons/smartroute-logo.png') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/aos/dist/aos.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.css?v=1.0.0" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/rtl.min.css" />
    
    <!--icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- underscrore -->
    <script type="text/javascript" src="{{ url('/') }}/assetsadmin/js/underscore.js"></script>
    <!-- jquery -->
    <script src="{{ url('/') }}/assetsadmin/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/assetsadmin/js/jquery_v3.6.0.min.js"></script>

    <!-- knockout -->
    <script src="{{ url('/') }}/assetsadmin/knockout/knockout_3.4.2.js"></script>
    <script src="{{ url('/') }}/assetsadmin/knockout/knockout.mapping-latest.js"></script>
    <script src="{{ url('/') }}/assetsadmin/knockout/knockout-file-bindings.js"></script>
    <link href="{{ url('/') }}/assetsadmin/knockout/knockout-file-bindings.css">


    <!-- Library Bundle Script -->
    <script src="{{ url('/') }}/assets/js/core/libs.min.js"></script>

    <!-- token input -->
    <script src="{{ url('/') }}/assetsadmin/token_input/jquery.tokeninput.js"></script>
    <link href="{{ url('/') }}/assetsadmin/token_input/token-input.css" rel="stylesheet">
    <link href="{{ url('/') }}/assetsadmin/token_input/token-input-facebook.css" rel="stylesheet">

    <!-- alert -->
    <link href="{{ url('/') }}/assetsadmin/alert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="{{ url('/') }}/assetsadmin/alert/sweetalert.min.js"></script>

    <script src="{{ url('/') }}/assetsadmin/js/generatepass.js"></script>

    <!-- moment js for date format -->
    <script src="https://aplikasi.whusnet.com/assetsadmin/js/moment.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Edito -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <script src="{{ url('/') }}/assetsadmin/js/quill-editor-knockout-binding.js"></script>
    
   
    


    <script>
        window.appPrefix = "{{ auth()->user()->role->name }}";

        var model = {
            Processing: ko.observable(true),
            ProcessingContent: ko.observable(false),
            checkPass: ko.observable(false),
            CheckId: ko.observable(false),
            changeRupiah: ko.observable(''),
            URI_PAGE: 4, // setup uri access on pages.
            CheckValue: ko.observable(false),
            errorMessage: ko.observable('This field is required!'),
            notAllowedMessage: ko.observable('Email Not Allowed!'),
            acceptMessage: ko.observable('Email is allowed.'),
            giftWrap: ko.observable(true),
            role: getFirstPrefix(),
        }

        model.changeRupiah = function(value) {
            var number_string = value.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
                rupiah = 'Rp ' + rupiah;
            }
            return rupiah;
            // Cetak hasil
            // document.write(rupiah); // Hasil: r23.456.789
        }
        
        
        
        function getFirstPrefix() {
            var path = window.location.pathname;
            var parts = path.split('/').filter(Boolean);
            return parts.length ? '/' + parts[0] : '';
        }

    </script>



</head>

<body class="light theme-default theme-with-animation card-default theme-color-default">
    <!-- loader Start --> 
    <div class="preloader" style="background-color: white; opacity: 0.4;" data-bind='visible: model.Processing' >
        <div class="loading text-center">
            <div class="loader-body">
                <img src="{{ asset('assets/images/loading-02.webp') }}" alt="loader" class="light-loader img-fluid w-50" width="200" height="200">
            </div>
        </div>
    </div>

    <script>
        model.Resource = {
            logout: 'url-logout',
            /* isikan value dari rootingnya  (url dengan uri = 1)*/
            notif: 'Anda yakin? Anda Akan ',
        }
    </script>
    
    
    
    
    
<style>
    .preloader {
        position: fixed;        /* supaya overlay seluruh layar */
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        /*background-color: #f6f6f6 !important;*/
        background-color: rgb(8 48 67) !important;
        
        display: flex;
        justify-content: center; /* center horizontal */
        align-items: center;     /* center vertical */
        
        z-index: 9999;           /* pastikan paling depan */
        
        transition: opacity 0.3s ease;
    }
</style>