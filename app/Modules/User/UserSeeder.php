<?php

namespace App\Modules\User;

use App\Models\User;
use App\Modules\UserRole\Model as UserRole;
use App\Modules\UserPermission\Model as UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        UserRole::truncate();

        DB::table('user_user_role')->truncate();
        DB::table('user_user_permission')->truncate();


        $user_role = new UserRole();
        $user_role->id = 10;
        $user_role->name = 'cp';
        $user_role->role_serial = 1;
        $user_role->save();

        $user_role = new UserRole();
        $user_role->id = 20;
        $user_role->name = 'sg';
        $user_role->role_serial = 2;
        $user_role->save();

        $user_role = new UserRole();
        $user_role->id = 30;
        $user_role->name = 'admin';
        $user_role->role_serial = 3;
        $user_role->save();

        $user_role = new UserRole();
        $user_role->id = 40;
        $user_role->name = 'division';
        $user_role->role_serial = 4;
        $user_role->save();

        $user_role = new UserRole();
        $user_role->id = 41;
        $user_role->name = 'visitor';
        $user_role->role_serial = 5;
        $user_role->save();


        UserPermission::truncate();

        $permission = new UserPermission();
        $user_role->id = 10;
        $permission->title = 'can_create';
        $permission->permission_serial = 1;
        $permission->save();

        $permission = new UserPermission();
        $user_role->id = 20;
        $permission->title = 'can_edit';
        $permission->permission_serial = 2;
        $permission->save();

        $permission = new UserPermission();
        $user_role->id = 30;
        $permission->title = 'can_delete';
        $permission->permission_serial = 3;
        $permission->save();

        User::truncate();

        $user = new User();
        $user->full_name = 'mr. cp';
        $user->user_name = 'mr_cp';
        $user->telegram_id = '812239513';
        // $user->role_id = 1;
        $user->phone = '016123';
        $user->email = 'cp@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach([1]);
        $user->permissions()->attach([1,2,3]);

        $user = new User();
        $user->full_name = 'mr. sg';
        $user->user_name = 'mr_sg';
        $user->telegram_id = '812239513';
        // $user->role_id = 2;
        $user->phone = '016124';
        $user->email = 'sg@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach([2]);
        $user->permissions()->attach([1,2]);

        $user = new User();
        $user->full_name = 'mr. admin';
        $user->user_name = 'admin';
        $user->telegram_id = '1235645478';
        // $user->role_id = 3;
        $user->phone = '01236485';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach([3]);
        $user->permissions()->attach([1,2,3]);

        $user = new User();
        $user->full_name = 'mr. user';
        $user->user_name = 'user';
        $user->telegram_id = '8129513';
        // $user->role_id = 3;
        $user->phone = '016125';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach([4]);
        $user->permissions()->attach([1]);


        $user = new User();
        $user->full_name = 'mr. visitor';
        $user->user_name = 'mr_visitor';
        $user->telegram_id = '81223953';
        // $user->role_id = 1;
        $user->phone = '016183';
        $user->email = 'visitor@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach([5]);
    }
}
