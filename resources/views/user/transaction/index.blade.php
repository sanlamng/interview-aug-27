@extends('layouts.front')

@section('header')
    @include('layouts.styles.datatables')
    <!--Daterangepicker css-->
    <link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
@endsection

@section('content')
	<!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p>Filter Transaction by Date</p>
                    <form id="filterForm" action="{{route('user.transaction.filter')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group  col-md-4 col-xs-12">
                                <label for="from">From Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="from" type="text" name="from" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="to">To Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="to" type="text" name="to" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
	                    <table class="table table-striped card-table text-nowrap">
	                        <thead class="thead-dark">
	                            <tr>
	                            	<th>Ref.</th>
	                                <th>Product</th>
                                    <th>Amount</th>
	                                <th>ENTRY</th>
                                    <th></th>
	                            </tr>
	                        </thead>
	                    </table>
	                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row End-->
@endsection

@section('footer')

    @include('layouts.scripts.datatables')

    <!--Moment js-->
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <!-- Daterangepicker js-->
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{route('user.transaction.index')}}',
                order: [3, 'asc'],
                columns: [
                    {data: 'uid', name: 'uid'},
                    {data: 'product_id', name: 'product_id'},
                    {data: 'amount_paid', name: 'amount_paid'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                ],
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [4]
                    }
                ]
            });

            $('#from, #to').datepicker();
        });

        function exportFilter(type)
        {
            let url_segment = window.location.href.split('/');
            let filter = url_segment[url_segment.length-1];
            let sorter = filter.replace('manifests', '');
            window.location = url+sorter;
        }

        function isNotEmpty(elm){
            if(elm.val() === ''){
                elm.css('border-color', 'red');
                return false;
            }
            return true;
        }
    </script>

@endsection
