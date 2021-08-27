<?php

use Amp\Deferred;
use Amp\Loop;

use function Amp\Promise\wait;

require '../vendor/autoload.php';

function asyncMultipy($x, $y)
{
    $defered = new Deferred;

    Loop::delay(1000, function() use ($defered, $x, $y) {
        $defered->resolve($x * $y);
    });

    return $defered->promise();
}

$promise = asyncMultipy(6, 7);
$result = wait($promise);

var_dump($result);