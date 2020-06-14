<?php

namespace App\Repository;

interface CollectionInterface
{
    /**
     * Find all entities.
     */
    public function findAll(): array;
}
