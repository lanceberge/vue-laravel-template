<?php

namespace App\Data;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class EmailSubscriptionDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $field,
        public readonly bool $enabled,
    ) {
    }
}
