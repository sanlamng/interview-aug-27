<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        $page['title'] = "Transactions";
        $page['description'] = "History";

        //Get all customers transaction from the database
        if(request()->ajax()){
            return DataTables::of(Transaction::whereUserId(auth()->id())->get())
                ->addColumn('uid', function ($transaction) {
                    return '<a href="'.route('user.transaction.show', $transaction->uid).'" target="_blank">'.$transaction->uid.'</a>';
                })
                ->editColumn('product_id', function ($transaction) {
                    return $transaction->product->name;
                })
                ->editColumn('amount_paid', function ($transaction) {
                    return $transaction->amount;
                })
                ->editColumn('created_at', function ($transaction) {
                    return $transaction->created_at->format('d/m/Y');
                })
                ->addColumn('action', function ($transaction) {
                    return '<a href="'.route('user.transaction.show', $transaction->uid).'" target="_blank">View</a>';
                })
                ->rawColumns(['uid', 'action'])
                ->only(['uid', 'product_id', 'amount_paid', 'created_at', 'action'])
                ->toJson();
        }
        return view('user.transaction.index', compact('page'));
    }

    public function show($uid)
    {
        $page['title'] = "Transactions";
        $page['description'] = $uid;
        $transaction = Transaction::whereUid($uid)->whereUserId(auth()->id())->firstOrFail();
        return view('user.transaction.show',  compact('page', 'transaction'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);
        $page['title'] = "Transactions";
        $page['description'] = "From ".$request->input('from')." To ".$request->input('from');
        $from = Carbon::parse($request->input('from'))->format('Y-m-d');
        $to = Carbon::parse($request->input('to'))->format('Y-m-d');
        $transactions = Transaction::whereUserId(auth()->id())->where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id','desc')->get();
        return view('user.transaction.filter', compact('page', 'transactions', 'from', 'to'));
    }

    public function exportTransaction($type, $_from, $_to)
    {
        $from = Carbon::parse($_from)->format('Y-m-d');
        $to = Carbon::parse($_to)->format('Y-m-d');

        $transactions = Transaction::whereUserId(auth()->id())->where('created_at', '>=', $from)->where('created_at', '<=', $to)->orderBy('id','desc')->get();
        if($type == 'excel'){
            return redirect(route('user.transaction.index'))->withErrors('Not implemented');
        }
        $dompdf = new Dompdf();
        // Load content from html file
        $html = view('user.transaction.exportPDF', compact('transactions', 'from', 'to'));
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream('Transactions_from_'.$from.'_to_'.$to, array("Attachment" => 1));
    }

    public function downloadPDF($uid)
    {
        $transaction = Transaction::whereUid($uid)->whereUserId(auth()->id())->firstOrFail();
        $dompdf = new Dompdf();
        // Load content from html file
        $html = view('user.transaction.pdf', compact('transaction'));
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream('Transaction_'.$transaction->ref, array("Attachment" => 1));
        return;
    }
}
