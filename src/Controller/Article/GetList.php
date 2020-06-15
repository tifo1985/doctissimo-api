<?php

namespace App\Controller\Article;

use App\Model\Article;
use App\Repository\ArticleRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @SWG\Tag(name="Articles", description="All Articles routes")
 */
class GetList
{
    /**
     * @Route("/api/articles", name="article_list", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(
     *         @SWG\Property(
     *             property="data",
     *             type="array",
     *             @SWG\Items(ref=@Model(type=Article::class, groups={"get_article"}))
     *         )
     *     )
     * )
     */
    public function __invoke(ArticleRepository $articleRepository, SerializerInterface $serializer): Response
    {
        $articles = $articleRepository->findAll();
        $response = new Response($serializer->serialize(['data' => $articles], 'json'), Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}