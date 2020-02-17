<?php

namespace App\GraphQL\Types;

use App\WishlistItem;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class WishlistItemType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Wishlist Item',
        'description' => 'A wishlist item',
        'model' => WishlistItem::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the wishlist item',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the wishlist item',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The description of the wishlist item',
            ],
            'link' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The link of the wishlist item',
            ],
            'buyer' => [
                'type' => GraphQL::type('User'),
                'description' => 'The user who will buy this wishlist item',
            ]
        ];
    }
}
