<?php

use App\Http\Resources\V1\User\WebUserResource;
use App\Models\Api;
use App\Util\ApiStatus;
use App\Util\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1")->group(function () {
    Route::namespace('App\Http\Controllers\V1\Auth')->group(function () {
        Route::post('register', 'UserController@Register')->name("v1:auth:register");
        Route::post('login', 'UserController@Login')->name("v1:auth:login");
    });

    Route::middleware(['auth:sanctum','api_check'])->group(function () {
        Route::get('user', function (Request $request) {
            $resource = (new WebUserResource($request->user()));
            switch ($request->input("device_name", Api::WEB)) {
                case Api::API:
                case Api::ANDROID:
                case Api::IOS:
                case Api::WEB:
                    break;
                default:
            }
            return (new Response())->setData($resource->jsonSerialize())->setCode(ApiStatus::SUCCESS)
                ->setMessage(ApiStatus::Message(ApiStatus::SUCCESS))->toArray();
        })->name("v1:auth:user");
    });


    Route::prefix('admin')->group(function () {
        Route::namespace('App\Http\Controllers\V1\Auth')->group(function () {
            Route::post('register', 'AdminController@Register')->name("v1:auth:register");
            Route::post('login', 'AdminController@Login')->name("v1:auth:login");
        });
    });
});
