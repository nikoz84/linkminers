<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'teste@gmail.com')->get()->first();

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Amazonas',
            'ubigeoCode' => '01',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Áncash',
            'ubigeoCode' => '02',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Apurímac',
            'ubigeoCode' => '03',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Arequipa',
            'ubigeoCode' => '04',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Cusco',
            'ubigeoCode' => '08',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Lima',
            'ubigeoCode' => '15',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        DB::table('departments')->insert([
            'departmentId' => Str::uuid(),
            'name' => 'Tacna',
            'ubigeoCode' => '23',
            'status' => 'ACTIVE',
            'lastModifiedDate' => Carbon::now(),
            'createdDate' => Carbon::now(),
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);
    }
}
