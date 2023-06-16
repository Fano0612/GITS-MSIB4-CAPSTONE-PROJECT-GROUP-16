<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;



class UserController extends Controller
{
    public function register()
    {
        $data['title'] = "Register";
        return view('register', $data);
    }

    public function registeracc(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:userlist',
            'email' => 'required|unique:userlist',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'access_rights' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password_confirmation.required' => 'Confirm Password is required',
            'password_confirmation.same' => 'Passwords do not match',
            'access_rights.required' => 'Access is required',
            'picture.image' => 'The file must be an image',
            'picture.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed',
            'picture.max' => 'The image size should not exceed 2048 KB'
        ]);

        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_rights' => $request->access_rights,
        ]);

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('images'), $filename);
            $user->picture = $filename;
        }

        $existing_user = User::where('username', $request->username)
            ->orWhere('email', $request->email)
            ->first();

        if ($existing_user) {
            if ($existing_user->username == $request->username) {
                return redirect()->back()->withErrors(['username' => 'Username already exists'])->withInput();
            }
            if ($existing_user->email == $request->email) {
                return redirect()->back()->withErrors(['email' => 'Email already exists'])->withInput();
            }
        }

        $user->save();
        return redirect()->route('login')->with('success', 'Data Successfully Registered');
    }


    public function login()
    {
        $data['title'] = "Login";
        return view('login', $data);
    }

    public function loginacc(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only(['email', 'password']);
    
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ])) {
    
            $user = Auth::user();
            if ($user && $user->status === 'inactive') {
                $user->status = 'active';
                $user->save();
                $request->session()->regenerate();
    
                if ($user->access_rights === 'Merchant') {
                    return redirect()->intended('product_menu');
                } else if ($user->access_rights === 'User') {
                    return redirect()->intended('homepage');
                }
            }
        }
    
        return back()->withErrors([
            'email' => 'Email or Password is incorrect',
        ]);
    }
    

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->status = 'inactive';
            $user->save();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

        }
        return view('landing');
    }


    public function AccountExist()
    {
        return view('login');
    }
    public function AccountUnexist()
    {
        return view('register');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $randomPassword = Str::random(6);
            $user->password = Hash::make($randomPassword);
            $user->save();

            return redirect()->back()->with('success', 'Your password has been reset to: ' . $randomPassword);
        } else {
            return redirect()->back()->withErrors(['email' => 'Email not found']);
        }
    }

    public function editProfile()
    {
        $data['title'] = "Edit Profile";
        $user = Auth::user();
        $data['user'] = $user;
        return view('edit_profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:userlist,username,' . Auth::user()->id,
            'email' => 'required|unique:userlist,email,' . Auth::user()->id,
            'password' => 'nullable|min:6',
            'password_confirmation' => 'nullable|same:password',
            'picture' => 'nullable|image|max:2048',
        ], [
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.min' => 'Password must be at least 6 characters',
            'password_confirmation.same' => 'Passwords do not match',
        ]);

        $existing_user = User::where('username', $request->username)
            ->orWhere('email', $request->email)
            ->first();

        if ($existing_user) {
            if ($existing_user->id != Auth::user()->id) {
                if ($existing_user->username == $request->username) {
                    return redirect()->back()->withErrors(['username' => 'Username already exists'])->withInput();
                }
                if ($existing_user->email == $request->email) {
                    return redirect()->back()->withErrors(['email' => 'Email already exists'])->withInput();
                }
            }
        }

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $file_name = $picture->getClientOriginalName();
            $file_path = $picture->move(public_path('images'), $file_name);
            $user->picture = $file_name;
        }

        $user->save();

        return redirect()->route('homepage')->with('success', 'Profile updated successfully');
    }
}
