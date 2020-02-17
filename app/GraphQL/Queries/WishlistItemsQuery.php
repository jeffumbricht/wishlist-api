<?php

namespace App\GraphQL\Queries;

use App\WishlistItem;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class WishlistItemsQuery extends Query
{
    protected $attributes = [
        'name' => 'wishlistItems',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('WishlistItem'));
    }

    public function resolve($root, $args)
    {
        return WishlistItem::all();
    }
}
