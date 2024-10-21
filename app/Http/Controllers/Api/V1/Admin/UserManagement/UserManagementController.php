<?php

namespace App\Http\Controllers\Api\V1\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Admin\UserManagement\indexUserManagementResource;
use App\Http\Resources\Api\V1\Admin\UserManagement\showUserManagementResource;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(10);

        return indexUserManagementResource::collection($users);
    }

    public function show(User $user)
    {
        $user->load(['profileUser', 'avatar']);
        return showUserManagementResource::make($user);
    }

    public function destroy(User $user)
    {
        $user->with('bookmarks')->each(function ($story) {
            $story->bookmarks()->delete();
        });

        $user->delete();

        return response()->json([
            'message' => "User has been deleted"
        ]);
    }



}
