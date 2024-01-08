<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Article;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        $adminUser = User::find(1);
        $users = User::all();
        $adminRole = Role::findByName('admin');
        $moderatorRole = Role::findByName('moderator');
        $userRole = Role::findByName('user');

        $adminUser->assignRole($adminRole, $userRole, $moderatorRole);
        foreach ($users as $user) {
            $user->assignRole($userRole);
        }
//        filters en search results ophalen
        $selectedSubjects = $request->input('subjects', []);
        $selectedAges = $request->input('ages', []);
        $searchInput = $request->input('search');

//        artikelen ophalen
        $query = Article::with('subjects','ages');

        if (!empty($selectedSubjects)) {
            $query->whereHas('subjects', function ($q) use ($selectedSubjects) {
                $q->whereIn('subject_id', $selectedSubjects);
            });
        }

        if (!empty($selectedAges)) {
            $query->whereHas('ages', function ($q) use ($selectedAges) {
                $q->whereIn('age_id', $selectedAges);
            });
        }

        if ($searchInput) {
            // Add search condition to the query
            $query->where(function ($query) use ($searchInput) {
                $query->where('title', 'like', "%$searchInput%")
                    ->orWhere('description', 'like', "%$searchInput%");
            });
        }

        $articles = $query->get();
        $ages = Age::all();
        $subjects = Subject::all();

        return view('home', compact('articles', 'ages', 'subjects','selectedAges', 'selectedSubjects', 'searchInput', 'user'));
    }

    /**
     * Display a listing of saved resources.
     */
    public function saved(Request $request)
    {
//        filters en search results ophalen
        $selectedSubjects = $request->input('subjects', []);
        $selectedAges = $request->input('ages', []);
        $searchInput = $request->input('search');

//        favoriete artikelen ophalen
        $query = Article::with('subjects','ages')->where('saved', true);

        if (!empty($selectedSubjects)) {
            $query->whereHas('subjects', function ($q) use ($selectedSubjects) {
                $q->whereIn('subject_id', $selectedSubjects);
            });
        }

        if (!empty($selectedAges)) {
            $query->whereHas('ages', function ($q) use ($selectedAges) {
                $q->whereIn('age_id', $selectedAges);
            });
        }

        $articles = $query->get();
        $ages = Age::all();
        $subjects = Subject::all();

        return view('saved', compact('articles', 'ages', 'subjects','selectedAges', 'selectedSubjects', 'searchInput'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(Article $article)
    {
        $this->authorize('create', $article);
        $ages = Age::all();
        $subjects = Subject::all();

        return view('article.create', compact('ages', 'subjects'));
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

        if ($request->hasFile('image')) {
            $imagePath = base64_encode(file_get_contents($request->file('image')->getRealPath()));
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
        $article = Article::find($id);
        $ages = Age::all();
        $subjects = Subject::all();
        return view('article.detail', compact('article', 'ages', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(string $id, Article $article)
    {
        $this->authorize('edit', $article);
        $article = Article::find($id);
        $ages = Age::all();
        $subjects = Subject::all();
        return view('article.edit', compact('article', 'ages', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user()->id;
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ages' => 'required|array',
            'subjects' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Maak een map aan als deze niet bestaat
        Storage::disk('public')->makeDirectory('article_images');

        $article = Article::find($id); // Veronderstel dat $id de id is van het artikel dat je wilt bijwerken

        // Controleer of het artikel bestaat
        if (!$article) {
            return redirect()->route('home')->with('error', 'Artikel niet gevonden.');
        }

        // Bijwerken van het artikel
        $article->title = $data['title'];
        $article->description = $data['description'];

        // Als er een nieuw afbeeldingsbestand is geüpload, sla het op en werk het pad bij
        if ($request->hasFile('image')) {
            $imagePath = base64_encode(file_get_contents($request->file('image')->getRealPath()));
            $article->image = $imagePath;
        }

        $article->save();

        // Werk de leeftijden en onderwerpen bij
        $article->ages()->sync($data['ages']);
        $article->subjects()->sync($data['subjects']);

        return redirect()->route('home')->with('success', "$article->title is succesvol bijgewerkt!");
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(string $id, Article $article)
    {
        $this->authorize('delete', $article);
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('home')->with('success', "$article->title is succesvol verwijderd!");
    }

    public function change_active(string $id)
    {
        $article = Article::find($id);

        // Sets the status of the article to active or inactive
        if ($article->active == true) {
            $article->active = false;
        } else {
            $article->active = true;
        }

        $article->update();

        return redirect('/home');
    }

    public function toggle_save(string $id)
    {
        $article = Article::find($id);

        // Sets the status of the article to active or inactive
        if ($article->saved == true) {
            $article->saved = false;
        } else {
            $article->saved = true;
        }

        $article->update();

        return back();
    }
}
