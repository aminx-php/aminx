
<?php

use Amp\Loop;

require '../vendor/autoload.php';

// defer
// Loop::run(function() {
//     echo "line 1\n";
//     Loop::defer(function() {
//         echo "line 3\n";
//     });
//     echo "line 2\n";
// });

// delay
// Loop::run(function() {
//     Loop::delay(3000, "Amp\\Loop::stop");
// });

// repeat
Loop::run(function() {
    Loop::repeat(100, function($watcherId) {
        static $i = 0;
        if ($i++ < 3) 
            echo "tick\n";
        else 
            Loop::cancel($watcherId);
    });
});