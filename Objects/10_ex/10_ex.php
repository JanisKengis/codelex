<?php

require_once 'Video.php';
require_once 'VideoStore.php';
require_once 'Application.php';


$app = new Application(new VideoStore([
    new Video('Godfather', 5.7),
    new Video('Inception', 6.2),
    new Video('Manifest', 8.4),
]));
$app->run();

