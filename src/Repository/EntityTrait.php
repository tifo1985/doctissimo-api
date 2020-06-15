<?php

namespace App\Repository;

use App\Exception\ArticleNotFoundException;
use App\Model\Article;
use PDO;

trait EntityTrait
{
    /**
     * {@inheritdoc}
     */
    public function findOneById(int $id)
    {
        $queryString = sprintf('SELECT * FROM %s where id=?', self::TABLE_NAME);
        $query = $this->getConnection()->getInstance()->prepare($queryString);
        $query->setFetchMode(PDO::FETCH_CLASS, Article::class);
        $query->execute([$id]);
        $article = $query->fetch();
        if (false === $article) {
            throw new ArticleNotFoundException();
        }

        return $article;
    }
}
