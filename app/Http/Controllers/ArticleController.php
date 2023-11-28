<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Article;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ages = Age::all();
        $subjects = Subject::all();

        return view('create', compact('ages', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ages' => 'required|array',
            'subjects' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        Storage::disk('public')->makeDirectory('game_images');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('game_images', 'public');
        }
        $article = Article::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
            'user_id' => $user,
        ]);

        $article->ages()->attach($data['ages']);
        $article->subjects()->attach($data['subjects']);

        return redirect()->route('home')->with('success', "$article->title is succesvol toegevoegd!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
