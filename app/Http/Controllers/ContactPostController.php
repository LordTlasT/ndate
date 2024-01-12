<?php

namespace App\Http\Controllers;

use App\Models\ContactPost;
use Illuminate\Http\Request;

class ContactPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|max:255',
        ]);

        $contactPost = new ContactPost();
        $contactPost->message = $validatedData['message'];
        $contactPost->save();

        return redirect()->route('contact.index')->with('success', 'Message saved successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(ContactPost $contactPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactPost $contactPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactPost $contactPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactPost $contactPost)
    {
        //
    }
}
