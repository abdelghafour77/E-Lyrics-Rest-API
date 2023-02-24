<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
   

    public function update_profile(Request $request, int $id)
    {
        $user = User::find($id);

        $array = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password){
            $array['password'] = Hash::make($request->password);
        }

        $user->update($array);

        return response()->json([
            'message' => 'Profile successfully updated',
            'user' => $user,
        ], 200);
    }
}