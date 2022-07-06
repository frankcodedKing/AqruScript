<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companydetail;
use App\Models\Investmentplan;
use App\Models\Faq;
use Illuminate\Support\Facades\Mail;
use App\Mail\Adminmail;
use App\Models\Feature;


class VisitorController extends Controller
{

   public $owneremail ="codefi001@gmail.com";
    //
    public function index()
    {
        # code...
        $inv_plans = Investmentplan::all();
        $faqs = Faq::all();
        $company_detail = Companydetail::where('id', 1)->first();
        $company_features = Feature::where('id', 1)->first();
        $data=[];
        $data['company_features'] = $company_features;
        $data['company_detail'] = $company_detail;
        $data['compd'] = $company_detail;
        $data['investmentplans'] = $inv_plans;
        $data['faqs'] = $faqs;
        $data['title']="Home";
        return view ("visitors.index", $data);
    }



    public function about()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="About Us";
        return view ('visitors.about', $data);
    }

    
     public function promotions()
        {
            # code...
        $data=[];
        $company_detail = Companydetail::where('id', 1)->first();
        $data['compd'] = $company_detail;
        $data['title']="Promotions";
            return view ('visitors.promotions', $data);
        }
        
        
     public function careers()
        {
            # code...
        $data=[];
        $company_detail = Companydetail::where('id', 1)->first();
        $data['compd'] = $company_detail;
        $data['title']="Careers";
            return view ('visitors.careers', $data);
        }
        
        //aVisa card routes

    
     public function visacard()
            {
                # code...
            $data=[];
            $company_detail = Companydetail::where('id', 1)->first();
            $data['compd'] = $company_detail;
            $data['title']="Acorns Visa Card";
                return view ('visitors.visacard', $data);
            }



        
     public function donate()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Donate";
        return view ('visitors.donate', $data);
    }




 public function whyus()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Why Us";
        return view ('visitors.whyus', $data);
    }



 public function plan()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Plans";
        return view ('visitors.plan', $data);
    }


    public function blog()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Blog";
        return view ('visitors.blog' , $data);
    }


    public function terms()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Terms & Condition";
        return view ('visitors.terms' , $data);
    }


    public function invest()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="About Us";
        return view ('visitors.invest', $data);
    }


    public function faq()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $faqs = Faq::all();
    $data['faqs'] = $faqs;
    $data['title']="Faqs";
        return view ("visitors.faqs", $data);
    }


    public function contact()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Contact Us";
        return view ("visitors.contact", $data);
    }

    public function postcontact(Request $request)
    {   # code...
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $domain = request()->getHost();
        $email = $this->owneremail;
        $mailtitle = "contact message from $name";
    $emaildata=['data'=> $email,'email_body'=>$message,'email_header'=>$mailtitle];

    Mail::to($email)->send(new Adminmail($emaildata));

        $company_detail = Companydetail::where('id', 1)->first();

    $data=[];
    $data['company_detail'] = $company_detail;
    $data['title']="About Us";
        return redirect()->route("contact")->with("success","message sent, we will respond to you as soon as we can");
    }



    public function assetsmanagement()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Asset Management";
        return view ("visitors.assetsmanagement", $data);
    }



    public function testimony()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Testimony";
        return view ("visitors.testimony", $data);
    }



    public function fiduciary()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Fiduciary";
        return view ("visitors.fiduciary", $data);
    }


    public function howwearedif()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="How We Are Different";
        return view ("visitors.howwearedif", $data);
    }


    public function ourteam()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Our Team";
        return view ("visitors.ourteam", $data);
    }

public function news()
    {
        # code...
    $data=[];
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Our Team";
        return view ("visitors.news", $data);
    }

function buybtc () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Buy BTC";
    return view("visitors.buybtc", $data);

}

function cannabis () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Cannabis";
    return view("visitors.cannabis", $data);
}

function crypto ()  {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Crypto";
    return view("visitors.crypto", $data);
}

function finacialplaning () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Financial Planning";
    return view("visitors.finacialplaning", $data);
}




function forextrading () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Forex Trading";
    return view("visitors.forextrading", $data);
}
function goldinvestment () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Gold Investment";
    return view("visitors.goldinvestment", $data);
}
function legal () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Legal";
    return view("visitors.legal", $data);
}

function loansandgrant () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Loans and Grants";
    return view("visitors.loansandgrant", $data);
}

function oilandgas () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Oil and Gas";
    return view("visitors.oilandgas", $data);
}

function policy () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Our Policy";
    return view("visitors.policy", $data);
}

function realestate () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Real Estate";
    return view("visitors.realestate", $data);
}

function retirement () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Retirement Plan";
    return view("visitors.retirement", $data);
}

function services () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Services";
    return view("visitors.services", $data);
}


function stocks () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Stocks";
    return view("visitors.stocks", $data);
}


function teams () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Teams";
    return view("visitors.team", $data);
}



function pricing () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Pricing";
    return view("visitors.pricing", $data);
}




function stockplans () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Stocks Plans";

    $stockplans = Investmentplan::where('type', "stockplans")->get();
    $data['stockplans'] = $stockplans;


    return view("visitors.stockplans", $data);
}




function forexplans () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Forex Plans";

    $forexplans = Investmentplan::where('type', "forexplans")->get();
    $data['forexplans'] = $forexplans;


    return view("visitors.forexplans", $data);
}

function cryptoplans () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Crypto Plans";

    $cryptoplans = Investmentplan::where('type', "cryptoplans")->get();
    $data['cryptoplans'] = $cryptoplans;

    return view("visitors.cryptoplans", $data);
}

function realestateplan () {
    $company_detail = Companydetail::where('id', 1)->first();
    $data['compd'] = $company_detail;
    $data['title']="Real Estate Plans";

    $realestateplan = Investmentplan::where('type', "realestateplan")->get();

    $data['realestateplan'] = $realestateplan;


    return view("visitors.realestateplan", $data);
}



function landbanking (){

    $company_detail = Companydetail::where('id', 1)->first();

    $landbankingplan = Investmentplan::where('type', "landbanking")->get();
    $data['landbankingplan'] = $landbankingplan;

    $data['compd'] = $company_detail;
    $data['title']="Land banking";
    return view("visitors.landbanking", $data);
}

}
