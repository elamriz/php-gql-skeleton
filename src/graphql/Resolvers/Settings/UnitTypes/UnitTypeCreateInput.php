<?php

namespace Vertuoza\Api\Graphql\Resolvers\Settings\UnitTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;
use Vertuoza\Api\Graphql\Types;

class UnitTypeCreateInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'UnitTypeCreateInput',
            'description' => 'Input payload for creating a unit type',
            'fields' => function () {
                return [
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'The name of the unit type to create',
                    ],
                ];
            },
        ];
        parent::__construct($config);
    }
}
