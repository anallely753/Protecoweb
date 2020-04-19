<?php

namespace App\Http\Controllers;
use App\ContactUS;
use Mail;

use Illuminate\Http\Request;

class ContactUSController extends Controller
{
	public function contactUS()
	{
		return view('contacto');
	}

	public function contactUSPost(Request $request) 
	   {
	    $this->validate($request, [ 'name' => 'required', 'subject'=>'required', 'email' => 'required|email', 'message' => 'required' ]);
	    ContactUS::create($request->all()); 
	   
	    Mail::send('email',
	       array(
	           'name' => $request->get('name'),
	           'email' => $request->get('email'),
	           'subject' => $request->get('subject'),
	           'user_message' => $request->get('message')
	       ), function($message)
	   {
	       $message->from('example@gmail.com');
	       $message->to('anallely.proteco@gmail.com', 'Admin')->subject('Nuevo mensaje de prebecario');
	   });
	    return redirect('/')->with('success', 'En cuanto pueda te responderé. Gracias por escribir!'); 
	   }

}
