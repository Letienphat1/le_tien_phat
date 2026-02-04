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

    #[On('addUser')]
    public function addUser()
    {
        //dd('ok');
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

    }

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
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

    public function render()
    {
        return view('livewire.admin.management.user.user-actions');
    }
}
