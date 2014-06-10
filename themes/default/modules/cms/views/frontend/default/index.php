<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<header>
    <div class="logo">
        <a id="logo" rel="home" title="Home" href="/">
            <img alt="Home" src="http://demo.opensourcecms.com/drupal/themes/bartik/logo.png">
        </a>
    </div>
    <nav role="navigation" class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button data-target="#bs-example-navbar-collapse-9" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-9" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Đăng nhập</strong></h3></div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['role' => 'form'],
            ]); ?>
            <div class="form-group">
                <?php echo $form->field($model, 'username')->textInput(['placeholder' => 'Tên truy cập'])->label('username') ?>
            </div>
            <div class="form-group">
                <?php echo $form->field($model, 'password')->passwordInput()->label('password') ?>
            </div>
            <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
            <?php echo Html::submitButton('Đăng nhập', ['class' => 'btn btn-success btn-sm']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Tin tức mới nhất</strong></h3></div>
        <div class="panel-body">
            <h2>Hàng 9 cột cho medium device</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Đăng nhập</strong></h3></div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['role' => 'form'],
                    ]); ?>
                    <div class="form-group">
                        <?php echo $form->field($model, 'username')->textInput(['placeholder' => 'Tên truy cập'])->label('username') ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->field($model, 'password')->passwordInput()->label('password') ?>
                    </div>
                    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                    <?php echo Html::submitButton('Đăng nhập', ['class' => 'btn btn-success btn-sm']) ?>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
        <div class="col-md-9 column">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Brand</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Link</a>
                        </li>
                        <li>
                            <a href="#">Link</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">One more separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input class="form-control" type="text" />
                        </div> <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Link</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
            <div class="jumbotron">
                <h1>
                    Hello, world!
                </h1>
                <p>
                    This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="#">Learn more</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <h2>
                Heading
            </h2>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
                <a class="btn" href="#">View details »</a>
            </p>
        </div>
        <div class="col-md-4 column">
            <h2>
                Heading
            </h2>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
                <a class="btn" href="#">View details »</a>
            </p>
        </div>
        <div class="col-md-4 column">
            <h2>
                Heading
            </h2>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
                <a class="btn" href="#">View details »</a>
            </p>
        </div>
    </div>
</div>
