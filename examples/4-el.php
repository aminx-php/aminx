
<?php

use Amp\Loop;

require '../vendor/autoload.php';

const IO_GRANULARITY = 32768;

function isStreamDead($socket)
{
    return !is_resource($socket) || @feof($socket);
}

Loop::onReadable($socket, function($watcherId, $socket) {
    $socketId = intval($socket);
    $newData = @fread($socket, IO_GRANULARITY);
    if ($newData != "") {
        //parseIncrementalData($socketId, $newData);
    }elseif (isStreamDead($socketId, $newData)) {
        Loop::cancel($watcherId);
    }
});