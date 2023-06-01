<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('type',$request->type)->paginate(30);
       
        return view('dashboard.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'mobile' => 'required|unique:users|max:11|min:11',
            'name' => 'required|min:2|max:191',
            'password' => 'required|min:3|max:191',
            'commission' => 'required|integer',

        ]);
    
      $request->merge(['password' => bcrypt($request->password)]);

        User::create($request->all());
        
        session()->flash('msg', __('messages.store' , ['params' =>  __('input.design')]));
        return redirect()->route('user.index',['type'=>'OPERATOR']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('dashboard.user.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $user = User::find($id);
        
        $validated = $request->validate([
        'mobile' => 'unique:users,mobile,'.$user->id,
            'name' => 'required|min:2|max:191',
            'commission' => 'required|integer',

        ]);
    
        if(request()->has('password')){
             $request->merge(['password' => bcrypt($request->password)]);
    
        }
        $user->update($request->all());
        
        session()->flash('msg', __('messages.update' , ['params' =>  __('input.design')]));
        
        return redirect()->route('user.index',['type'=>'OPERATOR']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
