;(function () {
    'use strict';  //严格模式

    angular.module('blog', [
        'ui.router'   //必须加载的 route   注册下面的 provider
    ]) //使用模块
        .config([
            '$interpolateProvider',
            '$stateProvider',
            '$urlRouterProvider',
            function ($interpolateProvider,
                      $stateProvider,
                      $urlRouterProvider) { //注入一个初始化服务
                //解决和laravel 的标签冲突
                $interpolateProvider.startSymbol('[:');
                $interpolateProvider.endSymbol(':]');

                $urlRouterProvider.otherwise('/home'); // 没有一条规则满足路由

                $stateProvider
                    .state('home', {
                        url: '/home',
                        templateUrl: 'home.tpl'
                    })
                    .state('signup', {
                        url: '/signup',
                        templateUrl: 'signup.tpl'
                    })
                    .state('login', {
                        url: '/login',
                        templateUrl: 'login.tpl'
                    })
            }])

        .service('UserService', [
            '$http',
            function ($http) {
                var me = this;
                me.signug_data = {};
                me.signug = function () {
                    console.log(1)
                    $http.post('/blog/auth/register', me.signug_data)
                        .then(function (r) {

                        }, function (e) {

                        })
                }
                me.username_exists = function () {
                    $http.post('/blog/auth/exist',
                        {username: me.signug_data.username})
                        .then(function (r) {
                            //成功
                            me.signug_username_exists = false;
                            if (r.data.errno === 402)
                                me.signug_username_exists = true;
                        }, function (e) {
                            //失败
                            console.log('e', e)
                        })
                }
            }])

        .controller('SignupController', [
            '$scope',
            'UserService',
            function ($scope, UserService) {
                $scope.User = UserService;
                $scope.$watch(function () {
                    return UserService.signug_data;
                }, function (n, o) {
                    if (n.username !== o.username)
                        UserService.username_exists()
                }, true) // 第三个参数递归的检测
            }])
})();