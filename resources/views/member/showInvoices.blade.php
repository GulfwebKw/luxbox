@extends('front.layouts.master')
@section('css')
    <style>
        @media print {
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

@stop
@section('content')
    @include('front.partials.preloader')
    <div class="col-md-12">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-10 offset-md-1 offset-sm-1 offset-xs-1">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                            <div class="receipt-right">
                                <h5>Customer Name </h5>
                                <p><b>Name :</b> {{$user->fullname}}</p>
                                <p><b>Mobile :</b> {{$user->mobile}}</p>
                                <p><b>Email :</b> {{$user->email}}</p>
                                <p><b>Address :</b> {{$user->getAddress()}}</p>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                            <div class="receipt-right pb-4">
                                <h5>Invoice Details </h5>
                                <p><b>booking date :</b> {{$invoice->created_at}}</p>
                                <p><b>Payment Method :</b> {{$invoice->payment_method}}</p>
                                <p><b>Shipping Cost :</b> {{$invoice->shipping_cost}}</p>
                                <p><b>Status :</b> {{$invoice->status}}</p>
                            </div>
                        </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order</th>
                            <th>Image</th>
                            <th>Package Type</th>
                            <th>Shipping Method</th>
                            <th>Weight</th>
                            <th>Good Value</th>
                            <th>Original Track Id</th>
                            <th>Boxes Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>{{'# '.$package->order}}</td>
                           <td><img width="60" src="{{'/uploads/packages/'.$package->image}}" alt=""></td>
                           <td>{{$package->package_type}}</td>
                           <td>{{$package->shipping_method}}</td>
                           <td>{{$package->weight . ' '. $package->weight_type}}</td>
                           <td>{{$package->goods_value}}</td>
                           <td>{{$package->original_track_id}}</td>
                           <td>{{$package->boxes_count}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="card-footer">
        <button class="btn btn-primary" onclick="history.back()">Back</button>
        <button class="btn btn-warning" onclick="window.print()">Print</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection







