<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Mail\UserInvitation;
use App\Models\Period;
use App\Models\User;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {

        $users = User::with('period', 'periodUser')->where('admin', 0)->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'image' => $user->image,
                'position' => $user->position,
                'year' => $user->period->year,
                'role' => $user->periodUser->role->value
            ];
        });
        return Inertia::render('Admin/User/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {

        //TODO : refactor to user Service
        $periods = Period::all()->map(function ($period) {
            return $period->year;
        });

        return Inertia::render('Admin/User/Create', [
            'periods' => $periods,
        ]);
    }

    public function store(Request $request)
    {
        $userService = new UserService();
        $user = $userService->createUser($request);

        Mail::to($user)->send(new UserInvitation($user, $userService->getPassword()));

        return redirect(route('admin.dashboard'));


        //TODO : Implement upload image on user profile
        //        $imageService = new ImageService(User::first());
//        $image = $imageService->uploadImage($request->file('image'), 'images');
    }

    public function edit(Request $request)
    {
        $user = User::with('period', 'periodUser')->where('id', $request->input('id'))->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'image' => $user->image,
                'phone' => $user->phone,
                'npm' => $user->npm,
                'position' => $user->position,
                'year' => $user->period->year,
                'role' => $user->periodUser->role->value
            ];
        });
        return Inertia::render('Admin/User/Profile/Edit', [
            'user' => $user
        ]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->to(route('admin.users.index'));
    }

    public function update(Request $request)
    {
        $user = User::with('periodUser')->where('id', $request->id)->first();
        $user->name = $request->name;
        $user->npm = $request->npm;
        $user->phone = $request->phone;
        $user->position = $request->position;
        $user->save();
        $user->periodUser->role = $request->role;
        $user->periodUser->save();
        return back();
    }
}
