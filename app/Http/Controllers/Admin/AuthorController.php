<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(config('hopn.pagination.default', 15));

        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.form', ['author' => new Author()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateAuthor($request);

        if ($request->hasFile('avatar')) {
            $data['avatar_path'] = $request->file('avatar')->store('authors', 'public');
        }
        unset($data['avatar']);

        $data['slug'] = \Illuminate\Support\Str::slug($data['name']) . '-' . uniqid();
Author::create($data);

        return redirect()->route('admin.authors.index')->with('status', 'Author created.');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.form', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $data = $this->validateAuthor($request, $author->id);

        if ($request->hasFile('avatar')) {
            if ($author->avatar_path) {
                Storage::disk('public')->delete($author->avatar_path);
            }
            $data['avatar_path'] = $request->file('avatar')->store('authors', 'public');
        }
        unset($data['avatar']);

        $author->update($data);

        return redirect()->route('admin.authors.index')->with('status', 'Author updated.');
    }

    public function destroy(Author $author)
    {
        if ($author->avatar_path) {
            Storage::disk('public')->delete($author->avatar_path);
        }

        $author->delete();

        return redirect()->route('admin.authors.index')->with('status', 'Author deleted.');
    }

    private function validateAuthor(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'bio_en'       => ['nullable', 'string', 'max:2000'],
            'bio_de'       => ['nullable', 'string', 'max:2000'],
            'avatar'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'twitter_url'  => ['nullable', 'url', 'max:255'],
            'website_url'  => ['nullable', 'url', 'max:255'],
        ]);
    }
}
