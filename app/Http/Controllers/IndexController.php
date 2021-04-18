<?php

namespace App\Http\Controllers;
use Session;
use App\Words;
use App\Prices;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected function services(){
        return view('Index.Services');
    }
    protected function features(){
        return view('Index.Features');
    }
    protected function Orders(Request $request){
        session(['Doctype'=>$request->DocType]);
        session(['Level'=>$request->Level]);
        session(['Deadline'=>$request->Deadline]);
        session(['Pages'=>$request->Pages]);
        $today=date('Y-m-d');
        if(Session::get('Deadline')< $today){
          return "false";
        }
      else{
        $data=['message'=>['error'=>'Archived. register to continue']];
        return $data;
      }
    }
    protected function words(){
      $words=Words::all();
      return $words[0]->Word;
    }
    protected function Prices($paper){
     $price=Prices::where('Paper','=',$paper)->get()->first();
     return $price;
    }
    protected function getPrices(){
      $prices=Prices::all();
      return $prices;
    }
}
