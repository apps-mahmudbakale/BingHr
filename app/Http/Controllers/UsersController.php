<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Repositories\UserRepository;
use App\Http\Requests\UserFormRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Create an instance of the controller
     *
     * @return void
     */
    public function __construct(private UserRepository $userRepository)
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::filter(request()->all())->orderBy('created_at', 'DESC')->paginate(10),
            'roles' => Role::all(),
            'permissions' => Permission::get()->mapToGroups(fn($item, $key) => [$item['entity'] => ['name' => $item['name'],'id' => $item['id']]])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $this->userRepository->create($request);

        return back()->withFlashSuccess('User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $this->userRepository->update(
            $request,
            $this->userRepository->getById($id)
        );

        return back()->withFlashSuccess('User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->deleteById($id);

        return back()->withFlashSuccess('User Deleted');
    }
}
