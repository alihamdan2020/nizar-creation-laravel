<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\ServiceImages;

class servicesController extends Controller
{
   
   public function index(){
            
            $services=DB::table('services')->get();
            $servicesImages = DB::table('service_images')->get();
            $portfolio=DB::table('portfolios')->get();

        return view('services.services',['allportfolio'=>$portfolio,'allservices'=>$services,'allserviceimages'=>$servicesImages]);

   }
   
   
    public function addService(Request $req){
        
        $req ->validate([
            'serviceName'=>'required',
            'serviceImage'=>'required|mimes:jpg,png',
            'serviceDescription'=>'required',

         ]);
            
         $serviceName=strip_tags($req ->input('serviceName'));
         $serviceDescription=strip_tags($req ->input('serviceDescription'));
         $serviceImageName=$req->file('serviceImage')->getClientOriginalName();
         //$req->file('portfolioImage')->getClientOriginalName(); mean get the name of image as it is
         //move mean upload image into images under public folder 
         $req->file('serviceImage')->move(public_path('images'),$req->file('serviceImage')->getClientOriginalName());
        
        
         //new portfolio mean new instance from table portfolio
         $service=new service();
         $service->serviceName=$serviceName;
         $service->serviceDesc=$serviceDescription;
         $service->serviceImage=$serviceImageName;

         $service->save();
         
    // // line below mean, redirect to the route /, if you try to say return view index , that make error
         return redirect()->back();
        }

        public function addServicesImages(request $req){
            $files=[];
            foreach($req->file('serviceImage') as $file)
            {
                $serviceId=$req->input('serviceId');
                // $portfolioImageName = $req->file('portfolioImage')->getClientOriginalName();
                $serviceImageName = $file->getClientOriginalName();
                $file->move(public_path('images'), $file->getClientOriginalName());
                $serviceImage=new ServiceImages();
                $serviceImage->serviceId=$serviceId;
                $serviceImage->serviceImage=$serviceImageName;
                $serviceImage->save();    
            }
    
            
           
                  
            // $req->file('portfolioImage')->move(public_path('images'), $req->file('portfolioImage')->getClientOriginalName());
            
            // $portfolioImage=new PortfolioImages();
            // $portfolioImage->portfolioId=$portfolioId;
            // $portfolioImage->portfolioImage=$portfolioImageName;
            // $portfolioImage->save();
            return redirect()->back()->with("message",true);
    
        }
}
