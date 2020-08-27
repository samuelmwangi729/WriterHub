<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    protected function index(){
        return view('Users.Index');
    }
    protected function Promote($id,$action){
       if($action=='Promote'){
        $user=User::findOrFail($id);
        $user->isAdmin=2;
        $user->save();
        return "true";
       }else{
        $user=User::findOrFail($id);
        $user->isAdmin=0;
        $user->save();
        return "true";
       }
    }
}
