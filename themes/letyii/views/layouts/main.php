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
        $this->registerJsFile($this->theme->baseUrl . '/assets/js/let.js', [\yii\web\JqueryAsset::className()]);
        
        $this->head();
        
        echo Html::csrfMetaTags();
         ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php echo $this->render('//block/_box_menu_horizontal'); ?>
            <div class="let-container">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->render('//block/_box_menu_vertical'); ?>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $this->render('//block/_box_breadcrumbs'); ?>
                        <?php echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?>
                        <?php echo $this->render('//block/_box_message'); ?>
                        <?php echo $content ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="let-container">
                <p class="pull-left">&copy; LetYii Team <?php echo date('Y') ?></p>
                <p class="pull-right">Powered by LetYii</p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
