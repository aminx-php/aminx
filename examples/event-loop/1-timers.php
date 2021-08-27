<?php

use Amp\Loop;

require '../../vendor/autoload.php';

print "-- before Loop::run()" . PHP_EOL;

Loop::run(function () {
    Loop::repeat(1000, function () {
        print "++ Executing watcher created by Loop::reapeat()" . PHP_EOL;
    });

    Loop::delay(5000, function () {
        print "++ Executing watcher created by Loop::dealy()" .PHP_EOL;

        Loop::stop();
        

        print "++ Loop will continue the current tick and stop afterwards" . PHP_EOL;
    });
});
print "-- after Loop::run()" . PHP_EOL;