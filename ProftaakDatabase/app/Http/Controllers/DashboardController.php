<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class DashboardController extends Controller
{
    public function show()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('login.show')->with('error', 'Please login to access the admin dashboard.');
        }

        $news = News::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('news'));
    }

    public function storeNews(Request $request)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('login.show')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('dashboard.show')->with('alert', 'Nieuwsbericht succesvol toegevoegd!');
    }

    public function updateNews(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('login.show')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('dashboard.show')->with('alert', 'Nieuwsbericht succesvol bijgewerkt!');
    }

    public function deleteNews($id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('login.show')->with('error', 'Access denied.');
        }

        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('dashboard.show')->with('alert', 'Nieuwsbericht succesvol verwijderd!');
    }
}