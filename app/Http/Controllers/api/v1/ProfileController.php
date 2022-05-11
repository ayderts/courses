<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Course;
use App\Models\User;
use App\Services\ProfileService;
use CloudCreativity\LaravelJsonApi\Contracts\Store\StoreInterface;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchRelationship;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct(ProfileService $profileService)
    {
        $this->middleware('auth:api');
        $this->profileService = $profileService;
    }

    /**
     * Get the authenticated User.
     *
     */
    public function me()
    {
        $user = auth('api')->user();
        return ProfileResource::make($user);
    }
    public function update(ProfileRequest $request){
        $user = auth('api')->user();

        return $this->profileService->update($user['id'],$request->all());
    }
    public function avatar(AvatarRequest $request){

        $user = auth('api')->user();

        return $this->profileService->updateAvatar($request);
    }

}
