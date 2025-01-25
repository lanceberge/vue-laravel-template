<?php

namespace App\Data;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BlogPostDTO
{
    public function __construct(
        public string $slug,
        public string $title,
    ) {
    }
}
