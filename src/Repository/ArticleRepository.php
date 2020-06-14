<?php

namespace App\Repository;

use Symfony\Component\Security\Http\Util\TargetPathTrait;

class ArticleRepository extends AbstractRepository implements CollectionInterface, EntityInterface
{
    use CollectionTrait;
    use EntityTrait;

    const TABLE_NAME = 'article';
}