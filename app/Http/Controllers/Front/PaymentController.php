<?php

namespace App\Http\Controllers\Front;

use App\PackageInvoice;
use App\Payment;
use App\Services\Tahseeel;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $title = __("Thank You");
        $user = Auth::user();
        try {
            $invoice = PackageInvoice::find($request->id);
            $payment = Payment::create(['order' => $invoice->package->order, 'package_id' => $invoice->package_id, 'invoice_id' => $request->id, 'member_id' => $user->id, 'price' => $invoice->shipping_cost, 'status' => 'pending', 'payment_type' => $invoice->payment_method, 'transaction_id' => 1000 + Payment::count()]);
            $tahseel = new Tahseeel('live');
            $url = $tahseel->processing($invoice->shipping_cost, '0', $user->fullname, $user->email, $payment->id, 0);
            return Redirect::to($url);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function PaymentResponse(Request $request)
    {
        $payment = new Tahseeel('live');
        $payment = $payment->orderInfo($request->order_id, $request->hash);
        $setting = Settings::where("keyname", "setting")->first();
        $res = $payment['TxInfo'];
        if (count($payment['TxInfo']) > 0 && $res['Result'] == 'CAPTURED') {
            $title = __("Thank You");
            $status = __("Success");
            $p = Payment::find($payment['order_no']);
            $p->update(['hash' => $payment['hash'], 'inv_no' => $payment['inv_id'], 'payment_mode' => $res['type'], 'result' => $res['Result'], 'status' => 'paid', 'transaction_id' => $res['TranID'], 'refrence_id' => $res['Ref'], 'payment_id' => $res['PaymentID']]);
            $invoice = $p->invoice;
            $invoice->update(['status' => 'paid']);
                return view('member.returnInvoice', compact('p', 'setting'));

        } else {
            $title = __("ERROR");
            $status = __("NOT PAID");
            $p = Payment::find($payment['order_no']);
            $p->update(['hash' => $payment['hash'], 'inv_no' => $payment['inv_id'], 'payment_mode' => 'KNET', 'result' => 'NOT CAPTURED', 'status' => 'failed', 'transaction_id' => '', 'refrence_id' => '', 'payment_id' => '']);
            $invoice = $p->invoice;
            return view('member.returnInvoice', compact('p', 'setting'));
        }
    }

    public function PaymentReturn()
    {


    }
}
