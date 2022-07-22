<?php

use Carbon\Carbon;

function responseError($code, $message, $errors = [])
{
    $output = [
        'message' => $message,
        'errors' => $errors
    ];
    return response()->json($output, $code);
}

function responseOK($data = null)
{
    return response()->json($data, 200);
}

function responseCreated($data = null)
{
    return response()->json(($data ?? []), 201);
}

function responseUpdatedOrDeleted()
{
    return response(null, 204);
}

function responseBadRequest($message)
{
    return response()->json(['message' => $message], 400);
}

function responseValidate($errors, $message = 'The given data was invalid.')
{
    $output = [
        'message' => $message,
        'errors' => $errors
    ];
    return response()->json($output, 422);
}

function responseInfoNotMatch($message)
{
    return response()->json(['message' => $message], 404);
}

function responseUnauthorized($message)
{
    return response()->json(['message' => $message], 401);
}
