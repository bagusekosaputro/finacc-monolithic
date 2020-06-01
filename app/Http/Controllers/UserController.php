<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{
    protected function changePasswordValidator(array $data)
    {
        return Validator::make($data, [
            'new_password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:new_password']
            // 'current_password' => ['required', 'string', 'min:8']
        ]);
    }

    protected function profileValidator(array $data) 
    {
        return Validator::make($data, [
            'name' => ['string'],
            // 'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
    }

    public function changePassword(Request $request, $id) 
    {
        $this->changePasswordValidator($request->all())->validate();

        $result = DB::transaction(function() use ($request, $id) {
            try 
            {

                User::find($id)->update(['password'=> Hash::make($request->password)]);

                return redirect('profile/'.Auth::user()->id)->with(['success' => 'Password changed!']);
            } catch (Exception $e) 
            {
                return redirect('profile/'.Auth::user()->id)->with(['error' => $e->getMessage()]);
            }
            
        });

        return $result;
    }

    public function profile($id) 
    {
        return view('user.profile');
    }

    public function doUpdateProfile(Request $request, $id) 
    {
        $this->profileValidator($request->all())->validate();
    
        $result = DB::transaction(function() use ($request, $id) {
            try 
            {

                $user = User::find($id);
                // $file = $request->file('file');
                $user->name = $request->name;
                // $user->profile_image = $profile_image;

                $user->save();

                return redirect('profile/'.Auth::user()->id)->with(['success' => 'Profile updated!']);
            } catch (Exception $e) 
            {
                return redirect('profile/'.Auth::user()->id)->with(['error' => $e->getMessage()]);
            }
            
        });

        return $result;
    }
}