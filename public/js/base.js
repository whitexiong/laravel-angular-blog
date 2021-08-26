;(function () {
    'use strict';  //严格模式
    angular.module('blog', []) //使用模块
        .config(function ($interpolateProvider) { //注入一个初始化服务
            //解决和laravel 的标签冲突
            $interpolateProvider.startSymbol('[:');
            $interpolateProvider.endSymbol(':]');
        })
        .controller('TestController', function ($scope) {
            $scope.name = 'blog'
        })
})();