@extends('layouts.default')
@section('content')








<style>
    .rightside-event {
        margin-right: 0px;

    }


    .btn-buy-now {
        display: none;
    }



    .deznav .copyright {
        font-size: 16px;
        padding: 0 20px;
        color: #000;
        margin-top: 14rem;
        margin-bottom: 40px;
    }



    .welcome-card img {
        right: 45px;
        top: -45px;
        /* bottom: 3rem; */
    }

    .deznav .metismenu .has-arrow[aria-expanded=true]:after,
    .deznav .metismenu .mm-active>.has-arrow:after {
        width: 0.5rem;
        height: 0.5rem;
        right: 1.875rem;
        top: 48%;
        border-color: inherit;
        -webkit-transform: rotate(-225deg) translateY(-50%);
        transform: rotate(-225deg) translateY(-50%);
    }


    .deznav .metismenu {
        display: flex;
        flex-direction: column;
        margin-top: 35px;
    }


    .btn-test-api {
        background-color: #eeeffc;
        border-color: #eeeffc;
        border: none;
        color: #222fb9;
        padding: 1rem 4rem;
        font-size: 20px;
        font-weight: 500;
    }

    .card-body-testAPI {
        padding: 1.875rem;
        text-align: center;
    }

    .btn-test-api:hover {
        background-color: #eeeffc;
        border-color: #eeeffc;
        color: #222fb9;
        border: none;
    }


    .testapi-header {
        font-weight: 700;
        font-size: 30px;
        text-transform: uppercase;
    }


    @media only screen and (max-width: 1600px) {
        .content-body {
            margin-left: 17rem;
        }
    }


    @media (min-width: 1200px) {
        .container {
            max-width: 1400px;
        }
    }
</style>














<!--*******************
        Preloader start
    ********************-->
<!-- <div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div> -->
<!--*******************
        Preloader end
    ********************-->

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header" style="border-right: solid #222fb9 3px;">
        <a href="{{ route('index') }}" class="brand-logo">
            <img src="public/images/hinge-logo.jpg" class="logo-img" alt="" width="100%">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->


    <!--**********************************
            Chat box End
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Dashboard </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <div class="search_bar dropdown show">
                                <div class="dropdown-menu p-0 m-0 show">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search Here" aria-label="Search">
                                    </form>
                                </div>
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.7871 22.7761L17.9548 16.9437C19.5193 15.145 20.4665 12.7982 20.4665 10.2333C20.4665 4.58714 15.8741 0 10.2333 0C4.58714 0 0 4.59246 0 10.2333C0 15.8741 4.59246 20.4665 10.2333 20.4665C12.7982 20.4665 15.145 19.5193 16.9437 17.9548L22.7761 23.7871C22.9144 23.9255 23.1007 24 23.2816 24C23.4625 24 23.6488 23.9308 23.7871 23.7871C24.0639 23.5104 24.0639 23.0528 23.7871 22.7761ZM1.43149 10.2333C1.43149 5.38004 5.38004 1.43681 10.2279 1.43681C15.0812 1.43681 19.0244 5.38537 19.0244 10.2333C19.0244 15.0812 15.0812 19.035 10.2279 19.035C5.38004 19.035 1.43149 15.0865 1.43149 10.2333Z" fill="#A4A4A4"></path>
                                    </svg>
                                </span>
                            </div>
                        </li>


                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="public/images/profile/pic1.jpg" width="20" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">


                                <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <!--**********************************
            Sidebar start
***********************************-->

    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">


                <li><a class="has-arrow ai-icon" href="{{ route('transactions') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Transactions</span>
                    </a>

                </li>
                <br>

                <li><a class="has-arrow ai-icon" href="{{ route('payment_table') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Payments Table</span>
                    </a>

                </li>
                <br>

                <li><a class="has-arrow ai-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="flaticon-381-controls-3"></i>
                        <span class="nav-text">Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>


            <div class="copyright">
                <p> © 2022 Fbn Insurance Test</p>

            </div>
        </div>
    </div>

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            EventList
        ***********************************-->


    <!--**********************************
            Sidebar end
        ***********************************-->



    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body rightside-event">
        <!-- row -->
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12" style="margin-bottom: 3rem;">
                    <div class="welcome-card rounded pl-5 pt-5 pb-4 mt-3 position-relative mb-5 welcome-speech">
                        <h4 class="text-warning" style="color:#222fb9">Welcome to First Bank Insuranace</h4>
                        <p>This dashboard shows all your payment transactions. <br> You can also download copies of your transactions in different formats</p>

                        <img src="public/images/svg/welcom-card.svg" alt="" class="position-absolute">
                    </div>
                </div>


            </div>


        </div>



        <div class="container mt-5">
            <h2 class="mb-4">All Payment Transactions</h2>
            <table class="table table-bordered yajra-datatable" id="dt-table">
                <thead>
                    <tr>
                        <th>Product Purchased</th>
                        <th>Amount Paid</th>
                        <th>Date of Payment</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>








    <!-- Datatable init js -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/pages/datatables.init.js') }}"></script>


    <script src="{{ asset('public/js/plugins-init/jquery.min.js') }}"></script>

    <script>
        
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });



            var table = $("#dt-table").DataTable({
                processing: true,
                serverSide: true,
                dom: 'Blfrtip',
                buttons: ['csv', 'excel', 'pdf'],
                ajax: " {{ route('transactions.list') }}",
                
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                columns: [

                    {
                        data: "product",
                        name: "product",
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css("text-transform", "sorting_1");
                        }
                    },

                    {
                        data: "amount_paid",
                        name: "amount_paid",
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css("text-transform", "sorting_1");
                        }
                    },




                    {
                        data: "date_of_Payment",
                        name: "date_of_Payment",
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css("text-transform", "center");
                        },
                    }
                ]
            });




            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        });
    </script>




    @stop