<?php

require_once __DIR__ . '/vendor/autoload.php';

use Comprehension\{ClarityJson, Achievements};

$router = new \Bramus\Router\Router();

$router->mount('/api/method', function() use ($router)
{
    $router->get('/(\w+)(/\d+)?', function($method, $gid = null)
    {
        $ex = new Achievements(__DIR__ . '/base.json');

        switch ($method)
        {
            case 'getAll':
                ClarityJson::view(200, ClarityJson::prepareDone($ex->getAll()));
                break;

            case 'getByGid':
                if (!$gid) {
                    to404();
                    break;
                }
                $let = $ex->getByGid($gid);

                if (!empty($let))
                    ClarityJson::view(200, ClarityJson::prepareDone($ex->getByGid($gid)));
                else
                    ClarityJson::view(200, ClarityJson::prepareDone($ex->getByGid($gid), false));
                break;

            default:
                to404();
                break;
        }
    });
});

$router->set404(fn() => to404());

$router->run();

function to404() {
    ClarityJson::view(400, ClarityJson::prepareFail(10, 'Unknown method or params'));
}