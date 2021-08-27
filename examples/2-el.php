<?php

use Amp\Loop;

require '../vendor/autoload.php';

$myText = null;

function onInput($watcherId, $stream)
{
    global $myText;

    $myText = fgets($stream);
    stream_set_blocking(STDIN, true);

    Loop::cancel($watcherId);
    Loop::stop();
}

Loop::run(function() {
    echo "Please input some text: ";
    stream_set_blocking(STDIN, false);

    Loop::onReadable(STDIN, "onInput");

    Loop::delay(5000, "Amp\\Loop::stop");
});

var_dump($myText);