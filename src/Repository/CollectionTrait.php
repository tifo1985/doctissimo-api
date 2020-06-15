<?php

namespace App\Repository;

use App\Model\Article;
use PDO;

trait CollectionTrait
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $queryString = sprintf('SELECT * FROM %s', self::TABLE_NAME);
        $query = $this->getConnection()->getInstance()->query($queryString);

        return $query->fetchAll(PDO::FETCH_CLASS, Article::class);
    }
}
