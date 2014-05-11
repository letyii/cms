<?php
use app\assetbundle\BackendAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
BackendAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <?php
        ///////////////// Css /////////////////
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/font-awesome.min.css');
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/style.css');
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/let.css');
        
        ///////////////// Javascript /////////////////
        $this->registerJsFile($this->theme->baseUrl . '/assets/js/bootstrap.min.js', [\yii\web\JqueryAsset::className()]);
        $this->registerJsFile($this->theme->baseUrl . '/assets/js/respond.min.js', [\yii\web\JqueryAsset::className()]);
        $this->registerJsFile($this->theme->baseUrl . '/assets/js/html5shiv.js', [\yii\web\JqueryAsset::className()]);
        ?>
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/css/style-ie.css" />
        <![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
    </head>

    <body>
        <?php $this->beginBody() ?>
        <div class="out-container">
            <?php echo $content; ?>
        </div>
        <?php $this->endBody() ?>
    </body>	
</html>
<?php $this->endPage() ?>