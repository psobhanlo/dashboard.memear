<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::query()->where('type', $request->type)->orderBy('id', 'DESC')->paginate(30);

        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.user.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->type == 'USER') {

            $request->validate([
                'mobile' => 'required|unique:users|max:11|min:11',
                'name' => 'required|min:2|max:191',
                'type' => 'required',
            ]);

            $request->merge(['password' => bcrypt(13465987)]);

            User::query()->create($request->all());

            session()->flash('msg', __('messages.store', ['params' => __('input.customer')]));
            return redirect()->route('user.index', ['type' => 'USER']);

        } else {

            $request->validate([
                'mobile' => 'required|unique:users|max:11|min:11',
                'name' => 'required|min:2|max:191',
                'password' => 'required|min:3|max:191',
                'commission' => 'required|integer',
                'type' => 'required',
            ]);

            $request->merge(['password' => bcrypt($request->password)]);

            User::query()->create($request->all());

            session()->flash('msg', __('messages.store', ['params' => __('input.design')]));
            return redirect()->route('user.index', ['type' => 'OPERATOR']);
        }
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
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::query()->find($id);

        if ($request->type == 'USER') {

            $request->validate([
                'mobile' => 'unique:users,mobile,' . $user->id,
                'name' => 'required|min:2|max:191',
                'type' => 'required',

            ]);

            $user->update($request->all());

            session()->flash('msg', __('messages.update', ['params' => __('input.customer')]));
            return redirect()->route('user.index', ['type' => 'USER']);

        } else {

            $request->validate([
                'mobile' => 'unique:users,mobile,' . $user->id,
                'name' => 'required|min:2|max:191',
                'commission' => 'required|integer',
                'type' => 'required',
            ]);

            if (request()->has('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            $user->update($request->all());

            session()->flash('msg', __('messages.update', ['params' => __('input.design')]));
            return redirect()->route('user.index', ['type' => 'OPERATOR']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request): JsonResponse
    {
        $search = $request->search;
        $users = User::query()
            ->where('type', 'USER')
            ->where(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('id', $search)
                    ->orWhere('mobile', 'like', '%' .  $search . '%');
            })
            ->orderBy('id', 'DESC')
            ->take(30)
            ->select(['id', 'name', 'mobile', 'type'])
            ->get();

        return response()->json($users);
    }
}
