<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // Cari role pelanggan, jika tidak ada buat default
        $pelangganRole = Role::where('name', 'pelanggan')->first();
        
        if (!$pelangganRole) {
            // Jika role pelanggan tidak ada, gunakan role default atau buat
            $pelangganRole = Role::create([
                'name' => 'pelanggan',
                'display_name' => 'Pelanggan',
                'description' => 'Regular customer'
            ]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role_id' => $pelangganRole->id,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}