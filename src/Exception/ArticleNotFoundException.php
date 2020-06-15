<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;

class ArticleNotFoundException extends AbstractException
{
    public function __construct()
    {
        parent::__construct(Response::HTTP_NOT_FOUND, "article not found");
    }

    public const STATUS = "ARTICLE_NOT_FOUND";
}
