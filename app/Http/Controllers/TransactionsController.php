<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TransactionsController extends Controller
{
    public function transactions(Request $request)
    {
        //
        $customer_id = Auth::user()->id;
    

        $transactions = Transactions::where('user_id', $customer_id)->get();
        return view('pages.transactions')->with(compact('transactions'));
    }


    public function payment_table()
    {
        //
        $customer_id = Auth::user()->id;
    

        $transactions = Transactions::where('user_id', $customer_id)->get();
        return view('pages.payment_table')->with(compact('transactions'));
    }





    public function getTransactions(Request $request)
    {

        $customer_id = Auth::user()->id;
        $transaction_data = Transactions::where('user_id', $customer_id)->latest()->get();

        if ($request->ajax()) {
            return DataTables::of($transaction_data)
                ->addIndexColumn()
                
                ->make(true);
        }
    }










}
