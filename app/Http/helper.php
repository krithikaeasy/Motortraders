<?php

use Carbon\Carbon;

function getValidationMsg($data, $msg = 'Validation error!')
{
    return response()->json(['data' => $data, 'message' => $msg], 422);
}

function getServerErrorMsg($msg = 'Something went wrong!', $httpCode = 500)
{
    return response()->json(['message' => $msg], $httpCode);
}

function getClientErrorMsg($msg = 'Something went wrong!', $httpCode = 400)
{
    return response()->json(['message' => $msg], $httpCode);
}

function getCreateMsg($msg = 'Created successfully.', $data = null)
{
    return response()->json(['data' => $data, 'message' => $msg], 201);
}

function getSuccessMsg($data, $msg = '')
{
    return response()->json(['data' => $data, 'message' => $msg], 200);
}

function getRandomSting()
{
    return time() . '-' . uniqid();
}

function getRandomFileName($extension)
{
    return getRandomSting() . '.' . $extension;
}

function setFlashMsg($data, $key)
{
    request()->session()->flash($key, $data);
}

function setSuccessFlashMsg($data)
{
    setFlashMsg($data, 'success_msg');
}

function setErrorFlashMsg($data = 'Something went wrong!')
{
    setFlashMsg($data, 'error_msg');
}

function setWarningFlashMsg($data)
{
    setFlashMsg($data, 'warning_msg');
}

function setInfoFlashMsg($data)
{
    setFlashMsg($data, 'info_msg');
}

function isValidDate($date)
{
    return strtotime($date);
}

function arrayNullAsEmpty(array $input)
{
    return array_map(function ($val) {
        return $val === null ? '' : $val;
    }, $input);
}

function convertDbDate($date, $format = 'Y-m-d', $elseResponse = null)
{
    if ($date) {
        return Carbon::createFromFormat('d/m/Y', $date)->format($format);
    } else {
        return $elseResponse;
    }
}

function dbDateToNormal($date, $format = 'd/m/Y', $elseResponse = null)
{
    if ($date) {
        return Carbon::parse($date)->format($format);
    } else {
        return $elseResponse;
    }
}