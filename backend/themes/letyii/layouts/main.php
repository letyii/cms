<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <?php
        ///////////////// Css /////////////////
        $this->registerCssFile($this->theme->baseUrl . '/css/jquery-ui.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/jquery.gritter.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/jquery.dataTables.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/prettyPhoto.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/fullcalendar.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/font-awesome.min.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/style.css');
        $this->registerCssFile($this->theme->baseUrl . '/css/let.css');
        
        ///////////////// Javascript /////////////////
        // Bootstrap JS
        $this->registerJsFile($this->theme->baseUrl . '/js/bootstrap.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery UI
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery-ui.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery flot
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.flot.min.js', [\yii\web\JqueryAsset::className()]);
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.flot.pie.min.js', [\yii\web\JqueryAsset::className()]);
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.flot.resize.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery Knob
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.knob.js', [\yii\web\JqueryAsset::className()]);
        // jQuery Data Tables
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.dataTables.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery Knob
        $this->registerJsFile($this->theme->baseUrl . '/js/bootstrap-switch.min.js', [\yii\web\JqueryAsset::className()]);
//        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.rateit.min.js');
        // jQuery prettyPhoto
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.prettyPhoto.js', [\yii\web\JqueryAsset::className()]);
        // jquery slim scroll
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.slimscroll.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery gritter
        $this->registerJsFile($this->theme->baseUrl . '/js/jquery.gritter.min.js', [\yii\web\JqueryAsset::className()]);
        // jQuery full calendar
        $this->registerJsFile($this->theme->baseUrl . '/js/fullcalendar.min.js', [\yii\web\JqueryAsset::className()]);
        // Respond JS for IE8
        $this->registerJsFile($this->theme->baseUrl . '/js/respond.min.js', [\yii\web\JqueryAsset::className()]);
        // HTML5 Support for IE
        $this->registerJsFile($this->theme->baseUrl . '/js/html5shiv.js', [\yii\web\JqueryAsset::className()]);
        // Let custom
        $this->registerJsFile($this->theme->baseUrl . '/js/let.js', [\yii\web\JqueryAsset::className()]);
        ?>

        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/css/style-ie.css" />
        <![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
    </head>

    <body>
        <?php $this->beginBody() ?>
        
        <?php echo $content; ?>
        
        <!-- Scroll to top -->
        <span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
        <?php $this->endBody() ?>
    </body>	
</html>
<?php $this->endPage() ?>
