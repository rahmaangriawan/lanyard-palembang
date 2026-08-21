<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Rules\SafePublicUrl;
use App\Support\HtmlSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['category:id,name,slug', 'author:id,name,slug'])->latest('updatedAt');

        if ($request->user()?->isWriter()) {
            $query->where('authorId', $request->user()->id);
        }

        return [
            'success' => true,
            'posts' => $query->paginate(50)->through(fn (Post $post) => $this->sanitize($post)),
        ];
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        if (! $request->user()->isAdmin() || empty($data['authorId'])) {
            $data['authorId'] = $request->user()->id;
        }
        $post = Post::create($data);

        return response()->json(['success' => true, 'post' => $this->sanitize($post)], 201);
    }

    public function show(Request $request, Post $post)
    {
        abort_unless($request->user()?->canManagePost($post), 403);

        return ['success' => true, 'post' => $this->sanitize($post->load('category:id,name,slug'))];
    }

    public function update(Request $request, Post $post)
    {
        abort_unless($request->user()?->canManagePost($post), 403);
        $post->update($this->validated($request, $post->id));

        return ['success' => true, 'post' => $this->sanitize($post->refresh())];
    }

    public function destroy(Request $request, Post $post)
    {
        abort_unless($request->user()?->canManagePost($post), 403);
        $post->delete();

        return ['success' => true];
    }

    private function sanitize(Post $post): Post
    {
        return \App\Support\PublicApi::sanitizeContent($post);
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:post,slug'.($ignoreId ? ','.$ignoreId : '')],
            'content' => ['required', 'string', 'max:60000'],
            'published' => ['nullable', 'boolean'],
            'featuredImage' => ['nullable', 'string', 'max:255', new SafePublicUrl],
            'categoryId' => ['nullable', 'integer', 'exists:category,id'],
            'createdAt' => ['nullable', 'date'],
            'metaTitle' => ['nullable', 'string', 'max:255'],
            'metaDescription' => ['nullable', 'string', 'max:1000'],
            'authorId' => $request->user()?->isAdmin()
                ? [
                    'nullable',
                    'integer',
                    Rule::exists('user', 'id')->where(fn ($query) => $query->whereIn('role', [User::ROLE_ADMIN, User::ROLE_WRITER])),
                ]
                : ['prohibited'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['published'] = (bool) ($data['published'] ?? false);
        $data['content'] = HtmlSanitizer::clean($data['content']);

        return $data;
    }
}
