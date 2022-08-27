@extends('layouts.front')

@section('header')
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
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="from">From Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="from" type="text" name="from" value="{{request('from') ?? null}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="to">To Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="to" type="text" name="to" value="{{request('to') ?? null}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="btn-group mt-2 mb-2">
                                    <button type="button" class="btn btn-pill btn-primary" data-toggle="dropdown">Export</button>
                                    <button type="button" class="btn btn-pill btn-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(64px, 33px, 0px);">
                                        <li><a href="javascript:void(0)" onclick="exportFilter('excel')">Excel</a></li>
                                        <li><a href="javascript:void(0)" onclick="exportFilter('pdf')">PDF</a></li>
                                    </ul>
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
                            <tbody>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->ref}}</td>
                                    <td>{{$transaction->product->name}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->created_at->format('d/m/Y')}}</td>
                                    <td><a href="{{route('user.transaction.show', $transaction->uid)}}" target="_blank">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(!$transactions->count())
                        <p class="text-center mt-4">No records found</p>
                        @endif
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
            $('#from, #to').datepicker();
        });

        function exportFilter(type)
        {
            window.location = "export/"+type+"/{{$from}}/to/{{$to}}/";
        }
    </script>

@endsection
