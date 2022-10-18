<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->cannot('viewAny', User::class)){
            return redirectNotAuthorized('/dashboard');
        }

        return view('users.index', [
            'title' => 'Users',
            'users' => User::where('id', '!=', auth()->user()->id)->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', User::class)){
            return redirectNotAuthorized('/users');
        }

        return view('users.create', [
            'title' => 'Create New User',
            'roles' => Role::without('permissions')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->safe()->except(['password']);

        $validated['password'] = Hash::make($request->password);

        $newUser = User::create($validated);

        if ($newUser) {
            return redirect('users')->with('success', 'New User Created Successfully');
        } else {
            return redirect('users')->with('danger', 'Failed to create User');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        if($request->user()->cannot('view', User::class)){
            return redirectNotAuthorized('/users');
        }
        return view('users.show', [
            'title' => 'User Information',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        if($request->user()->cannot('create', User::class)){
            return redirectNotAuthorized('/users');
        }

        return view('users.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::without('permissions')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->username == $user->username){
            $validated = $request->safe()->except('username');
        } else {
            $validated = $request->validated();
        }
        $user->update($validated);
        $user->refresh();
        return redirect('users')->with('success', 'User Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if($request->user()->cannot('update', User::class)){
            return redirectNotAuthorized('/users');
        }
        $user->delete();
        return redirect('users')->with('success', 'User has been deleted');
    }

    public function changePassword(Request $request, User $user)
    {
        if($request->user()->cannot('changePassword', User::class)){
            return redirectNotAuthorized('/users');
        }
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data = [
            'password' => Hash::make($request->password),
        ];

        $user->update($data);
        $user->refresh();
        
        return redirect('users')->with('success', 'User Updated Successfully');
    }
}
