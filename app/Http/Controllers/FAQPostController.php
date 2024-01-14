<?php

namespace App\Http\Controllers;

use App\Models\FAQPost;
use Illuminate\Http\Request;

class FAQPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('faq.index', [
            'faqs' => FAQPost::with('faq')->latest()->get()
        ]);
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
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        return redirect(route('faq.index'));

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQPost $faqs)
    {
        return view('faq.show', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQPost $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQPost $faqs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQPost $faqs)
    {
        //
    }
}
