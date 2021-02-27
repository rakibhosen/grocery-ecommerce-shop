<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;
use App\Models\Admin;
use App\User;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role.view|role.create|role.edit|role.delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role.create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role.edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role.delete', ['only' => ['destroy']]);
    // }

    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
     
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $permission = Permission::get();
        $roles = Role::orderBy('id','asc')->paginate(5);
        // return view('admin.pages.roles.index',compact('roles','permission'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);

        $all_permissions  = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
         return view('admin.pages.roles.index', compact('all_permissions', 'permission_groups','roles','permission'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);
    
        // $role = Role::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
    
        // return redirect()->route('roles.index')
        //                 ->with('success','Role created successfully');

        
        // Process Data
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        Toastr::success('Role added successfully :)','Success');
        
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('admin.pages.roles.show',compact('role','rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        // $role = Role::find($id);
        // $permission = Permission::get();
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //     ->all();
        $role = Role::findById($id, 'admin');
        $all_permissionss = Permission::all();
        $permission_groupss = User::getpermissionGroups();
        return view('admin.pages.roles.edit', compact('role', 'all_permissionss', 'permission_groupss'));
    
        // return view('admin.pages.roles.edit',compact('role','permission','rolePermissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
        Toastr::success('Role updated successfully :)','Success');
        return redirect()->route('roles.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        DB::table("roles")->where('id',$id)->delete();
        Toastr::success('Role deleted successfully :)','Success');
        return redirect()->route('roles.index');
                        
    }
}