<?php

function array_flatten()
{
        $result = [];
            array_walk_recursive(func_get_args(), function($x, $y) use (&$result) {
                        $result[$x] = $y;
                            });
            return $result;
}

$a = ['a' => 'b', 'b' => 'c'];

var_dump(array_flatten($a));
var_dump(array_flatten($a, ['a' => 'd', 'c' => 'd']));

