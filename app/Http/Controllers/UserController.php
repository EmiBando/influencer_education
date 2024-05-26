<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
    return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
 
        $validator = User::validateProfile($request->all(), $request->user()->id);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $user = auth()->user();
        if ($request->hasFile('profileImage')) {
            $path = $request->file('profileImage')->store('profileImages', 'public');
            $user->profile_image = $path;
        }
    
        $validated_data = $validator->validated();
        $validated_data['profileImage'] = $user->profileImage ?? $user->profileImage; 
        $user->updateProfile($validated_data);
    
        return back()->with('success', 'プロフィールを更新しました。');
    }

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $validator = User::validatePassword($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません。']);
        }

        $user->updatePassword($request->newPassword);
        return redirect()->route('user.profile')->with('success', 'パスワードが更新されました。');
    }
    
}
