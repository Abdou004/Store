<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index(){
        $profiles = Profile::paginate(9);
        return view('profile.index',compact('profiles'));
    }
    public function show(Profile $profile){
       // $id = $request->id;
      //  $profile = Profile::findOrFail($id);
        return view('profile.show',compact('profile'));
    }
    public function create(){
        
        return view('profile.create');
    }
    public function store(ProfileRequest $request){
          //  $name = $request->name;
         //   $email = $request->email;
          //  $password = $request->password;
         //   $bio = $request->bio;

            //Validation
           $FormFields = $request->validated();
            //Hash
            $FormFields['password'] = Hash::make($request->password);
            //Insertion
           if ($request->hasFile('image')) {
            $FormFields['image'] =  $request->file('image')->store('profile','public');
        }
            Profile::create($FormFields
               // [
                // 'name' => $name,
                // 'email' => $email,
                //'password' => $password
                //'bio' => $bio,
              // ]
        );
            return redirect()->route('profiles.index')->with('success','Votre Profile est bien ajouter !');
    }
    public function destroy(Profile $profile){
        $profile->delete();
        return to_route('profiles.index')->with('success','Le Profile a Bien Ete Supprime');
    }

    public function edit(Profile $profile){
        return view('profile.edit',compact('profile'));
    }
    public function update(Profile $profile , ProfileRequest $request){
        $FormFields = $request->validated();  
        if ($request->hasFile('image')) {
            
            $FormFields['image'] =  $request->file('image')->store('profile','public');
        }
        $FormFields['password'] = Hash::make($request->password);
        $profile->fill($FormFields)->save();
        return to_route('profiles.edit',$profile->id)->with('success','Votre Profile est bien Modifier !');

    }
}
