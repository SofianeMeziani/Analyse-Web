<?php

namespace App\Http\Controllers;

// use App\User;
use Auth;
use App\Mail;
use App\Analysis;
use Illuminate\Http\Request;

class MailController extends Controller
{

    public function sendmail(Request $request)
        {
        	$data = $request->all();
            $name = Auth::user()->name;

        	$mailto = Auth::user()->email;
        	$mailfrom =  "analysis@Analyse.com";
        	$subject = "subject";
        	
            $pdfname = 'analysis_' . $data["name"] .'.pdf';

            Mail::sendWithValuesWithPDF(
             "mails/report", 
             [
                 "email"=>$mailto,
                 "date"=>date("d-m-Y H:i:s")
             ], 
             $mailto, 
             $mailfrom, 
             "Analyse web", 
             $subject,
             public_path("/pdfs/" . $pdfname),
             $pdfname
            );

            $analysis = Analysis::getAnalysisById($data["name"]);

            $analysis['message'] = "sent" ;

            return view("historydetails", $analysis);
        	
        }


        
}
