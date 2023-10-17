# azjezz/psl intersection + shape issue

set up with PHP 8.2 + do `composer install`...

then running `vendor/bin/psalm`: 

```bash
Target PHP version: 8.2 (inferred from current PHP version).
Scanning files...
Analyzing files...

E

ERROR: InvalidReturnType
at /home/james/workspace/me/psl-shape-intersection-test/src/Test.php:12:17
The declared return type 'array{key1: string, key2: int}' for PslShapeIntersectionTest\Test::coerceArray is incorrect, got 'array{key1: string}' (see https://psalm.dev/011)
    /** @return array{key1: string, key2: int} */


ERROR: Trace
at /home/james/workspace/me/psl-shape-intersection-test/src/Test.php:24:9
$type: Psl\Type\TypeInterface<array{key1: string}> (see https://psalm.dev/224)
        /** @psalm-trace $type */
        $coerced = $type->coerce($unknownType);


ERROR: Trace
at /home/james/workspace/me/psl-shape-intersection-test/src/Test.php:26:9
$coerced: array{key1: string} (see https://psalm.dev/224)
        /** @psalm-trace $coerced */
        return $coerced;


ERROR: InvalidReturnStatement
at /home/james/workspace/me/psl-shape-intersection-test/src/Test.php:26:16
The inferred type 'array{key1: string}' does not match the declared return type 'array{key1: string, key2: int}' for PslShapeIntersectionTest\Test::coerceArray (see https://psalm.dev/128)
        return $coerced;


------------------------------
4 errors found
------------------------------
Psalm can automatically fix 1 of these issues.
Run Psalm again with 
--alter --issues=InvalidReturnType --dry-run
to see what it can fix.
------------------------------

Checks took 0.78 seconds and used 126.958MB of memory
Psalm was able to infer types for 100% of the codebase
```
