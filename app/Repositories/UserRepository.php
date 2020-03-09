<?php

namespace App\Repositories;

use App\Models\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class UserRepository
{
    public function getUserBySocId(UserOAuth $user, string $socName)
    {
        $userInSystem = User::query()
            ->where('social_id', $user->id)
            ->where('auth_type', $socName)
            ->first();
        if (empty($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => $user->accessTokenResponseBody['email'],
                'password' => '',
                'social_id' => !empty($user->getId()) ? $user->getId() : '',
                'auth_type' => $socName,
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
