<table cellpadding="12">
    <tr>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="9">
                    {{$page['description']}}
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    CONSIGNEE:
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    SHIPPER:
                </td>
            </tr>
        </table>
    </tr>
    <tr>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>To</td>
                <td></td>
                <td>Run</td>
                <td></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{date('d/m/Y')}}</td>
                <td>HAWB No.</td>
                <td></td>
            </tr>
            <tr>
                <td>Bags</td>
                <td>{{$packages->count()}}</td>
                <td>Flight No.</td>
                <td></td>
            </tr>
        </table>
    </tr>
    <tr>
        <table class="border-top" cellpadding="0" cellspacing="0">
            <tr>
                <td class="width50 border-bottom border-right caln medtext">S/N</td>
                <td class="width50 border-bottom border-right caln medtext">PRODUCT NAME</td>
                <td class="border-bottom border-right caln medtext">TOTAL WEIGHT CHARGED</td>
            </tr>
        </table>
    </tr>
    <tr>
        <table cellspacing="0" cellpadding="0">
            @foreach($transactions as $key => $transaction)
                <tr>
                    <td class="width10 border-right border-bottom">{{++$key.'.'}}</td>
                    <td class="width10 border-right border-bottom">{{$transaction->product->name}}</td>
                    <td class="width5 border-right border-bottom">{{$transaction->amount_paid}}</td>
                </tr>
            @endforeach
        </table>
    </tr>
</table>

