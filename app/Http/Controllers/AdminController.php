<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $users = User::where('delete_flg', '0')->get();
        $admins = array();
        $managers = array();
        $restaurants = array();
        $branchs = array();
        $shippers = array();
        $shoppers = array();
        foreach ($users as $user) {
            if($user->role == 5){
                array_push($admins, $user);
            }
            if($user->role == 3){
                array_push($restaurants, $user);
            }
            if($user->role == 2){
                array_push($branchs, $user);
            }
            if($user->role == 1){
                array_push($shippers, $user);
            }
            if($user->role == 0){
                array_push($shoppers, $user);
            }
        }
        $posts = Post::where('delete_flg', '0')->get();
        return view('admin.index', compact('admins','restaurants','branchs','shippers','shoppers','posts'));
    }
}
