<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Blog
{
    public static function getPosts()
    {
        $postFiles = File::files(resource_path('blog'));
        $posts = [];

        foreach ($postFiles as $file) {
            $slug = Str::slug(pathinfo($file->getFilename(), PATHINFO_FILENAME));
            $content = File::get($file->getPathname());
            $title = self::extractTitleFromContent($content);

            $posts[] = [
                'slug' => $slug,
                'title' => $title,
                'content' => $content,
            ];
        }

        return $posts;
    }

    public static function getPost($slug)
    {
        $filePath = resource_path("posts/{$slug}.md");

        if (!File::exists($filePath)) {
            return null;
        }

        $content = File::get($filePath);
        $title = self::extractTitleFromContent($content);

        return [
            'slug' => $slug,
            'title' => $title,
            'content' => $content,
        ];
    }

    private static function extractTitleFromContent($content)
    {
        // Extract the first line as the title (assuming Markdown format)
        return trim(explode("\n", $content)[0], "# \t\n\r\0\x0B");
    }
}
