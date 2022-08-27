<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        <?php echo e('Inv_'.$transaction->serial_number); ?>

    </title>
    <style media="all">
        @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
        body
        {
            font-family: Arial, Verdana, Helvetica, sans-serif; /*font-weight:bold;*/ /*font-family: 'Bree Serif', serif;*/
            font-size: 14px;
        }
        .dvmain
        {
            display: table;
            margin: 0 auto;
            padding: 0;
            width: 100%;
            max-width: 1250px;
            height: 100%;
        }
        .recdet
        {
            font-weight: bold;
            font-size: 12px;
        }
        table
        {
            width: 100%;
        }

        table td
        {
            padding: 0.3% 0.3%;
            vertical-align: top;
        }

        .tablemain
        {
            width: 100%;
            border: 2px solid black;
        }
        .row1
        {
            border-bottom: 2px;
        }
        .border-right
        {
            border-right: 1px solid black;
        }
        .border-bottom
        {
            border-bottom: 1px solid black;
        }
        .border-top
        {
            border-top: 1px solid black;
        }
        .width80
        {
            width: 80%;
        }
        .width20
        {
            width: 20%;
        }
        .width70
        {
            width: 70%;
        }
        .width30
        {
            width: 30%;
        }
        .width50
        {
            width: 50%;
        }
        .shorttext
        {
            display: block;
            font-size: 0.5em;
        }
        .medtext
        {
            font-size: 1.4em;
        }
        .rectext
        {
            font-size: 1.1em;
        }
        .raln
        {
            text-align: right;
        }
        .caln
        {
            text-align: center;
        }
        .shorttext1
        {
            font-size: 0.8em;
        }
        .largetext
        {
            font-size: 2.0em;
        }
    </style>
    <style media="screen">
        .dvmain
        {
            margin: 0 auto 18px auto;
        }
    </style>
    <style media="print">
        .print-button
        {
            display: none;
            visibility: hidden;
        }

        .dvmain:last-child
        {
            page-break-after: auto;
        }

        @page
        {
            margin: 0mm 2mm 2mm 2mm;
            padding: 0;
        }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" class="">
    <tr>
        <td><h1 style="color: #0f0f0f;">TRANSACTION INVOICE</h1></td>
    </tr>
    <tr>
        <td>
            <?php echo e($transaction->user->name); ?> <br>
            <?php echo e($transaction->user->email); ?><br>
            <?php echo e($transaction->user->phone); ?> <br>
        </td>
        <td class="width50">
            Date: <?php echo e($transaction->created_at->format('d/m/Y')); ?><br>
            INVOICE: <?php echo e($transaction->ref); ?>

        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" class="tablemain" style="margin-top: 50px;">
    <thead>
        <tr style="background-color: #0f0f0f; color: #ffffff;">
            <td class="border-bottom border-right width70">
                Product Name
            </td>
            <td class="border-bottom width30">
                Amount Paid
            </td>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td class="border-top border-right width70"><?php echo e($transaction->product->name); ?></td>
        <td class="border-top width30"><?php echo e($transaction->amount); ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fnbi\resources\views/user/transaction/pdf.blade.php ENDPATH**/ ?>