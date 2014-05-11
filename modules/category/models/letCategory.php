<?php

namespace app\modules\category\models;

use Yii;
use app\modules\category\models\letCategoryQuery;

/**
 * This is the model class for table "letyii_category".
 *
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 */
class letCategory extends base\letCategoryBase {
    
    public $position; // children | before | after
    public $relationId; // ID of category

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'letyii_category';
    }
    
    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'level'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['module'], 'string', 'max' => 50],
            [['position'], 'string'],
            [['relationId'], 'integer'],
        ];
    }

    public function behaviors() {
        return [
            'NestedSetBehavior' => [
                'class' => 'app\modules\category\behaviors\nestedset\NestedSet',
                'hasManyRoots' => true
            ]
        ];
    }

    public static function find() {
        return new letCategoryQuery(get_called_class());
    }
    
    public static function saveItem($data, $id = 0) {
        // Get relation model
        $relation = self::findOne($data['letCategory']['relationId']);
        if ($relation === null)
            return false;

        // Get Model
        if ($id > 0) { // truong hop update
            $model = self::findOne($id);
            if ($model === null)
                return false;
        } else { // truong hop create
            $model = new letCategory;
        }
        
        // Save Node
        $model->title = $data['letCategory']['title'];
        $model->module = $relation->module; // Module trung voi module cua doi tuong can quan he
//        $model->saveNode();

        // Category position
        if ($id > 0) { // truong hop update
            switch ($data['letCategory']['position']) {
                case 'children':
                    $model->moveAsFirst($relation);
                    break;
                case 'before':
                    $model->moveBefore($relation);
                    break;
                case 'after':
                    $model->moveAfter($relation);
                    break;
            }
        } else { // truong hop create
            switch ($data['letCategory']['position']) {
                case 'children':
                    $model->appendTo($relation);
                    break;
                case 'before':
                    $model->insertBefore($relation);
                    break;
                case 'after':
                    $model->insertAfter($relation);
                    break;
            }
        }
    }

    /**
     * Get module list for category
     * @return array
     */
    public static function getModules() {
        $modules = array();
        foreach (array_keys(Yii::$app->modules) as $module) {
            if (in_array($module, array('debug', 'gii', 'category'))) // Bo qua 1 so module khong dung cho category
                continue;
            $modules[$module] = $module;
        };
        return $modules;
    }
    
    /**
     * Get category cua tat ca cac module hoac cho tung module. Trong truong hop module do chua co danh muc root thi se tao danh muc root
     * @param string $module
     * @param string $prefix
     * @return array
     */
    public static function getCategory($module = '', $prefix = '') {
        $level = NULL;
        $categorys = array();
        
        if (empty($module) OR !in_array($module, self::getModules()))
            $data = self::find()->addOrderBy('lft')->all();
        else {
            $root = self::find()
            ->where('module = :module', [':module' => $module])
            ->andWhere('lft = 1')
            ->addOrderBy('lft')->one();
            if ($root === null) {
                // Create root for module
                $root = new letCategory;
                $root->title = $module;
                $root->module = $module;
                $root->saveNode();
            }
            $data = self::find()
                ->where('module = :module', [':module' => $module])
                ->andWhere('lft != 1')
                ->addOrderBy('lft')->all();
            
            $categorys[$root->id] = 'Danh mục gốc của module: ' . $root->module;
        }
        foreach ($data as $category) {
            if ($level == NULL)
                $level = $category->level - 1;
            $categorys[$category->id] = str_repeat($prefix, ($category->level - $level)) . $category->title;
        };
        return $categorys;
    }
}
