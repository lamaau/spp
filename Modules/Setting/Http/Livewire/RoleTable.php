<?php

namespace Modules\Setting\Http\Livewire;

use App\Constants\DefaultRole;
use Livewire\Component;
use App\Entities\Permission;
use App\Datatables\Traits\Notify;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleTable extends Component
{
    use Notify;

    protected $listeners = [
        'added' => '$refresh'
    ];

    public function edit($id)
    {
        $this->emitTo('role-form', 'edit', $id);
    }

    public function deleteRole($id, $password)
    {
        if (Hash::check($password, Auth::user()->password)) {
            $role = Role::findById($id);

            if (in_array($role->name, DefaultRole::labels())) {
                return $this->error('', 'Role yang dipilih tidak valid.');
            }

            if ($role->delete()) {
                return $this->success('Berhasil!', 'Role telah dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function deletePermission($id, $password)
    {
        if (Hash::check($password, Auth::user()->password)) {
            $permission = Permission::findById($id);

            if (in_array($permission->roles()->pluck('name')->first(), DefaultRole::labels())) {
                return $this->error('', 'Role yang dipilih tidak valid.');
            }

            if ($permission->delete()) {
                return $this->success('Berhasil!', 'Hask akses telah dihapus dari role.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function render()
    {
        return view('setting::role.livewire.table', [
            'roles' => Role::latest()->paginate(10),
        ]);
    }
}