<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AUth;
use Session;
use App\Order;
use App\Uploaded;
class UploadedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Orders.Uploaded');
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
        $file=$request->Document;
        // dd($file);
        $order=Order::where('OrderNumber','=',$request->OrderId)->get()->first();
        $newName=time().$file->getClientOriginalName();
        $file->move('Uploads/Complete',$newName);
        $fileName='/Uploads/Complete/'.$newName;
        Uploaded::create([
            'OrderId'=>$request->OrderId,
            'Writer'=>Auth::user()->email,
            'Document'=>$fileName
        ]);
        $order->Status=5;
        $order->save();
        Session::flash('success','Document Successfully Uploaded');
        return back();
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
    protected function getUploaded(){
        $user=Auth::user()->email;
        $orders=Order::where('Writer','=',$user)->get();
        if(count($orders)==0){
            return "None";
        }
        return $orders;
    }
    protected function getPending(){
        $orders=Uploaded::where('Writer','=',Auth::user()->email)->get();
        return $orders;
    }
}
