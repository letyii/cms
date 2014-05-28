<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
        ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            $modules = [];
            foreach (array_keys(Yii::$app->modules) as $module){
                if (in_array($module, ['cms', 'debug', 'gridview']))
                    continue;

                if ($module == 'gii')
                    $modules[] = ['label' => 'Gii', 'url' => ['/' . $module]];
                else
                    $modules[] = ['label' => Yii::t($module, ucfirst($module)), 'url' => ['/' . $module . '/backend/default/index']];

            }
            if (!empty($modules))  {
                $modules = ['label' => 'Modules', 'items' => $modules];
            }
            NavBar::begin([
                'brandLabel' => 'LetYii CMS 1.0 Alpha',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-static-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => 'Home', 'url' => Url::home()],
                    $modules,
                    ['label' => Yii::t('yii', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/member/backend/auth/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?php echo $this->render('//block/_box_breadcrumbs'); ?>
                <?php echo
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
                <?php echo $this->render('//block/_box_message'); ?>
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
