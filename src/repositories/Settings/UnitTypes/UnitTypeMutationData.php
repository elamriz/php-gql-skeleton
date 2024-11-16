<?php

namespace Vertuoza\Repositories\Settings\UnitTypes;

class UnitTypeMutationData
{
    public string $name;

    /**
     * Constructor to initialize data
     *
     * @param array $data The data used to create a unit type
     */
    public function __construct(array $data)
    {
        if (!isset($data['name']) || empty($data['name'])) {
            throw new \InvalidArgumentException('The name field is required.');
        }
        
        $this->name = $data['name'];
    }
}
