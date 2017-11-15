<?php
require 'vendor/autoload.php';
$bh = new \Bhasunjaya\Envkey\Envkey;

$c = $bh->parse();
echo $c;
