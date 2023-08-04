<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserInvitation;
use App\Models\Period;
use App\Models\User;
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
            'periods' => $periods
        ]);
    }

    public function store(Request $request){

        $password = Str::random();
        $period_id = Period::where('year', $request->year)->first()->id;

        //image is not work yet

        $user = User::create([
            'period_id' =>  $period_id,
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => $password,
            'npm' => $request->npm,
            'position' => $request->position,
            'phone' => $request->phone
        ]);
        Mail::to($user)->send(new UserInvitation($user, $password));

        return redirect(route('admin.dashboard'));
    }
}
