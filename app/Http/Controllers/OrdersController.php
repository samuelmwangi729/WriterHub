<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Str;
use Auth;
use Session;
use App\Prices;
use App\Payment;
use App\Papers;
use App\Subject;
use App\User;
use App\Uploaded;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->isAdmin);
        return view('Orders.Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers=Papers::all();
        $subjects=Subject::all();
        return view('Orders.Finish')->with('papers',$papers)->with('subjects',$subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'DocType'=>'required',
            'Spacing'=>'required',
            'Language'=>'required',
            'Topic'=>'required',
            'Level'=>'required',
            'Deadline'=>'required',
            'Pages'=>'required',
            'Subject'=>'required',
            'Format'=>'required',
            'Description'=>'required',
            'Details'=>'required',
        ];
        $this->validate($request,$rules);
        //get the prices from the database;
        $prices=Prices::where('Paper','=',$request->DocType)->get()->first();
        $cost=$prices->Price * $request->Pages;
        $details='None';
        if($request->file('Details')){
            $name=$request->Details;
           $newName=time().$name->getClientOriginalName();
           $name->move('Uploads/Details',$newName);
           $details='/Uploads/Details/'.$newName;
        }
        $OrderId=Str::random(10);
        Order::create([
            'OrderNumber'=>$OrderId,
            'Price'=>$cost,
            'Client'=>Auth::user()->email,
            'DocType'=>$request->DocType,
            'Spacing'=>$request->Spacing,
            'Language'=>$request->Language,
            'Topic'=>$request->Topic,
            'Level'=>$request->Level,
            'Deadline'=>$request->Deadline,
            'Pages'=>$request->Pages,
            'Subject'=>$request->Subject,
            'Format'=>$request->Format,
            'Description'=>$request->Description,
            'Details'=>$details
        ]);
      Session::flash('success','Order Successfully Placed');
      $request->session()->forget('Level');
      $request->session()->forget('Doctype');
      $request->session()->forget('Deadline');
      $request->session()->forget('Pages');
      session(['Amount'=>$cost]);
      session(['OrderId'=>$OrderId]);
      return redirect(route('Payments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::findOrFail($id);
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::findOrFail($id);
        $papers=Papers::all();
        $subjects=Subject::all();
        return view('Orders.Edit')
        ->with('order',$order)
        ->with('papers',$papers)
        ->with('subjects',$subjects);
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
        $rules=[
            'DocType'=>'required',
            'Spacing'=>'required',
            'Language'=>'required',
            'Topic'=>'required',
            'Level'=>'required',
            'Deadline'=>'required',
            'Pages'=>'required',
            'Subject'=>'required',
            'Format'=>'required',
            'Description'=>'required',
        ];
        $this->validate($request,$rules);
        $order=Order::findOrFail($id);
        if(!$order){
            return back();
        }
        $prices=Prices::where('Paper','=',$request->DocType)->get()->first();
        $cost=$prices->Price * $request->Pages;
        $details='None';
        if($request->file('Details')){
            @unlink($order->Details);//delete the previous file
            $name=$request->Details;
           $newName=time().$name->getClientOriginalName();
           $name->move('Uploads/Details',$newName);
           $details='/Uploads/Details/'.$newName;
           $order->Details=$details;
        }
      $order->DocType=$request->DocType;
      $order->Spacing=$request->Spacing;
      $order->Language=$request->Language;
      $order->Topic=$request->Topic;
      $order->Level=$request->Level;
      $order->Deadline=$request->Deadline;
      $order->Pages=$request->Pages;
      $order->Subject=$request->Subject;
      $order->Format=$request->Format;
      $order->Description=$request->Description;
      $order->save();
      Session::flash('success','Order Successfully Updated');
      return redirect(route('orders.index'));
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
    protected function Complete(Request $request,$payer){
        // dd(Session::get('OrderId'));
        dd(Session::get('Amount'));
        $source="Paypal";
        $paidBy=$payer;
        //update the order into paid 
        $order=Order::where('OrderNumber','=',Session::get('OrderId'))->get()->first();
        $order->Paid=1;
        $order->save();
        //insert the transaction into the database
        Payment::create([
            'TransactionId'=>"Paypal".Str::random(9),
            'OrderNumber'=>Session::get('OrderId'),
            'Client'=>Auth::user()->email,
            'Amount'=>Session::get('Amount'),
            'Platform'=>'Paypal',
        ]);
        $request->session()->forget('Amount');
        $request->session()->forget('OrderId');
        Session::flash('success','Payment Succesfully Recveived');
        return redirect(route('home'));
    }
    protected function CountOrders(){
        //count the orders 
        if(Auth::user()->isAdmin==1){
            $count=Order::count();
        }else{
            $orders=Order::where('Client','=',Auth::user()->email)->get();
            $count=count($orders);
        }
      
        return $count;
    }
    protected function CompletedOrders(){
        if(Auth::user()->isAdmin==1){
         $orders=Order::where('Status','=',1)->get();
        }else{
            $orders=Order::where([
                ['Status','=',1],
                ['Client','=',Auth::user()->email]
            ])->get();
        }
       
        $count=count($orders);
        return $count;
    }
    protected function Payments(){
        if(Auth::user()->isAdmin==1){
            $payments=Payment::all();
            $sum=0;
            for ($i=0; $i <count($payments) ; $i++) { 
                $sum=$sum+$payments[$i]->Amount;
            }
        }else{
            $payments=Payment::where([
                ['Client','=',Auth::user()->email]
            ])->get();
            $sum=0;
            for ($i=0; $i <count($payments) ; $i++) { 
                $sum=$sum+$payments[0]->Amount;
            }
        }
        return $sum;
    }
    protected function Disputed(){
        if(Auth::user()->isAdmin==1){
            $orders=Order::where([
                ['Status','=',2],
            ])->get();
        }else{
            $orders=Order::where([
                ['Status','=',2],
                ['Client','=',Auth::user()->email]
            ])->get();
        }
        
        $count=count($orders);
        return $count;
    }
    protected function GetMine(){
        $orders=Order::where('Client','=',Auth::user()->email)->get();
        return $orders;
    }
    protected function Distribute(){
        $users=User::where('isAdmin','=',2)->get();
        $assignments=Order::where('Writer','=',Null)->get();
        return view('Orders.Distribute')
        ->with('Writers',$users)
        ->with('Assignments',$assignments);
    }
    protected function Give(Request $request){
        //get the orderid
        $rules=[
            'Writer'=>'required',
            'Assignment'=>'required'
        ];
        $this->validate($request,$rules);
        $orderNumber=$request->Assignment;
        $order=Order::where('OrderNumber','=',$orderNumber)->get()->first();
        $order->Writer=$request->Writer;
        $order->save();
        Session::flash('success','Order Successfully Given Out');
        return back();
    }
    protected function Dist(){
        //get the orders write != null
        $orders=Order::where('Writer','!=',Null)->get();
        return $orders;
    }
    protected function reset($id){
        $order=Order::where('OrderNumber','=',$id)->get()->first();
        $order->Writer=Null;
        $order->save();
        return 'success';
    }
    protected function getPendingOrders(){
        $client=Auth::user()->email;
        $orders=Order::where([
            ['Client','=',$client],
        ])->get();
        return view('Orders.Client')->with('Orders',$orders);
    }
    protected function accept($id){
        $order=Order::findOrFail($id);
        $order->Status=1;
        $order->save();
        $orderNumber=$order->OrderNumber;
        $uploaded=Uploaded::where('OrderId','=',$orderNumber)->get()->first();
        $uploaded->Status=1;
        $uploaded->save();
        Session::flash('success','Order Successfully Completed');
        return back();
    }
    protected function dispute($id){
        $order=Order::findOrFail($id);
        $order->Status=2;
        $order->save();
        //get the order numer 
        $orderNumber=$order->OrderNumber;
        $uploaded=Uploaded::where('OrderId','=',$orderNumber)->get()->first();
        $uploaded->Status=2;
        $uploaded->save();
        Session::flash('success','Order Successfully Disputed');
        return back();
    }
}
