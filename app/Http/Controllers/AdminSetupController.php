<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import Hash class
use App\Models\User;

class AdminSetupController extends Controller
{
    public function createAdmin()
    {
        // Check if admin user already exists
        $admin = DB::table('users')->where('email', 'admin@example.com')->first();

        if (!$admin) {
            // Create admin user
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('123456'), // Change 'password' to your desired password
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return 'Admin user created successfully.';
        }

        return 'Admin user already exists.';
    }
}
