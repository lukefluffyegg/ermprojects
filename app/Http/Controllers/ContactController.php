<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactCreated;

class ContactController extends Controller
{
    
    public function __construct() {
        
    }


    public function store(ContactFormRequest $request) {

        // Validate Entry data
        /*$this->validate($request, array( 
            'name' => 'required|max:255',
            'email' => "required|max:255",
            'Bodymessage' => 'required',
        ));*/

        $emailto = 'luke@fluffyegg.com';

        Mail::to($emailto)->queue(
            new ContactCreated($request->name, $request->email, $request->Bodymessage)
        );

        return back()->with("info","Thank you {$request->name}. We have sent your message - an admin will contact you shortly on the following email address: {$request->email}");
    }
}
