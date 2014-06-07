<?php
/**
 * @link http://www.letyii.com/
 * @copyright Copyright (c) 2014 Let.,ltd
 * @license https://github.com/letyii/cms/blob/master/LICENSE
 * @author Ngua Go <nguago@let.vn>
 */

namespace app\components;

use yii\db\Query;
use yii\helpers\Html;

class LetRbac extends \letyii\rbaccached\RbacCached
{
    const IS_GOD = 'god';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Build tree role
     * @param string $role
     * @return array
     */
    public function buildTreeRole($role = self::IS_GOD) {
        // Get tree item
        $treeItem = $this->buildTree($role);
        $roleList = array_keys($this->getRoles());
        return $this->filterRole($treeItem, $roleList);
    }

    /**
     * Build tree from item table
     * @param string $item
     * @param integer $level
     * @return array
     */
    public function buildTree($item = self::IS_GOD, $level = 1) {
            $tree = [];
        // Get
        $childs = (new Query)->select(['child'])
            ->from($this->itemChildTable)
            ->where(['parent' => $item])
            ->column($this->db);
        foreach ($childs as $child) {
            $tree[$child] = $this->buildTree($child, ($level + 1));
        }
        if ($level == 1)
            $tree = [$item => $tree];
        return $tree;
    }

    /**
     * Create tree from array
     * @param array $tree
     * @param string $result
     * @param array $htmlOptions
     */
    public function createTreeHtml($tree, &$result = '', $htmlOptions = array()) {
        $result .= Html::beginTag('ul', $htmlOptions);
        foreach ($tree as $role => $child) {
            $result .= Html::beginTag('li');
            $result .= '<div><span><i class="fa fa-arrows"></i> ' . $role . '</span></div>';
            if (isset($child) AND !empty($child))
                $this->createTreeHtml($child, $result);
            $result .= Html::endTag('li');
        }
        $result .= Html::endTag('ul');
    }

    private function filterRole($items, $roles) {
        foreach ($items as $item => $child) {
            if (!in_array($item, $roles))
                unset ($items[$item]);
            else
                $items[$item] = $this->filterRole($child, $roles);
        }
        return $items;
    }

}
