<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            'faqs' => FAQPost::all(),
            'categories' => Category::all()
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
            'category_id' => 'required|integer',
        ]);

        $category = Category::where('id', $validated['category_id'])->first();

        if (!$category) {
            // return
            return redirect(route('faq.index'))->with('error', "$category->name does not exist.");
        }

        $FAQPost = FAQPost::create($validated);

        $FAQPost->save();

        return redirect(route('faq.index'))->with('success', 'FAQ post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQPost $faq)
    {
        return view('faq.show', ['faq' => $faq]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQPost $faq)
    {
        return view('faq.edit', ['faq' => $faq, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQPost $faqs)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'category' => 'required|string|max:255|alpha_num',
        ]);

        $faqs->update($validated);

        return redirect(route('faq.index'))->with('success', 'FAQ post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQPost $faq)
    {
        $faq->delete();
        
        return redirect(route('faq.index'))->with('success', 'FAQ post deleted successfully.');
    }
}
