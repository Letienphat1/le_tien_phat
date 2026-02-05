<div>
    <flux:card class="my-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:icon name="user-group" class="w-10 h-10 text-zinc-500" />
                <span class="text-sm font-medium">Quản lí người dùng</span>
            </div>

            <flux:button icon="user-plus" variant="primary" wire:click="addUser">
                Thêm
            </flux:button>
        </div>
    </flux:card>

    {{-- Actions --}}
    <livewire:admin.management.user.user-actions lazy/>

    {{-- ✅ Lazy table --}}
    <flux:card class="my-2">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 items-end">

            <!-- Industry -->
            <div class="col-span-2">
                <flux:input label="Tìm kiếm" placeholder="Tên / Email ..." wire:model.live.debounce.500ms='search' />
            </div>
            <!-- Sort -->
            <div class="col-span-2">
                <flux:select variant="listbox" placeholder="Chọn chức vụ" label='Lọc theo chức vụ'
                    wire:model.lazy='role'>
                    <flux:select.option value="">Tất cả chức vụ</flux:select.option>
                    <flux:select.option value="admin">Quản trị viên</flux:select.option>
                    <flux:select.option value="manager">Quản lý</flux:select.option>
                    <flux:select.option value="staff">Nhân viên</flux:select.option>
                </flux:select>
            </div>

            <!-- Trạng thái -->
            <div class="col-span-2">
                <flux:select variant="listbox" placeholder="Trạng thái" label='Lọc theo trạng thái'
                    wire:model.lazy='status'>
                    <flux:select.option value="active">Đang hoạt động</flux:select.option>
                    <flux:select.option value="locked">Đã khoá</flux:select.option>
                    <flux:select.option value="pending">Đang chờ</flux:select.option>
                </flux:select>
            </div>
            <div class="col-span-1">
                <flux:select variant="listbox" placeholder="Số dòng..." label='Số dòng/trang' wire:model.lazy='perPage'>
                    <flux:select.option value='15'>15</flux:select.option>
                    <flux:select.option value='30'>30</flux:select.option>
                    <flux:select.option value='50'>50</flux:select.option>
                    <flux:select.option value='100'>100</flux:select.option>
                </flux:select>
            </div>

            <!-- Reset -->
            <div class="col-span-1">
                <flux:button icon="arrow-path" variant="primary" color="rose" :loading="false"
                    wire:click='resetFilter()' class="md:mt-6">
                    Reset
                </flux:button>
            </div>
        </div>
    </flux:card>
    
    <livewire:admin.management.user.user-table lazy />
    
</div>
