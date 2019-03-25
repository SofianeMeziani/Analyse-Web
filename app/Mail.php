<?php

namespace App;
use Mail as Laravelmail;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model {

	public static function sendMail($mailto, $mailfrom, $namefrom, $subject, $message)
	{
		Laravelmail::raw($message, function($message) use ($mailto, $mailfrom, $namefrom, $subject)
		{
			$message->subject($subject);
			$message->from($mailfrom, $namefrom);
			$message->to($mailto);
		});
	}

	public static function sendWithValuesWithPDF($mailView, $array, $mailTo, $mailFrom, $nameFrom, $mailSubject, $fullpath, $filename)
	{
		LaravelMail::send($mailView, $array, function ($message) use ($array, $mailTo, $mailFrom, $nameFrom, $mailSubject, $fullpath, $filename) {
			$message->from($mailFrom, $nameFrom);
		    $message->subject($mailSubject);
		    $message->to($mailTo);
		    $message->attach($fullpath, [
                        'as' => $filename,
                        'mime' => 'application/pdf',
                    ]);
		});
		return "sent";
	}

}