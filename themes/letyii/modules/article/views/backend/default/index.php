<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\article\models\base\LetArticleSearch $searchModel
 */

$this->title = Yii::t('article', 'Let Article Bases');
$this->params['breadcrumbs'][] = $this->title;
?>

				<div class="container">
					<div class="page-content page-tables">
						
						<div class="widget">
                           <div class="widget-head">
                              <h5>Table #1</h5>
                           </div>
                           <div class="widget-body no-padd">
								<div class="table-responsive">
								  <table class="table table-hover table-bordered ">
								   <thead>
									 <tr>
									   <th>#</th>
									   <th>Name</th>
									   <th>Location</th>
									   <th>Age</th>
									   <th>Education</th>
									 </tr>
								   </thead>
								   <tbody>
									 <tr>
									   <td>1</td>
									   <td>Ashok</td>
									   <td>India</td>
									   <td>23</td>
									   <td>B.Tech</td>
									 </tr>
									 <tr>
									   <td>2</td>
									   <td>Kumarasamy</td>
									   <td>USA</td>
									   <td>22</td>
									   <td>BE</td>
									 </tr>
									 <tr>
									   <td>3</td>
									   <td>Babura</td>
									   <td>UK</td>
									   <td>43</td>
									   <td>PhD</td>
									 </tr>
									 <tr>
									   <td>4</td>
									   <td>Ravi Kumar</td>
									   <td>China</td>
									   <td>73</td>
									   <td>PUC</td>
									 </tr>
									 <tr>
									   <td>5</td>
									   <td>Santhosh</td>
									   <td>Japan</td>
									   <td>43</td>
									   <td>M.Tech</td>
									 </tr>                                                                        
								   </tbody>
								 </table>
                             
                             </div>
                           </div>
						   
						   <div class="widget-foot">
							
                              <ul class="pagination pull-right">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                              </ul>
                               
                               <div class="clearfix"></div>
						   </div>
						   
                        </div>
                        
					</div>
				</div>
				

<div class="let-article-base-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('article', 'Create {modelClass}', [
  'modelClass' => 'Let Article Base',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => '60px',
                ],
            ],
            'title',
            'image',
            'intro',
            [
                'class' => 'app\components\BackendActionColumn',
                'options' => [
                    'class' => 'fix_table_width',
                ],
                'template' => '{boolean}',
            ],
            [
                'class' => 'app\components\BackendActionColumn',
                'options' => [
                    'width' => '90px',
                ],
            ],
        ],
    ]); ?>

</div>
