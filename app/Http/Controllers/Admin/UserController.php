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

    public function index(){
        return Inertia::render('Admin/User/Index');
    }

    public function create(){

        $periods = Period::all()->map(function ($period){
            return $period->year;
        });

        return Inertia::render('Admin/User/Create', [
            'periods' => $periods,
        ]);
    }

    public function store(Request $request){
        $userService = new UserService();
        $user = $userService->createUser($request);

        Mail::to($user)->send(new UserInvitation($user, $userService->getPassword()));

        return redirect(route('admin.dashboard'));



        //TODO : Implement upload image on user profile
        //        $imageService = new ImageService(User::first());
//        $image = $imageService->uploadImage($request->file('image'), 'images');
    }
}
