<?php

namespace App\Livewire\Admin\Management\User;

use Flux\Flux;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\On;

class UserActions extends Component
{

    public $name, $email, $role, $status;

    public $isUpdateUserMode = false;
    public $userId = '';

    #[On('addUser')]
    public function addUser()
    {
        //dd('ok');
        $this->isUpdateUserMode = false;
        $this->resetData();
        Flux::modal('action-user')->show();
    }

    public function createUser()
    {
        //dd($this->all());
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
            'role' => $this->role,
            'status' => $this->status,
        ]);
        $this->modal('action-user')->close();

        Flux::toast(
            heading: 'Thành công',
            text: 'Thêm người dùng thành công.',
            variant: 'success',
        );

        $this->dispatch('reloadData');
    }

    #[On('editUser')]
    public function editUser($id)
    {
        $this->resetData();
        $user = User::findOrFail($id);

        $this->userId = $user->id;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->status = $user->status;

        $this->isUpdateUserMode = true;
        Flux::modal('action-user')->show();
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
        ]);
        $this->modal('action-user')->close();

        Flux::toast(
            heading: 'Thành công',
            text: 'Cập nhật người dùng thành công.',
            variant: 'success',
        );

        $this->dispatch('reloadData');
    }

    #[On('deleteUser')]
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;

        $this->name = $user->name;

        Flux::modal('delete-user')->show();
    }

    public function deleteUserConfirm()
    {
        $user = User::findOrFail($this->userId);

        $user->delete();

        Flux::toast(
            heading: 'Thành công',
            text: 'Xoá người dùng thành công.',
            variant: 'success',
        );

        Flux::modal('delete-user')->close();

        $this->dispatch('reloadData');
    }

    public function resetData()
    {
        $this->reset([
            'name',
            'email',
            'role',
            'status',
            'userId'
        ]);
        $this->isUpdateUserMode = false;
        $this->resetErrorBag();
    }

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . ($this->userId ?? ''),
            'role' => 'required|in:admin,manager,staff',
            'status' => 'required|in:active,locked,pending',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Họ và tên là bắt buộc.',
            'name.max' => 'Họ và tên không quá 255 ký tự.',

            'email.required' => 'Email là bắt buộc nhập.',
            'email.max' => 'Email không quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',

            'role.required' => 'Vui lòng chọn chức vụ.',
            'role.in' => 'Chức vụ không hợp lệ.',

            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ];
    }

    public function updatedName($value)
    {
        if ($value) {
            $this->resetErrorBag('name');
        }else{
            $this->addError('name','Họ và tên là bắt buộc.');
        }
    }

    public function render()
    {
        return view('livewire.admin.management.user.user-actions');
    }
}
