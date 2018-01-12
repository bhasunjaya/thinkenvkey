#!/usr/bin/env php
<?php
if (file_exists(__DIR__ . '/../../../autoload.php')) {
    require __DIR__ . '/../../../autoload.php';
} else {
    require __DIR__ . '/../vendor/autoload.php';
}
try {
    $envloy = new Bhasunjaya\Envkey\Envkey;
    $envloy->parse();
} catch (Exception $e) {
    echo "\r\nOh Snap: {$e->getMessage()}\r\n";
    // Return 1 to indicate error to caller
    exit(1);
}