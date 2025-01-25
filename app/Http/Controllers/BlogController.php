<?php

namespace App\Http\Controllers;

use App\Data\BlogPostDTO;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog/Blog', [
            'posts' => $this->getPosts(),
        ]);
    }

    public function show(string $slug)
    {
        return Inertia::render('Blog/Post', [
            'content' => $this->getPost($slug),
        ]);
    }

    private function getPosts()
    {
        $postFiles = File::files(resource_path('blog'));

        $posts = array_map(function ($file) {
            $slug = Str::slug(pathinfo($file->getFilename(), PATHINFO_FILENAME));
            $content = File::get($file->getPathname());
            $title = $this->extractTitleFromContent($content);

            return new BlogPostDTO(
                title: $title,
                slug: $slug,
            );
        }, $postFiles);

        return $posts;
    }

    private function getPost(string $slug)
    {
        $filePath = resource_path("blog/{$slug}.md");

        if (!File::exists($filePath)) {
            return null;
        }

        $content = File::get($filePath);

        $html = Str::markdown($content);
        return $html;
    }

    private function extractTitleFromContent(string $content)
    {
        return trim(explode("\n", $content)[0], "# \t\n\r\0\x0B");
    }
}
