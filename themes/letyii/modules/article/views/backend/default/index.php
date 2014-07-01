<?php

use app\components\LetHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\GridView;
use yii\helpers\ArrayHelper;
use app\modules\member\models\LetUser;
use app\modules\article\models\LetArticle;

$this->title = Yii::t(Yii::$app->controller->module->id, ucfirst(Yii::$app->controller->module->id));
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-2">
        <?php
        $items = [
        [
            'url' => '#section-1',
            'label' => 'Section 1',
            'icon' => 'circle-arrow-right',
            'items' => [
                 ['url' => '#section-1-1', 'label' => 'Section 1.1', 'icon' => 'arrow-right'],
                 ['url' => '#section-1-2', 'label' => 'Section 1.2', 'icon' => 'arrow-right'],
                 ['url' => '#section-1-3', 'label' => 'Section 1.3', 'icon' => 'arrow-right'],
                 ['url' => '#section-1-4', 'label' => 'Section 1.4', 'icon' => 'arrow-right'],
                 ['url' => '#section-1-5', 'label' => 'Section 1.5', 'icon' => 'arrow-right'],
            ],
        ]
        ];
        echo kartik\widgets\Affix::widget(['items' => $items]);
        ?>
    </div>
    <div class="col-lg-10">
        <div class="margin-bottom">
            <div class="btn-group pull-left">
                <?php
                if (Yii::$app->user->can(Yii::$app->controller->module->id . '.create')) {
                    echo Html::a(Yii::t('yii', 'Create'), ['backend/default/create'], [
                        'class' => 'btn btn-success',
                        'onclick' => '$("#formDefault").submit();',
                    ]);
                }

                if (Yii::$app->user->can(Yii::$app->controller->module->id . '.delete')) {
                    echo Html::button(Yii::t('yii', 'Delete'), [
                        'class' => 'btn btn-danger',
                        'onclick' => "deleteSelectedRows('" . Url::to(['/cms/backend/crud/deleteselectedrows']) . "', '" . LetArticle::tableName() . "')",
                    ]);
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <?php
        echo GridView::widget([
            'panel' => [
                'heading' => Yii::t(Yii::$app->controller->module->id, 'Article'),
    //            'after' => '{export}',
                'tableOptions' => [
                    'id' => 'listDefault',
                ],
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\CheckboxColumn'],
                [
                    'attribute' => 'id',
                    'mergeHeader' => TRUE,
                    'hAlign' => 'center',
                ],
                'title',
                [
                    'attribute' => 'category_id',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function ($model, $index, $widget) {
                        if (!empty($model->category_id) AND is_array($model->category_id)) {
                            $result = '';
                            foreach ($model->category as $key => $value) {
                                $result .= Html::tag('div', Html::a($value->title, '#'));
                            }
                            return $result;
                        }
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => app\modules\category\models\LetCategory::getCategory('article', '- '),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Tìm theo danh mục'],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'image',
                    'mergeHeader' => TRUE,
                    'hAlign' => 'center',
                    'value' => function ($model, $index, $widget) {
                        if (!empty($model->image))
                            return Html::img(LetHelper::getFileUploaded($model->image), [
                                'class' => 'img-thumbnail',
                            ]);
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'creator',
                    'vAlign' => 'middle',
                    'value' => function ($model, $index, $widget) {
                        if (isset($model->creatorBy->username)) {
                            return Html::a($model->creatorBy->username, ['/member/backend/default/view', 'id' => $model->creatorBy->id], [
                                'title' => 'View author detail',
                            ]);
                        }
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(LetUser::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => Yii::t('member', 'Select user')],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'editor',
                    'vAlign' => 'middle',
                    'value' => function ($model, $index, $widget) {
                        if (isset($model->editorBy->username)) {
                            return Html::a($model->editorBy->username, ['/member/backend/default/view', 'id' => $model->editorBy->id], [
                                'title' => 'View author detail',
                            ]);
                        }
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(LetUser::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => Yii::t('member', 'Select user')],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'status',
                    'class' => '\app\components\BooleanColumn',
    //                'trueLabel' => 'Yes',
    //                'falseLabel' => 'No'
                ],
                [
                    'class' => '\app\components\ActionColumn',
        //            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
                ],
            ],
            'responsive' => true,
            'hover' => true,
        ]);
        ?>
    </div>
</div>

