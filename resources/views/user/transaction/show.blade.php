@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <a class="header-brand" href="{{route('user.dashboard')}}"><i class="mdi mdi-bank" style="font-size: 1.6em;"></i> {{strtoupper(config('nt_config.company_name'))}}</a>
                        <div class="text-right ml-auto">
                            <h2 class="mb-1">{{$transaction->ref}}</h2>
                            <p class="mb-1"><span class="font-weight-semibold">Invoice Date :</span> {{$transaction->created_at->format('d/m/Y')}}</p>
                            <p><span class="font-weight-semibold">Payment Date :</span> {{$transaction->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="h3">{{$transaction->user->name}}</p>
                            <address>{{$transaction->user->phone}}<br>{{$transaction->user->email}}</address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table- table-hover mb-0">
                            <tbody>
                                <tr class="thead-dark">
                                    <th>Product</th>
                                    <th class="text-right">Amount Paid</th>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">{{$transaction->product->name}}</td>
                                    <td class="font-weight-bold text-right">{{$transaction->amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-danger btn-sm" href="{{route('user.transaction.pdf', $transaction->uid)}}"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
