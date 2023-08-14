<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredUserRequest;
use App\Mail\UserInvitation;
use App\Providers\Models\Period;
use App\Providers\Models\User;
use App\Services\Period\GetPeriodService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function store(StoredUserRequest $request)
    {
        try {
            $userService = new UserService();
            $getPeriodFromYear = GetPeriodService::getFromYear($request->input('year'));
            $request->merge(['password' => $userService->generateRandomPassword(), 'period_id' => $getPeriodFromYear->id]);
            $user = $userService->createUser($request, $request->enum('role', UserRoleEnum::class));
            Mail::to($user)->send(new UserInvitation($user, $userService->getPassword()));

            return to_route('admin.users.index');
        } catch (\Throwable $exception) {
            return $exception;
        }


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
