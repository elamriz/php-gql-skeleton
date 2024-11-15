<?php

namespace Vertuoza\Entities\Settings;

class CollaboratorEntity
{
  public string $id;
  public string $name;
  public ?string $firstName; //made it nullable to avoid an error
}
