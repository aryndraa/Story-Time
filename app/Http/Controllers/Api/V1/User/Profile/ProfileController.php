<?php

namespace App\Http\Controllers\Api\V1\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Profile\ProfileUpdateRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::query()
            ->where('id', auth()->id())
            ->with(['profileUser', 'avatar'] )
            ->first();

        return response()->json($profile);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update($request->only(['name']));

        if($request->has('about_me')) {
            $user->profileUser()->updateOrCreate([], [
                'about_me' => $request->input('about_me')
            ]);
        }

        if ($request->hasFile('avatar')) {
            $profilePicture = $request->file('avatar');

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar->file_path);
                $user->avatar()->delete();
            }

            File::scopeUploadFile($profilePicture, $user, 'avatar', 'avatars');
        }

        return response()->json([
            'avatar_url' => $user->avatar->fileUrl,
        ]);
    }
}
