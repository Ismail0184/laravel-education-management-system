<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function fileUpload(Request $req){
        $req->validate([
          'imageFile' => 'required',
          'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
    
        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
                $image_full_name = auth()->user()->name.'.'.$ext;
       
                $image_path=public_path().'/uploads/'. $image_full_name;
                
                // remove old image
                if(file_exists($image_path)) {
                  unlink($image_path);
                }
    
                // imge upload
                $file->move(public_path().'/uploads/', $image_full_name);  
                // image url
                
        
                //save in user table
                auth()->user()->update([
                    'image_name' => $image_full_name,
                    'image_path' => $image_path,
                    ]);        
            }
    
           return back()->with('success', 'File has successfully uploaded!');
        }
      }
}
