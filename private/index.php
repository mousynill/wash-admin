<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
require_once('../src/innerRoutes/uploadwithxlsx.php');
require_once('../src/innerRoutes/try.php');
require_once('../src/innerRoutes/online.php');
require_once('../src/innerRoutes/offline.php');

$app->run();
