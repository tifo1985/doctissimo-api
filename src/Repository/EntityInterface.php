<?php

namespace App\Repository;

interface EntityInterface
{
    /**
     * Find one entitie by ID.
     *
     * @return mixed
     */
    public function findOneById(int $id);
}
