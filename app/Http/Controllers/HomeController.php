<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\{User,Papers,Subject};
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request->session()->all());
        if(Session::get('Doctype') != ''){
            $papers=Papers::all();
            $subjects=Subject::all();
            return view('Orders.Finish')->with('papers',$papers)->with('subjects',$subjects);
        }else{
            if(Auth::user()->isAdmin==1){
                return view('Admin');
            }elseif(Auth::user()->isAdmin==2){
                return redirect(route('uploaded'));
            }
            else{
                return view('home');
            }
        }
    }
    protected function getUsers(){
        $users=User::where('isAdmin','!=',1)->get();
        return $users;
    }
}
