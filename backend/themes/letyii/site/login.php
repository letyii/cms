<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo Html::encode($this->title) ?></title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


        <!-- Font awesome CSS -->
        <link href="css/font-awesome.min.css" rel="stylesheet">		
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/style-ie.css" />
        <![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
    </head>

    <body>
        <div class="out-container">
            <div class="login-page">
                <div class="container">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#login" data-toggle="tab"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li><a href="#register" data-toggle="tab"><i class="fa fa-pencil"></i> Register</a></li>
                        <li><a href="#contact" data-toggle="tab"><i class="fa fa-envelope"></i> Contact</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="login">

                            <div class="alert alert-warning">Just <strong>Click "Submit"</strong> to visit the Dashboard</div>

                            <!-- Login form -->
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <?php echo $form->field($model, 'username') ?>
                                    <!--<input type="text" class="form-control" id="email" placeholder="Email">-->
                                </div>
                                <div class="form-group">
                                    <?php echo $form->field($model, 'password')->passwordInput() ?>
<!--                                    <label for="password">Password</label>-->
                                    <!--<input type="password" class="form-control" id="password" placeholder="Password">-->
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <?php echo $form->field($model, 'rememberMe')->checkbox(); ?> Remember Me Next Time
                                    </label>
                                </div>
                                <?php echo Html::submitButton('Login', ['class' => 'btn btn-danger btn-sm', 'name' => 'login-button']) ?>
                                <!--<button type="submit" class="btn btn-danger btn-sm">Submit</button>-->
                                <button type="reset" class="btn btn-black btn-sm">Reset</button>
                            <?php ActiveForm::end(); ?>

                        </div>


                        <div class="tab-pane fade" id="register">
                            <!-- Register form -->

                            <form role="form" action="index.html">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Agree <a href="#">Terms & Conditions</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                <button type="reset" class="btn btn-black btn-sm">Reset</button>
                            </form>

                        </div>


                        <div class="tab-pane fade" id="contact">

                            <!-- Contact Form -->

                            <form role="form" action="index.html">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea rows="3" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                <button type="reset" class="btn btn-black btn-sm">Reset</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>	

        </div>


        <!-- Javascript files -->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Respond JS for IE8 -->
        <script src="js/respond.min.js"></script>
        <!-- HTML5 Support for IE -->
        <script src="js/html5shiv.js"></script>

    </body>	
</html>
