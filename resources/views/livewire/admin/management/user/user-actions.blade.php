<div>
    <flux:modal name="action-user" class="md:w-400">
        <form wire:submit.prevent='{{ $isUpdateUserMode ? 'updateUser()' : 'createUser()' }}' class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $isUpdateUserMode ? 'Cập nhật người dùng' : 'Thêm mới người dùng' }}
                </flux:heading>
                <flux:text class="mt-2">Quản lý người dùng trong hệ thống</flux:text>
            </div>

            <flux:input label="Họ và tên" placeholder="Nhập tên" wire:model.live='name' />

            <flux:input type="email" label="Địa chỉ Email" wire:model='email' />

            <flux:select variant="listbox" placeholder="Chọn chức vụ..." label="Chức vụ" wire:model='role'>

                <flux:select.option value='admin'>
                    <div class="flex items-center gap-2">
                        <flux:icon.shield-check variant="mini" class="text-zinc-400" /> Administrator
                    </div>
                </flux:select.option>

                <flux:select.option value='manager'>
                    <div class="flex items-center gap-2">
                        <flux:icon.eye variant="mini" class="text-zinc-400" /> Quản lí
                    </div>
                </flux:select.option>

                <flux:select.option value='staff'>
                    <div class="flex items-center gap-2">
                        <flux:icon.user variant="mini" class="text-zinc-400" /> Nhân viên
                    </div>
                </flux:select.option>

            </flux:select>

            <flux:select variant="listbox" placeholder="Chọn trạng thái" label="Trạng thái" wire:model='status'>

                <flux:select.option value='active'>
                    <div class="flex items-center gap-2">
                        <flux:icon.check-badge variant="mini" class="text-zinc-400" /> Hoạt động
                    </div>
                </flux:select.option>

                <flux:select.option value='locked'>
                    <div class="flex items-center gap-2">
                        <flux:icon.no-symbol variant="mini" class="text-zinc-400" /> Bị khóa
                    </div>
                </flux:select.option>

                <flux:select.option value='pending'>
                    <div class="flex items-center gap-2">
                        <flux:icon.exclamation-triangle variant="mini" class="text-zinc-400" /> Đang chờ
                    </div>
                </flux:select.option>

            </flux:select>
            <flux:separator />
            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">{{ $isUpdateUserMode ? 'Cập nhật' : 'Thêm mới' }}
                </flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="delete-user" class="min-w-[22rem]">
        <form wire:submit.prevent='deleteUserConfirm()' class="space-y-6">
            <div>
                <flux:heading size="lg">Xoá ngừoi dùng trong hệ thống?</flux:heading>
                <flux:text class="mt-2">
                    Bạn có chắc muốn xoá ngừoi dùng {{ $name }} này không?<br>
                    Hành động này không thể hoàn tác.
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Huỷ</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger">Xoá vĩnh viễn</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
