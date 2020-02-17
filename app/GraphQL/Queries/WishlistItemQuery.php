<?php

namespace App\GraphQL\Queries;

use App\WishlistItem;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class WishlistItemQuery extends Query
{
    protected $attributes = [
        'name' => 'wishlistItem',
    ];

    public function type(): Type
    {
        return GraphQL::type('WishlistItem');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return WishlistItem::findOrFail($args['id']);
    }
}
