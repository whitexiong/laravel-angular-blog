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
<div class="navbar clearfix">
    <div class="container">
        <div class="fl">
            <div class="navbar-item brand">blog</div>
            <div class="navbar-item">
                <input type="text">
            </div>
        </div>
        <div class="fr">
            <a ui-sref="home" class="navbar-item">首页</a>
            <a ui-sref="login" class="navbar-item">登录</a>
            <a ui-sref="signup" class="navbar-item">注册</a>
        </div>
    </div>
</div>
<div class="page">
    <div ui-view></div>
</div>


</body>
<script type="text/ng-template" id="home.tpl">
    <div class="home container">
        LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem
    </div>
</script>

<script type="text/ng-template" id="signup.tpl">
    <div ng-controller="SignupController" class="signup container">
        <div class="card">
            <h1>注册</h1>
            [: User.signug_data :]
            <form ng-submit="User.signug()">
                <div class="input-group">
                    <lable>用户名</lable>
                    <input name="username"
                           type="text"
                           ng-minlength="3"
                           ng-maxlength="24"
                           ng-model="User.signug_data.username"
                           ng-model-options="{debounce: 500}"
                           required
                    >
                    <div
{{--                            ng-if="signup_form.username.$touched"--}}
                         class="input-error-set">
                        <div ng-if="User.signug_username_exists">
                            用户名已存在
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <lable>密码</lable>
                    <input name="password"
                           type="text"
                           ng-model="User.signug_data.password"
                           ng-minlength="6"
                           ng-maxlength="255"
                           required
                    >
                </div>
                <button type="submit" ng-disabled="signug_form.$invalid">注册</button>
            </form>
        </div>
    </div>
</script>

<script type="text/ng-template" id="login.tpl">
    <div class="home container">
        登录
        LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem
    </div>
</script>
</html>
