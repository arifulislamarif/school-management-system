<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','developer@mail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Zakir Soft";
            $user->email = "developer@mail.com";
            $user->image = "backend/image/defult.png";
            $user->password = bcrypt('12345678');
            $user->email_verified_at = Carbon::now();
            $user->remember_token = Str::random(10);
            $user->save();
        }
    }
}
