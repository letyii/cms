<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assetbundle\BackendAsset;

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo Html::encode($this->title) ?></title>
        <?php
        // Css
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/letbootstrap.css', [\yii\bootstrap\BootstrapAsset::className()]);
        $this->registerCssFile($this->theme->baseUrl . '/assets/css/let.css', [\yii\bootstrap\BootstrapAsset::className()]);

        // Javascript
//        $this->registerJsFile($this->theme->baseUrl . '/assets/js/let.js', [\yii\web\JqueryAsset::className()]);
        ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php echo $this->render('//block/_box_menu'); ?>
                <div class="logo">
                    <div class="container">
                        <img src="http://wbpreview.com/previews/WB00C40H4/images/logo.png" alt="Letyii CMS" />
                    </div>
                </div>
            <div class="container">

                <?php echo $this->render('//block/_box_breadcrumbs'); ?>
                <?php echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
                <?php echo $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; LetYii Team <?php echo date('Y') ?></p>
                <p class="pull-right">Powered by LetYii</p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
