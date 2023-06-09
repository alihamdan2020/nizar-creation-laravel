<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\portfolio;
use App\Models\PortfolioImages;

class portfolioController extends Controller
{
    public function index()
    {
        $portfoiloImages = DB::table('portfolio_images')->get();
            // ->join('portfolio_images', 'portfolios.id', '=', 'portfolio_images.portfolioId')
            // ->get();
            $portfolio=DB::table('portfolios')->get();

        return view('portfolio.portfolio', ['allportfoliosImages' => $portfoiloImages],['allportfolio'=>$portfolio]);
    }

    public function addPortfolio(Request $req)
    {
        $req->validate([
            'portfolioName' => 'required|unique:portfolios',
            'portfolioImage' => 'required|mimes:jpg,png',

        ]);
        $portfolioName = strip_tags($req->input('portfolioName'));
        $portfolioImageName = $req->file('portfolioImage')->getClientOriginalName();
        //$req->file('portfolioImage')->move(public_path('images'), $req->file('portfolioImage')->getClientOriginalName());
        $path=$req->file('portfolioImage')->storeAs('public', $req->file('portfolioImage')->getClientOriginalName());


        //new portfolio mean new instance from table portfolio
        $portfolio = new portfolio();
        $portfolio->portfolioName = $portfolioName;
        $portfolio->portfolioImage = $portfolioImageName;

        $portfolio->save();

        // // line below mean, redirect to the route /, if you try to say return view index , that make error
        return redirect()->back()->with("message",true);
    }

    public function  addPortfolioImage(Request $req)
    {

         // this function  is to add portfolio images to portfolio_images tables
        //not that: i have 2 table, one for portfolio and main image of it, and second table
        //contain ID of portfolio and images for it   
        
        $files=[];
        foreach($req->file('portfolioImage') as $file)
        {
            $portfolioId=$req->input('portfolioId');
            // $portfolioImageName = $req->file('portfolioImage')->getClientOriginalName();
            $portfolioImageName = $file->getClientOriginalName();
            $file->move(public_path('images'), $file->getClientOriginalName());
            $portfolioImage=new PortfolioImages();
            $portfolioImage->portfolioId=$portfolioId;
            $portfolioImage->portfolioImage=$portfolioImageName;
            $portfolioImage->save();    
        }

        
       
              
        // $req->file('portfolioImage')->move(public_path('images'), $req->file('portfolioImage')->getClientOriginalName());
        
        // $portfolioImage=new PortfolioImages();
        // $portfolioImage->portfolioId=$portfolioId;
        // $portfolioImage->portfolioImage=$portfolioImageName;
        // $portfolioImage->save();
        return redirect()->back()->with("message",true);
                  
    }

    public function deletePortfolio($id){
        // or  DB::table('portfolios')->where('id', 1)->delete();
        DB::delete('delete from portfolios where id = ?',[$id]);
        DB::delete('delete from portfolio_images where portfolioId = ?',[$id]);
        return redirect()->back()->with("message",true);
    }
    
    public function updatePortfolio($id,Request $req){
        // or  DB::table('portfolios')->where('id', 1)->delete();
        DB::table('portfolios')->where('id',$id)->update(['portfolioName'=>$req->input('portfolioName')]);
        return redirect()->back()->with("message",true);
        
    }
}
