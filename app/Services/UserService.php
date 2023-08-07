<?php
namespace App\Services;
use App\Contracts\Services\UserServiceInterface;
use App\Enums\UserRoleEnum;
use App\Models\Period;
use App\Models\PeriodUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface {
    private User $user;
    private string $password;
    public function __construct(User $user = new User()){
        $this->user = $user;
    }
    public function createUser(Request $request) : User
    {
        $this->password = $this->generateRandowmPassword();

        //refactor to period service (getIdFromYear())
        $period_id = Period::where('year', $request->year)->first()->id;

        $this->user->name = $request->name;
        $this->user->period_id = $period_id;
        $this->user->email = $request->email;
        $this->user->password = $this->password;
        $this->user->npm = $request->npm;
        $this->user->position = $request->position;
        $this->user->phone = $request->phone;

        $this->user->save();

        //refactor
        $role = $request->role === 'User' ? UserRoleEnum::USER : UserRoleEnum::PERIOD_ADMIN;

        //TODO : refactor to period_user service;
        $period_user = new PeriodUser();
        $period_user->user_id = $this->user->id;
        $period_user->role = $role->value;
        $period_user->period_id = $period_id;

        $period_user->save();



        return $this->user;
    }

    public function generateRandowmPassword($length = 10): string
    {
        return Str::random($length);
    }

    public function getPassword(){
        return $this->password;
    }
}
