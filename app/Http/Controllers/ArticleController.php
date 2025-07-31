<?php
namespace App\Http\Controllers;

use id;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('article.articlePage', compact('articles'));
    }
    
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article.articleDetailPage', compact('article'));
    }

    public function adminIndex()
    {
        $articles = Article::all();
        return view('admin.dashboardAdminPage', compact('articles'));
    }

    public function destroy($id){
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,svg|max:5120',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'admin_id' => Auth::id(),
        ]);

        return redirect()->route('admin')->with('success', 'Article created successfully!');
    }
}