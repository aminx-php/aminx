<?php
require '../vendor/autoload.php';

use Amp\Loop;

function tick()
{
    echo "tick\n";
}

echo "-- before Loop::run()\n";

Loop::run(function() {
    Loop::repeat(1000, "tick");
    Loop::delay(5000, "Amp\\Loop::stop");
});

echo "-- after Loop::run()\n";