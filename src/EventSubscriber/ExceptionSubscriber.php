<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{

    public const GLOBAL_MESSAGE = 'Un problème est survenue, veuillez contacter un administrateur';

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                ['returnResponseException', 0],
            ]
        ];
    }

    public function returnResponseException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $response = new JsonResponse([
            'message' => self::GLOBAL_MESSAGE,
            'error' => json_decode($exception->getMessage(), true) ?? $exception->getMessage(),
            'status' => defined(get_class($exception) . '::STATUS') ? $exception::STATUS : ''
        ], $exception instanceof HttpException ? $exception->getStatusCode() : 500);

        $event->setResponse($response);
    }
}
