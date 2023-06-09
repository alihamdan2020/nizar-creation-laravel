<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\portfolio;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $services=DB::table('services')->get();
        $portfolio=DB::table('portfolios')->get();
        return view ('index',['allservices'=>$services],['allportfolio'=>$portfolio]);
    }
}
