<?php

namespace App\Http\Controllers\Front;

use App\PackageInvoice;
use App\Payment;
use App\Services\Tahseeel;
use App\Settings;
use App\TitleAndImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $title = __("Thank You");
        $user = Auth::user();
        try {
            $invoice = PackageInvoice::find($request->id);
//            $payment = Payment::create(['order' => $invoice->package->order, 'package_id' => $invoice->package_id, 'invoice_id' => $request->id, 'member_id' => $user->id, 'price' => $invoice->shipping_cost, 'status' => 'pending', 'payment_type' => $invoice->payment_method, 'transaction_id' => 1000 + Payment::count()]);
//            $tahseel = new Tahseeel('live');
//            $url = $tahseel->processing($invoice->shipping_cost, '0', $user->fullname, $user->email, $payment->id, 0);
//            return Redirect::to($url);

            $header = TitleAndImage::first();
            $setting = Settings::find(1);
            $package = $invoice->package;
            return view('member.stripe', compact('header', 'setting' , 'package'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function pay(Request $request)
    {
        try {
            $user = Auth::user();
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY', '-'));
            $invoice = PackageInvoice::find($request->id);
            $payment = Payment::create(['order' => $invoice->package->order, 'package_id' => $invoice->package_id, 'invoice_id' => $request->id, 'member_id' => $user->id, 'price' => $invoice->shipping_cost, 'status' => 'pending', 'payment_type' => $invoice->payment_method, 'transaction_id' => 1000 + Payment::count()]);

            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->input('card_number'),
                    'exp_month' => $request->input('expiry_date_month'),
                    'exp_year' => $request->input('expiry_date_year'),
                    'cvc' => $request->input('cvv'),
                ],
            ]);

            $charge = $stripe->charges->create([
                'amount' => ((float)$invoice->shipping_cost) * 100, // Replace with the actual invoice amount
                'currency' => 'usd', // Replace with the actual currency
                'source' => $token,
                'description' => 'Payment for Invoice Num.' . $request->id, // Replace with the actual description
            ]);

            // Handle the payment success or failure
            if ($charge->status === 'succeeded') {
                $payment->update(['payment_mode' => 'Stripe', 'result' => 'success', 'status' => 'paid', 'transaction_id' => $charge->id, 'refrence_id' => '', 'payment_id' => '']);
                $invoice->update(['status' => 'paid']);
                // Payment successful
                $toast = Toastr::success('Payment successful.');
                $package = $invoice->package;
                Mail::send('emails.paySuccess', compact('charge' , 'invoice' , 'package'), function($message) use($user){
                    $message->to($user->email);
                    $message->subject('Payment Success');
                });
                return redirect()->route('invoices')->with($toast);
            } else {
                $payment->update(['payment_mode' => 'Stripe', 'result' => 'NOT CAPTURED', 'status' => 'failed', 'transaction_id' => '', 'refrence_id' => '', 'payment_id' => '']);
                // Payment failed
                $toast = Toastr::error('Payment failed. Please try again.');
                return redirect()->route('invoices')->with($toast);
            }
        } catch (\Exception $e) {
            Log::error('payment error ' . $e->getMessage(), [$e->getFile(), $e->getLine()]);
            $toast = Toastr::error('Payment failed. Please try again.');
            return redirect()->route('invoices')->with($toast);
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
