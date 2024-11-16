<?php

namespace Vertuoza\Api\Graphql\Resolvers\Settings\UnitTypes;

use GraphQL\Type\Definition\NonNull;
use Vertuoza\Api\Graphql\Context\RequestContext;
use Vertuoza\Api\Graphql\Types;
use React\Promise\Promise;
use GraphQL\Error\UserError;

class UnitTypeMutation
{
    static function get()
    {
        return [
            'unitTypeCreate' => [
                'type' => Types::get(UnitType::class),
                'args' => [
                    'input' => new NonNull(Types::get(UnitTypeCreateInput::class)),
                ],
                'resolve' => function ($rootValue, $args, RequestContext $context): Promise {
                    return new Promise(function ($resolve, $reject) use ($context, $args) {
                        $context->useCases->unitType->unitTypeCreate->handle($args['input']['name'])
                            ->then(
                                function ($result) use ($resolve) {
                                    $resolve($result);
                                },
                                function (\Exception $e) use ($reject) {
                                    $error = new UserError($e->getMessage(), [
                                        'category' => 'VALIDATION_ERROR',
                                        'code' => 'DUPLICATE_NAME'
                                    ]);
                                    $reject($error);
                                }
                            )
                            ->otherwise(function (\Exception $e) use ($reject) {
                                $reject(new UserError('An unexpected error occurred'));
                            });
                    });
                },
            ],
        ];
    }
}