<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\LockedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();

    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.http_not_found')], $e->getStatusCode());
        });

        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.access_denied')], $e->getStatusCode());
        });

        $exceptions->render(function (BadRequestHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.bad_request')], $e->getStatusCode());
        });

        $exceptions->render(function (ConflictHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.conflict')], $e->getStatusCode());
        });

        $exceptions->render(function (GoneHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.gone')], $e->getStatusCode());
        });

        $exceptions->render(function (LengthRequiredHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.length_required')], $e->getStatusCode());
        });

        $exceptions->render(function (LockedHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.locked')], $e->getStatusCode());
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.method_not_allowed')], $e->getStatusCode());
        });

        $exceptions->render(function (NotAcceptableHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.not_acceptable')], $e->getStatusCode());
        });

        $exceptions->render(function (PreconditionFailedHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.precondition_failed')], $e->getStatusCode());
        });

        $exceptions->render(function (PreconditionRequiredHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.precondition_required')], $e->getStatusCode());
        });

        $exceptions->render(function (ServiceUnavailableHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.service_unavailable')], $e->getStatusCode());
        });

        $exceptions->render(function (TooManyRequestsHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.too_many_requests')], $e->getStatusCode());
        });

        $exceptions->render(function (UnauthorizedHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.unauthorized')], $e->getStatusCode());
        });

        $exceptions->render(function (UnprocessableEntityHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.unprocessable_entity')], $e->getStatusCode());
        });

        $exceptions->render(function (UnsupportedMediaTypeHttpException $e, Request $request) {
            return response()->json(['message' => __('exceptions.unsupported_media_type')], $e->getStatusCode());
        });


    })->create();
