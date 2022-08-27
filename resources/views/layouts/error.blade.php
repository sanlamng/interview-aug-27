<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Title -->
    <title>{{$page ." | ".config('nt_config.company_name')}}</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />
    <!--Style css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr-master/build/toastr.min.css')}}">
</head>
<body class="bg-account">
<!-- page -->
<div class="page">
    <!-- page-content -->
    <div class="page-content">
        @yield('content')
    </div>
    <!-- page-content end -->
</div>
<!-- page End-->
<!-- Jquery js-->
<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<!--Bootstrap.min js-->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr-master/build/toastr.min.js')}}"></script>
<script>
    $(function(){

        let toastOptions = {
            timeOut: 0,
            extendedTimeOut: 0,
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "5000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: true,
            closeHtml: '<i class="la la-close"></i>'
        };
        @if($errors->any())

            let error_msg = `
                <ul>
                @foreach($errors->all() as $error)
                    <li class="list-item">{{$error}}</li>
                @endforeach
                </ul>
            `;

            toastr.warning(error_msg, "ERROR!", toastOptions);

        @endif

        @if(session()->has('status'))

            let status_msg = "{{session()->get('status')}}";

            toastr.success(status_msg, "SUCCESS!", toastOptions);

        @endif
    });
</script>
</body>
</html>
