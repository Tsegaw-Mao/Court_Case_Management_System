<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Plaintiff;
use App\Models\Attorney;
use App\Models\Detective;
use App\Models\Defendant;
use App\Models\Judge;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest('id')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                ->withSuccess('New user is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();
 
        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = $request->except('password');
        }
        
        $user->update($input);

        $user->syncRoles($request->roles);

        $rolesss = [];
        $rolesss['roles'] = $request->roles;
        $rolesss['uid'] = $request->email;
        $rolesss['name'] = $request->name;
        if($rolesss != null){
            $this->addUser($rolesss);
        }

        return redirect()->back()
                ->withSuccess('User is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
                ->withSuccess('User is deleted successfully.');
    }
    public function addUser($rolesss)
    {
        foreach ($rolesss['roles'] as $role) {
            if ($role == 'judge' || $role == 'admin_judge') {
                $user = User::where('email', $rolesss['uid'])->first();
                $exist = Judge::where('UserId', $user->UserId)->first();
                if($exist != null) {}
                else{
                $judge = Judge::create([
                    'UserId' => $user->UserId,
                    'FirstName' => $user->name,
                    'email' => $user->email

                ]);}
            } elseif ($role == 'attorney' || $role == 'admin_attorney') {
                $user = User::where('email', $rolesss['uid'])->first();
                $exist = Attorney::where('UserId', $user->UserId)->first();
                if($exist != null) {}
                else{
                $attorney = Attorney::create([
                    'UserId' => $user->UserId,
                    'FirstName' => $user->name,
                    'email' => $user->email

                ]);}
            } elseif ($role == 'detective' || $role == 'admin_detective') {
                $user = User::where('email', $rolesss['uid'])->first();
                $exist = Detective::where('UserId', $user->UserId)->first();
                if($exist != null) {}
                else{
                $detective = Detective::create([
                    'UserId' => $user->UserId,
                    'FirstName' => $user->name,
                    'email' => $user->email

                ]);}
            } elseif ($role == 'plaintiff') {
                $user = User::where('email', $rolesss['uid'])->first();
                $exist = Plaintiff::where('UserId', $user->UserId)->first();
                if($exist != null) {}
                else{
                $plaintiff = Plaintiff::create([
                    'UserId' => $user->UserId,
                    'FirstName' => $user->name,
                    'email' => $user->email

                ]);}
            } elseif ($role == 'defendant') {
                $user = User::where('email', $rolesss['uid'])->first();
                $exist = Defendant::where('UserId', $user->UserId)->first();
                if($exist != null) {}
                else{
                $defendant = Defendant::create([
                    'UserId' => $user->UserId,
                    'FirstName' => $user->name,
                    'email' => $user->email

                ]);}
            }

        }
    }
}