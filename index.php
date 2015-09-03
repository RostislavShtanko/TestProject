<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim([
    'templates.path' => 'app/public/views'
    ]);
require 'app/public/controllers/BaseController.php';
require 'app/public/routes.php';
require 'config.php';

$app->run();
/*$app->get(
    '/',
    function () {
        $template = <<<EOT
<!doctype html>
    <html ng-app>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <label>Введите имя:</label>
        
        <input type="text" ng-model="name" placeholder="Введите имя">
 
        <h1>Добро пожаловать {{name}}!</h1>

        <script src="Libraries/angular.js"></script>
  </body>
</html>
EOT;
        echo $template;
    }
);*/

