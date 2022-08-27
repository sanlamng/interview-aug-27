<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Transactions | Dashboard</title>

<meta name="description" content="Some description for the page" />
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">
<link href="public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link href="public/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet" type="text/css" />
<link href="public/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css" />
<link href="public/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet" type="text/css" />
<link href="public/css/style.css" rel="stylesheet" type="text/css" />
<!-- <link href="public/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/> -->



<!-- DataTables -->
<link href="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />




<style>
    .dz-demo-panel {
        display: none;
    }


    .sidebar-right {
        display: none;
    }



    div.dt-buttons{
        margin-bottom:1rem;
    }


    .dt-button{
        padding: 5px 10px;
        border-radius: 15px;
        margin-left:10px ;
    }
</style>