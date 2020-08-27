<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use Session;
use App\TransactionRequests;
use App\RawPayment;
use Auth;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Payments.Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function PaywithPaypal(){
        session(['Amount'=>300]);
        return view('Pay');
    }
    protected function PaywithMpesa(){
        $Number=Session::get('Number');
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $token=$mpesa::generateSandBoxToken();
        $BusinessShortCode='174379';
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType='CustomerPayBillOnline';
        $Amount=1;
         $PartyA=$Number;
        $PartyB='174379';
        $PhoneNumber=$Number;
        $CallBackURL='https://bb42091fca02.ngrok.io/confirmation';
        $AccountReference=Auth::user()->name." In WritersHub";
        $TransactionDesc='Payment of Assignment to be Done';
        $Remark="final test";
       $stkpush= $mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remark);
        //    $mpesa->finishTransaction();
        $data=json_decode($stkpush,true);
        //save the request into the database case of you are tracing the Transactions
        //Nevre trust the user, this is in 
        $MerchantRequestID=$data['MerchantRequestID'];
        $CheckoutRequestID=$data['CheckoutRequestID'];
        session(['CheckoutRequestID'=>$CheckoutRequestID]);
        $ResponseCode=$data['ResponseCode'];
        $ResponseDescription=$data['ResponseDescription'];
        $CustomerMessage=$data['CustomerMessage'];
        TransactionRequests::create([
            'MerchantRequestID'=>$MerchantRequestID,
            'CheckoutRequestID'=>$CheckoutRequestID,
            'ResponseCode'=>$ResponseCode,
            'ResponseDescription'=>$ResponseDescription,
            'CustomerMessage'=>$CustomerMessage,
        ]);
       return response($data);
    }
    protected function confirmation(Request $request){
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $callbackData=$mpesa->getDataFromCallback();
       RawPayment::create([
           'CheckOutId'=>Session::get('CheckoutRequestID'),
           'Transaction'=>$callbackData
       ]);
       $callbackData=$mpesa->finishTransaction();
    }
    protected function setPhone($phone){
        // $fCharacter=substr($phone,0,1);
        // $NewPhone=str_replace($fCharacter, '254', $phone);\
        $NewPhone=str_split($phone);
        $newPhone=$NewPhone[1].$NewPhone[2].$NewPhone[3].$NewPhone[4].$NewPhone[5].$NewPhone[6].$NewPhone[7].$NewPhone[8].$NewPhone[9];
        $checkOutNumber="254".$newPhone;
        session(['Number'=>$checkOutNumber]);
        return $checkOutNumber;
    }
}
