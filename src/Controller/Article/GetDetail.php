<?php

namespace App\Controller\Article;

use App\Exception\ArticleNotFoundException;
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
class GetDetail
{
    /**
     * @Route("/api/articles/{id}", name="article_details", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(
     *         @SWG\Property(
     *             property="data",
     *             type="object",
     *             ref=@Model(type=Article::class, groups={"get_article"})
     *         )
     *     )
     * )
     *
     * @SWG\Response(response=404, description="Return message Article not found",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="message", type="string", example="Un problème est survenue, veuillez contacter un administrateur"),
     *          @SWG\Property(property="error", type="string", example="Article not found"),
     *          @SWG\Property(property="status", type="string", example=ArticleNotFoundException::STATUS),
     *     )
     * )
     */
    public function __invoke(ArticleRepository $articleRepository, SerializerInterface $serializer, int $id)
    {
        $article = $articleRepository->findOneById($id);
        $response = new Response($serializer->serialize(['data' => $article], 'json'), Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}