<?php $__env->startSection('css'); ?>
    <style>
        ul{
            display: flex;
            flex-direction: column;
        }
        ul li{
            font-size: 20px;
            display: inline-flex;
        }
        ul li b{
            width: 200px;
        }
        @media  print {
            .btn {
                display: none;
            }
        }
        body {
            background: #eee;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-md-12">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-10 offset-md-1 offset-sm-1 offset-xs-1">




















                <div>


























                    <ul>
                        <li><b>Order: </b> <span><?php echo e('# '.$p->order); ?></span></li>
                        <li><b>Reference Id: </b> <span><?php echo e($p->refrence_id); ?></span></li>
                        <li><b>Transaction Id: </b> <span><?php echo e($p->transaction_id); ?></span></li>
                        <li><b>Result: </b> <span class="<?php echo e($p->status=='paid'? 'text-success':'text-danger'); ?>"><?php echo e($p->result); ?></span></li>
                        <li><b>Payment Mode: </b> <span><?php echo e($p->payment_mode); ?></span></li>
                        <li><b>Payment Type: </b> <span><?php echo e($p->payment_type); ?></span></li>
                        <li><b>Price: </b> <span><?php echo e($p->price); ?></span></li>
                        <li ><b>Status: </b> <span class="<?php echo e($p->status=='paid'? 'text-success':'text-danger'); ?>"><?php echo e($p->status); ?></span></li>
                    </ul>
                    <div class="card-footer">
        <button class="btn btn-primary" onclick="window.location.href='/invoices'">Go To Invoices</button>
        <button class="btn btn-warning" onclick="window.print()">Print</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>








<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/member/returnInvoice.blade.php ENDPATH**/ ?>