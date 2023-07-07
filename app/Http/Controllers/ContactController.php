<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function form(Request $request)
    {

        return redirect('Form');

    }

    public function add(Request $request)
    {


        $request->validate([
            'name' => 'required|max:10|min:4',

            'email' => 'required|max:50|min:4|email|unique:contact',

            'phone' => 'required|max:50|min:4|string',
            'address' => 'required|max:50|min:4',


            'image' => 'required|image|mimes:jpg,png,jpeg'

        ]);

        $image = time() . '.' . $request->file('image')->extension();

        $request->file('image')->move(public_path('images'), $image);

        $contact = Contact::create($_REQUEST);


        if ($contact) {

            $contact->image = $image;
            $contact->created_by = auth()->user()->id;
            $contact->save();
            // we use where save(); 
            $request->session()->flash('success', 'data submitted successfully');

        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }

        return back();


    }


    public function list(Request $request)
    {

        $contacts = Contact::all();
        // dd($students);

        return view('list', ['contacts' => $contacts]);

    }


    public function delete(Request $request, $id = false)
    {



        $contact = Contact::find($id);
        $contact->delete();

        $request->session()->flash('delete', 'Data of id= ' . $id . ' has been deleted succesfully');
        return back();

    }


    public function edit(Request $request, $id = false)
    {

        $details = Contact::find($id);
        // dd($details);
        return view('edit', ['details' => $details]);
    }


    public function edit_contact(Request $request)
    {

        $request->validate([
            'name' => 'required|max:10|min:4',

            // 'email' => 'required|max:50|min:4|email',

            'phone' => 'required|max:50|min:4|string',
            'address' => 'required|max:50|min:4',

            'image' => 'image|mimes:jpg,png,jpeg',
            'image_val' => 'required'

        ]);
        dd($request->file('image_val'));
        $image = false;
        if ($request->file('image')) {
            $image = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $image);
        }

        if ($request->file('image_val')) {
            $image = $request->file('image_val');

            $request->file('image')->move(public_path('images'), $image);
        }
        $id = $request->id;

        $contactObj = Contact::find($id);

        $contactObj->name = $request->name;
        // $contactObj->email = $request->email;

        $contactObj->phone = $request->phone;
        $contactObj->address = $request->address;
        $contactObj->image = $image;

        if ($contactObj->save()) {


            return redirect('list');

        }

    }
}