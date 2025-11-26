<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user()->load('favorites');
        
        return view('profile-show', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Sessão expirada. Faça login novamente.');
        }

        $validator = Validator::make($request->all(), [
            'profile_description' => 'nullable|string|max:200',
            'name' => 'nullable|string|max:20',
            'profile_color' => 'nullable|string|size:7',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.show')
                ->withErrors($validator)
                ->withInput();
        }


        $updateData = $request->only(['profile_description', 'profile_color', 'name']);

        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $destinationPath = public_path('assets/images');

            $fileName = 'user_' . $user->id . '.' . $image->getClientOriginalExtension();

            $image->move($destinationPath, $fileName);

            $updateData['profile_photo'] = 'assets/images/' . $fileName;
        }

        $user->update($updateData);

        return redirect()->route('profile.show');
    }
}
