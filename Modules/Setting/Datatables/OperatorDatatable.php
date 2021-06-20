<?php

namespace Modules\Setting\Datatables;

use Livewire\Event;
use App\Entities\Role;
use App\Datatables\Column;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\User;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Modules\Setting\Constants\UserConstant;
use Modules\Setting\Http\Requests\UserRequest;

class OperatorDatatable extends TableComponent
{
    use Notify;

    /** @var null|string|bool */
    public $pid;
    public $name = null;
    public $email = null;
    public $status = null;
    public $role = null;
    public $password = null;
    public $passwordConfirmation = null;

    /** @var array */
    public array $roles;

    /** @var object */
    protected UserRequest $request;

    /** @var bool|string table component */
    public $cardHeaderAction = 'setting::role.operator-component';

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->request = new UserRequest();
    }

    /**
     * Reset value
     *
     * @return void
     */
    public function resetValue(): void
    {
        $this->pid = null;
        $this->name = null;
        $this->email = null;
        $this->role = null;
        $this->status = null;
        $this->password = null;
        $this->passwordConfirmation = null;
    }

    public function create(): Event
    {
        $this->resetValue();
        return $this->emit('modal:toggle');
    }

    public function save()
    {
        $this->validate($this->request->rules(), [], $this->request->attributes());

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'status' => $this->status,
                'email_verified_at' => now(),
            ]);

            $user->assignRole(Role::whereId($this->role)->first());
            $this->resetValue();
            $this->emit('modal:toggle');
            return $this->success('Berhasil!', 'Pengguna baru berhasil ditambahkan');
        } catch (\Throwable $t) {
            return $this->error('Oops!', 'Terjadi kesalahan');
        }
    }

    public function edit(string $id)
    {
        $this->pid = $id;
        $user = User::whereId($id)->first();
        $this->name = $user->name;
        $this->role = $user->roles->pluck('id')->first();
        $this->email = $user->email;
        $this->status = $user->status;
        $this->emit('modal:toggle');
    }

    public function update()
    {
        $this->validate($this->request->rules(false, $this->pid), [], $this->request->attributes());

        try {
            $user = User::whereId($this->pid)->first();
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);

            DB::table('model_has_roles')->where('model_uuid', $user->id)->delete();
            
            $user->assignRole(Role::whereId($this->role)->first());
            
            $this->resetValue();
            $this->emit('modal:toggle');
            return $this->success('Berhasil!', 'Pengguna baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th);
            return $this->error('Oops!', 'Terjadi kesalahan');
        }
    }

    /**
     * Delete bill
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if ($user = User::whereId($id)->first()) {
                $user->delete();
                DB::table('model_has_roles')->where('model_uuid', $user->id)->delete();
                return $this->success('Berhasil!', 'Pengguna berhasil dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function query(): Builder
    {
        return User::query()->withoutSuperAdmin();
    }

    public function columns(): array
    {
        return [
            Column::make('no')->rowIndex(),
            Column::make('nama', 'name')
                ->searchable()
                ->sortable(),
            Column::make('email')
                ->searchable()
                ->sortable(),
            Column::make('role')
                ->searchable()
                ->sortable()
                ->format(function (User $model) {
                    return $model->getRoleNames()->first();
                }),
            Column::make('password')
                ->searchable()
                ->sortable()
                ->format(function (User $model) {
                    return str_repeat('*', 10);
                }),
            Column::make('status')
                ->searchable()
                ->sortable()
                ->format(function (User $model) {
                    return UserConstant::label($model->status);
                }),
            Column::make('aksi')
                ->format(function (User $model) {
                    return view('setting::role.operator-action', ['model' => $model]);
                })
        ];
    }
}
