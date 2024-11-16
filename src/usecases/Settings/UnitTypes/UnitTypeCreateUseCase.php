<?php

namespace Vertuoza\Usecases\Settings\UnitTypes;
use React\Promise\Promise;

use React\Promise\PromiseInterface;
use Vertuoza\Api\Graphql\Context\UserRequestContext;
use Vertuoza\Repositories\RepositoriesFactory;
use Vertuoza\Repositories\Settings\UnitTypes\UnitTypeMutationData;
use Vertuoza\Repositories\Settings\UnitTypes\UnitTypeRepository;

class UnitTypeCreateUseCase
{
    private UnitTypeRepository $unitTypeRepository;
    private UserRequestContext $userContext;

    public function __construct(
        RepositoriesFactory $repositories,
        UserRequestContext $userContext
    ) {
        $this->unitTypeRepository = $repositories->unitType;
        $this->userContext = $userContext;
    }

    /**
     * @param string $name name of the unit type to create
     * @return PromiseInterface<UnitTypeEntity>
     */
    public function handle(string $name): PromiseInterface
    {
        return new Promise(function ($resolve, $reject) use ($name) {
            try {
                $tenantId = $this->userContext->getTenantId(); // Fetch the current tenant ID
                $data = new UnitTypeMutationData(['name' => $name]); // Create data object
                $newId = $this->unitTypeRepository->create($data, $tenantId); // Call repository method
                
                // Fetch the created entity or return a confirmation
                $resolve([
                    'id' => $newId,
                    'name' => $name,
                ]);
            } catch (\Exception $exception) {
                $reject($exception);
            }
        });
    }
        
}
