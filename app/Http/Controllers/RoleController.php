<?php

namespace App\Http\Controllers;

use App\Entities\Role;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Authorizable;

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    /**
     * RoleController constructor.
     */
    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->all();
        $permissions = $this->permissionRepository->all();

        return view('role.index', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if (Role::create($request->only('name'))) {
            flash('Role Added');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $role = $this->roleRepository->findById($id);

        if ($role) {
            if ($role->name === 'Admin') {
                $role->syncPermissions($this->permissionRepository->all());

                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            flash($role->name . ' permissions has been updated.');
        } else {
            flash()->error('Role with id ' . $id . ' not found.');
        }

        return redirect()->route('roles.index');
    }
}
