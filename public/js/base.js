;(function () {
    'use strict';  //严格模式

    angular.module('blog', [
        'ui.router'   //必须加载的 route   注册下面的 provider
    ]) //使用模块
        .config(function ($interpolateProvider,
                         $stateProvider,
                         $urlRouterProvider)
        { //注入一个初始化服务
            //解决和laravel 的标签冲突
            $interpolateProvider.startSymbol('[:');
            $interpolateProvider.endSymbol(':]');

            $urlRouterProvider.otherwise('/home'); // 没有一条规则满足路由

            $stateProvider
                .state('home', {
                    url: '/home',
                    template: '首页'
                })
        })
})();