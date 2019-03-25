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
            $name= Auth::user()->name;

        	$mailto = "rani-tk@hotmail.com";
        	$mailfrom =  Auth::user()->email;
        	$subject = "subject";
        	
        	// $message = "Vous avez reçu un message via le formulaire de contact \n\r";

            // Mail::sendMail($mailto, $mailfrom, $name, $subject, $message);
        	
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
        	
            //return redirect("/getHistory")->with(['message'=>'sent']);
            // return redirect()->route('profile', ['id' => 1]);
        	
        }


        
}
