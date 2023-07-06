<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function form(Request $request){

return redirect('Form');

    }

    public function add(Request $request){

       
        $request->validate([
            'name' => 'required|max:10|min:4',
            
            'email' => 'required|max:50|min:4|email',
           
            'phone' => 'required|max:50|min:4|string',
            'address' => 'required|max:50|min:4',
           
           
            'image' => 'required|image|mimes:jpg,png,jpeg'

        ]);
        
        $image = time() . '.' . $request->file('image')->extension();

        $request->file('image')->move(public_path('images'), $image);

        $contact = Contact::create($_REQUEST);


        if ($contact) {

            $contact->image = $image;
            $contact->created_by=auth()->user()->id;
            $contact->save();

            $request->session()->flash('success', 'data submitted successfully');

        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }

        return back();


            }

    
}
