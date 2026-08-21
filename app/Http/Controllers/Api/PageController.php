<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Support\HtmlSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return ['success' => true, 'pages' => Page::latest('updatedAt')->paginate(50)->through(fn (Page $page) => $this->sanitize($page))];
    }

    public function store(Request $request)
    {
        $page = Page::create($this->validated($request));

        return response()->json(['success' => true, 'page' => $this->sanitize($page)], 201);
    }

    public function show(Page $page)
    {
        return ['success' => true, 'page' => $this->sanitize($page)];
    }

    public function update(Request $request, Page $page)
    {
        $page->update($this->validated($request, $page->id));

        return ['success' => true, 'page' => $this->sanitize($page->refresh())];
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return ['success' => true];
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:page,slug'.($ignoreId ? ','.$ignoreId : '')],
            'content' => ['required', 'string', 'max:60000'],
            'published' => ['nullable', 'boolean'],
            'metaTitle' => ['nullable', 'string', 'max:255'],
            'metaDescription' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['published'] = (bool) ($data['published'] ?? false);
        $data['content'] = HtmlSanitizer::clean($data['content']);

        return $data;
    }

    private function sanitize(Page $page): Page
    {
        return \App\Support\PublicApi::sanitizeContent($page);
    }
}
