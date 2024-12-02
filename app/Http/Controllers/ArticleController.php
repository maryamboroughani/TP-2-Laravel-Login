<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all articles
        $articles = Article::with('user')->paginate(10);
    
        // Pass $request to the view
        return view('forum.index', compact('articles', 'request'));
    }
    

    public function create()
    {
        return view('forum.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title_fr' => 'nullable|string|max:255',
        'content_fr' => 'nullable|string',
        'title_en' => 'nullable|string|max:255',
       
        'content_en' => 'nullable|string',
    ]);

    $user = Auth::user();

    // Assign the "Author" role to the user if they don't already have it
    if (!$user->hasRole('Author')) {
        $role = Role::firstOrCreate(['name' => 'Author']);
        $user->assignRole($role);
    }

    // Create the article
    $article = Article::create([
        'user_id' => $user->id,
        'title_fr' => $request->input('title_fr'),
        'content_fr' => $request->input('content_fr'),
        'title_en' => $request->input('title_en'),
      
        'content_en' => $request->input('content_en'),
    ]);

    // Redirect with the etudiant parameter
    return redirect()->route('articles.index', ['etudiant' => $user->etudiant_id])
                     ->with('success', 'Article published successfully.');
}

public function update(Request $request, Article $article)
{
    // Ensure only the author can update
    if (Auth::id() !== $article->user_id) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'title_fr' => 'nullable|string|max:255',
       
        'content_fr' => 'nullable|string',
        'title_en' => 'nullable|string|max:255',
        'content_en' => 'nullable|string',
    ]);

    $article->update([
        'title_fr' => $request->input('title_fr'),
        'content_fr' => $request->input('content_fr'),
        'title_en' => $request->input('title_en'),
      
        'content_en' => $request->input('content_en'),
    ]);

    // Redirect with the etudiant parameter
    return redirect()->route('articles.index', ['etudiant' => $article->user->etudiant_id])
                     ->with('success', 'Article updated successfully.');
}

   

    public function edit(Article $article)
{
    // Ensure only the author can edit
    if (Auth::id() !== $article->user_id) {
        abort(403, 'Unauthorized action.');
    }

    return view('forum.edit', compact('article'));
}

    

    
    public function destroy(Article $article)
    {
        // Ensure only the author can delete
        if (Auth::id() !== $article->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
