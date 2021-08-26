<!DOCTYPE html>
<html lang="zh" ng-app="blog">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-angular</title>
        <link rel="stylesheet" href="/node_modules/normalize-css/normalize.css">
        <link rel="stylesheet" href="/css/base.css">
        <script src="/node_modules/jquery/dist/jquery.js"></script>
        <script src="/node_modules/angular/angular.js"></script>
        <script src="/node_modules/angular-ui-router/release/angular-ui-router.js"></script>
        <script src="/js/base.js"></script>
    </head>

    <body>
    <div ng-controller="TestController">
        [: name :] => 1
    </div>
    <div>
        [: name :] => 2
    </div>
    </body>
</html>
