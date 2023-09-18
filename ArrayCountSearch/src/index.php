<?php

declare(strict_types=1);

class ArrayCountSearch
{

    public function __construct(
        private array $arrayWords = [
            'fruit' => ['apple', 'pear', 'strawberry', 'cheer'],
            'red' => ['strawberry', 'cheer', 'tomato'],
            'sweet' => ['sugar', 'cake', 'strawberry'],
        ]
    )
    {
    }

    public function countSearch(string $search = 'strawberry'): int
    {
        $count = 0;

        array_walk_recursive($this->arrayWords, function ($word) use (&$count, $search) {
            $count += (int)($word === $search);
        });

        return $count;

    }
}

$arrayCountSearch = new ArrayCountSearch();

echo $arrayCountSearch->countSearch();
