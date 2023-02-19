<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class Tahseeel
{

    private $uid;

    private $secret;

    private $pwd;

    private $url;

    private $responseUrl;

    private $OrderInfo;

    public function __construct($mode)
    {

        $this->setConfig($mode);
    }


    public function processing($order_amt, $delivery_charges, $cust_name, $cust_email, $payment_no, $total_items)
    {
        if (!$order_amt) {
            return response()->json(["message" => __("Amount is missing.")], 200);
        }
        try {
            $client = new Client(); //GuzzleHttp\Client
            $tokenRes = $client->post($this->url, [
                'form_params' => [
                    'uid' => $this->uid,
                    'pwd' => $this->pwd,
                    'secret' => $this->secret,
                    'cust_name' => $cust_name,
                    'cust_email' => $cust_email,
                    'order_amt' => $order_amt,
                    'delivery_charges' => $delivery_charges,
                    'order_no' => $payment_no,
                    'total_items' => 1,
                    'callback_url' => $this->responseUrl,
                    'knet_allowed' => 1,
                    'cc_allowed' => 1,
                ],
            ]);
            if ($tokenRes) {
                $token = json_decode($tokenRes->getBody()->getContents(), true);
                if ($token['error'] == false) {
                    return $token['link'];
                }
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['message' => $e->getMessage(), "paymentUrl" => ""], 400);
        }
    }

    public function orderInfo($INV_Id, $Hash)
    {
        if (!$INV_Id && !$Hash) {
            return response()->json(["message" => __("invoice id or id is missing.")], 200);
        }

        try {
            $client = new Client(); //GuzzleHttp\Client
            $tokenRes = $client->post($this->OrderInfo, [
                'form_params' => [
                    'uid' => $this->uid,
                    'pwd' => $this->pwd,
                    'secret' => $this->secret,
                    'id' => $INV_Id,
                    'hash' => $Hash,
                ],
            ]);

            if ($tokenRes) {
                $token = json_decode($tokenRes->getBody()->getContents(), true);
                if ($token['inv_id']) {
                    return $token;
                }
            }

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), "paymentUrl" => ""], 400);
        }
    }

    public function setConfig($mode)
    {
        $this->responseUrl = config("payment.tahseeel.{$mode}.callback");
        $this->uid = config("payment.tahseeel.{$mode}.uid");
        $this->secret = config("payment.tahseeel.{$mode}.secret");
        $this->pwd = config("payment.tahseeel.{$mode}.pwd");
        $this->url = config("payment.tahseeel.{$mode}.url");
        $this->OrderInfo = config("payment.tahseeel.{$mode}.orderInfo");
    }

}