<?php

use yii\rbac\Item;
use app\rbac\NotGuestRule;

$notGuest = new NotGuestRule();

return [
    'rules' => [
        $notGuest->name => serialize($notGuest),
    ],
    'items' => [
        // HERE ARE YOUR MANAGEMENT TASKS
        'manageThing0' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'ruleName' => null, 'data' => null],
        'manageThing1' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'ruleName' => null, 'data' => null],
        'manageThing2' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'ruleName' => null, 'data' => null],
        'manageThing3' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'ruleName' => null, 'data' => null],
        // AND THE ROLES
        'guest' => [
            'type' => Item::TYPE_ROLE,
            'description' => 'Guest',
            'ruleName' => null,
            'data' => null
        ],
        'user' => [
            'type' => Item::TYPE_ROLE,
            'description' => 'User',
            'children' => [
                'guest',
                'manageThing0', // User can edit thing0
            ],
            'ruleName' => $notGuest->name,
            'data' => null
        ],
        'moderator' => [
            'type' => Item::TYPE_ROLE,
            'description' => 'Moderator',
            'children' => [
                'user', // Can manage all that user can
                'manageThing1', // and also thing1
            ],
            'ruleName' => null,
            'data' => null
        ],
        'admin' => [
            'type' => Item::TYPE_ROLE,
            'description' => 'Admin',
            'children' => [
                'moderator', // can do all the stuff that moderator can
                'manageThing2', // and also manage thing2
            ],
            'ruleName' => null,
            'data' => null
        ],
        'godmode' => [
            'type' => Item::TYPE_ROLE,
            'description' => 'Super admin',
            'children' => [
                'admin', // can do all that admin can
                'manageThing3', // and also thing3
            ],
            'ruleName' => null,
            'data' => null
        ],
    ],
];