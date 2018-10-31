<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    /**
     * @param $request
     * @param $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiException($request, $e)
    {
        if ($this->isModel($e))
            return $this->ModelResponse($e);

        if ($this->isHttp($e))
            return $this->HttpRespons($e);

        return parent::render($request, $e);
    }

    private function isModel($e){
        return $e instanceof ModelNotFoundException;
    }

    private function isHttp($e) { //true route ?
        return $e instanceof NotFoundHttpException;
    }

    private function ModelResponse($e){
        return response()->json([
            'errors'=>'Product Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    private function HttpRespons($e) {
        return response()->json([
            'errors'=>'Incorect route'
        ], Response::HTTP_NOT_FOUND);
    }
}