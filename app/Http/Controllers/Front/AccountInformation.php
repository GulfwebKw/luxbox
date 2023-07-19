<?php

namespace App\Http\Controllers\Front;

use App\Package;
use App\PackageInvoice;
use App\Settings;
use App\TitleAndImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use Illuminate\Support\Facades\Auth;

class AccountInformation extends Controller
{
 

    public function index()
    {

        $setting = Settings::where("keyname", "setting")->first();
//        $packages = Package::doesntHave('invoice')->where(['member_id'=> Auth::id()])->get();
        $packages = Package::query()->where(['member_id'=> Auth::id()])->where('created_at' , '>' , Carbon::now()->subMonths(6))->latest()->get();
        return view('member.my-account',compact( 'setting', 'packages'));
    }

    public function acountInformation()
    {
//        $about=About::first();
//        $header=TitleAndImage::first();
//        $setting=Settings::find(1);
        $setting = Settings::where("keyname", "setting")->first();
        $user = Auth::guard('member')->user();
        return view('member.account-information',compact('user', 'setting'));
    }

    public function shippedPackages()
    {
        $setting = Settings::where("keyname", "setting")->first();
        $packages = Package::with('invoice')->where('invoice_id', '!=', null)->where('member_id', Auth::id())->get();
        return view('member.shipped-packages',compact('packages', 'setting'));
    }

    public function viewOrder($id)
    {
        $setting = Settings::where("keyname", "setting")->first();
        $package = Package::with('invoice')->where('invoice_id', '!=', null)->where('member_id', Auth::id())->find($id);
        return view('member.view-order',compact('package', 'setting'));
    }

    public function invoices()
    {
        $setting = Settings::where("keyname", "setting")->first();
        $invoices = PackageInvoice::with('package')->whereHas('package', function ($q){
            $q->where('member_id', Auth::id());
        })->get();
        return view('member.invoices',compact('invoices', 'setting'));
    }

    public function showInvoices($id)
    {
        $headTitle = '';
        $setting = Settings::where("keyname", "setting")->first();
        $invoice = PackageInvoice::find($id);
        $package = PackageInvoice::find($id)->package;
        $user = Auth::user();
        return view('member.showInvoices',compact('invoice', 'user', 'package', 'setting'));
    }
}
