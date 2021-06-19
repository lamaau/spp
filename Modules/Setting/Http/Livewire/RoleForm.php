<?php

namespace Modules\Setting\Http\Livewire;

use App\Entities\Role;
use Livewire\Component;
use App\Entities\Permission;
use Illuminate\Validation\Rule;
use App\Datatables\Traits\Notify;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Constants\RoleModuleConstant;

class RoleForm extends Component
{
    use Notify;

    /** @var bool */
    public $isUpdate = false;

    /** @var string */
    public $role;
    public $module = 'master';

    /** @var array */
    public $permission_values = [];

    /** @var object */
    public $roleObject;

    protected $listeners = [
        'edit' => 'editPermission'
    ];

    public function resetValue()
    {
        $this->role = null;
        $this->module = 'master';
        $this->permission_values = [];
        $this->isUpdate = false;
    }

    public function savePermission()
    {
        $this->validate([
            'role' => ['required', Rule::unique('roles', 'name')],
            'permission_values' => ['required']
        ], [], ['permission_values' => 'Hak akses']);

        $role = Role::create(['name' => $this->role]);
        $role->syncPermissions($this->permission_values);

        $this->success('Berhasil!', 'Role berhasil ditambah.');
        $this->emitTo('role-table', 'added');
        $this->resetValue();
    }

    public function editPermission($id)
    {
        $this->module = '*';
        DB::enableQueryLog();
        $this->roleObject = Role::whereId($id)->first();
        // dd($this->roleObject);
        // dd(DB::getQueryLog());
        $this->role = $this->roleObject->name;
        $this->permission_values = [];
        $this->roleObject->permissions->each(function ($p) {
            // important, permission_values need string
            // if integer given, the checkbox keeped old value.
            $this->permission_values[] = (string) $p->id;
        });

        $this->isUpdate = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'role' => ['required'],
            'permission_values' => ['required']
        ], [], ['permission_values' => 'Hak akses']);
        
        $this->roleObject->update(['name' => $this->role]);
        $this->roleObject->syncPermissions($this->permission_values);
        $this->success('Berhasil!', 'Role berhasil diubah.');
        $this->emitTo('role-table', 'added');
        $this->resetValue();
    }

    public function render()
    {
        return view('setting::role.livewire.form', [
            'modules' => RoleModuleConstant::labels(),
            'permissions' => Permission::when($this->module === '*' ? false : true, function ($query) {
                $query->where('module', $this->module);
            })->select('id', 'display_name')->get(),
        ]);
    }
}
