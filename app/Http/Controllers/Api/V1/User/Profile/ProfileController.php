<?php

namespace App\Http\Controllers\Api\V1\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Profile\ProfileUpdateRequest;
use App\Http\Resources\Api\V1\User\UserProfile\UserProfileResource;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::query()
            ->where('id', auth()->id())
            ->with(['profileUser', 'avatar'] )
            ->first();

        return UserProfileResource::make($profile);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->fill($request->only('name', 'about_me'))->save();

        if ($request->hasFile('avatar')) {
            $profilePicture = $request->file('avatar');

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar->file_path);
                $user->avatar()->delete();
            }

            File::scopeUploadFile($profilePicture, $user, 'avatar', 'avatars');
        }

        if($request->filled('old_password') && $request->filled('new_password')) {
            if(Hash::check($request->input('old_password'), $user->password)) {
                $user->update([
                    'password' => Hash::make($request->input('new_password'))
                ]);
            }
        }

        return new UserProfileResource($user);
    }
}
