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
        <?php
        // Css
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/letbootstrap.css', [\yii\bootstrap\BootstrapAsset::className()]);
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/let.css', [\yii\bootstrap\BootstrapAsset::className()]);
        
        // Javascript
        $this->registerJsFile($this->theme->baseUrl . '/assets/js/let.js', [\yii\web\JqueryAsset::className()]);
        ?>
        <?php $this->head() ?>
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