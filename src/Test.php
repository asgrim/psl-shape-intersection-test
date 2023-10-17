<?php

declare(strict_types=1);

namespace PslShapeIntersectionTest;

use Psl\Type as T;

/** @psalm-suppress UnusedClass */
final class Test
{
    /** @return array{key1: string, key2: int} */
    public function coerceArray(array $unknownType): array
    {
        $type = T\intersection(
            T\shape([
                'key1' => T\string(),
            ], true),
            T\shape([
                'key2' => T\int(),
            ], true)
        );
        /** @psalm-trace $type */
        $coerced = $type->coerce($unknownType);
        /** @psalm-trace $coerced */
        return $coerced;
    }
}
