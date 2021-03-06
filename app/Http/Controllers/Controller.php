<?php

namespace App\Http\Controllers;

use App\Constants\DefaultValues;
use App\Constants\ResponseStatuses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Core\Responses\Success;
use App\Core\Responses\Fail;
use App\Core\Responses\Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successfullResponse($data = null)
    {
        return response()->json($data);
    }

    protected function unsuccessfullResponse($data = null)
    {
        return response()->json(new Success($data));
    }

    protected function failWithMessage($message)
    {
        return response()->json(Fail::withMessage($message));
    }

    protected function errorResponse($message, $e)
    {
        try {
            $m = "USER : ";
            $m = $m . auth()->user()->email . "\n";
            $m = $m . "USER ERROR : ";
            $m = $m . $message . "\n";
            $m = $m . "EXCEPTION : ";
            $m = $m . $e->getMessage() . "\n";

            Log::critical($m);
            return response()->json(new Error($message));
        } catch (\Exception $ex) {
            Log::critical($e->getMessage());
            return response()->json(new Error($message));
        }
    }

    protected function systemErrorResponse($e)
    {
        try {
            $m = "USER : ";
            $m = $m . auth()->user()->email . "\n";
            $m = $m . "USER ERROR : ";
            $m = $m . DefaultValues::SISTEMSKA_GRESKA . "\n";
            $m = $m . "EXCEPTION : ";
            $m = $m . $e->getMessage() . "\n";

            Log::critical($m);
            return response()->json(DefaultValues::SISTEMSKA_GRESKA, 400);
        } catch (\Exception $ex) {
            Log::critical($e->getMessage());
            return response()->json(DefaultValues::SISTEMSKA_GRESKA, 400);
        }
    }

    protected function failWithValidationErrors($errors)
    {
        $errors = [
            'errors' => $errors,
        ];

        return Response::json($errors, 400);
    }

    protected function failWithErrors($errorMessages)
    {
        $errors = [
            'errors' => $errorMessages,
        ];

        return Response::json($errors, 400);
    }

    protected function failWithError($errorMessage)
    {
        $errors = [
            'errors' => [$errorMessage],
        ];

        return Response::json($errors, 400);
    }

    protected function try($callback)
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            return $this->systemErrorResponse($e);
        }
    }
}
