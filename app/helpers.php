<?php

use App\Exceptions\AppError;
use Illuminate\Http\Response;
use App\Exceptions\BadRequestException;

function error(\Exception $error): Response
{
    $statusCode = ($error instanceof AppError) ? $error->statusCode : 500;
    $message = ($error instanceof AppError) ? $error->errorMessage : 'Internal Server Error';

    $errorData = [
        'statusCode' => $statusCode,
        'message' => $message
    ];

    if ($error instanceof BadRequestException) {
        $errorData['params'] = $error->params;
    }

    return new Response($errorData, $statusCode);
}

function ok($data = []): Response {
    return new Response($data);
}

function okNoContent(): Response {
    return new Response(null, 204);
}

/**
 * @throws BadRequestException
 */
function dispatchError($validator){
    if ($validator->fails()) {
        throw new BadRequestException($validator->errors()->first(), array_map(function($arr){
            return $arr[0];
        }, $validator->errors()->toArray()));
    }
}

function fixRatingValues($food) {
    $food->rating_note_total = intval($food->rating_note_total);

    $rating_note_total = $food->rating_note_total;
    $rating_total = $food->rating_total;

    $isMoreThanZero = ($rating_note_total > 0 && $rating_total > 0);
    $food->rating_media =  $isMoreThanZero ? ($rating_note_total / $rating_total) : 0;
    $food->rating_media = intval($food->rating_media);

    return $food;
}
