<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Inertia\Inertia;

class BlogController extends Controller
{
    protected Collection $posts;

    public function __construct()
    {
        $this->posts = collect([
            'hello_slug' => [
                'page' => 'Hello', // name of the vue component
                'title' => 'Hello', // title of the blog post
                'date' => '2025-02-22',
            ],
        ]);
    }

    public function index()
    {
        return Inertia::render('Blog/Blog', [
            'posts' => $this->posts->map(function ($post, $key) {
                return [
                    'slug' => $key,
                    'title' => $post['title'],
                    'date' => $post['date'],
                ];
            })->values()
        ]);
    }

    public function show(string $slug)
    {
        $post = $this->posts->get($slug);
        $page = $post['page'];

        if (!$post) {
            redirect()->back();
        }

        return Inertia::render('Blog/BlogPost', $post);
    }
}
