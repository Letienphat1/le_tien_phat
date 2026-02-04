<div>
    <flux:card class="my-2">
        <div class="flex items-center justify-between">
            <!-- Bên trái: icon user -->
            <div class="flex items-center gap-2">
                <flux:icon name="user-group" class="w-10 h-10 text-zinc-500" />
                <span class="text-sm font-medium">Quản lí người dùng</span>
            </div>

            <!-- Bên phải: button -->
            <flux:button icon="user-plus" variant="primary" color="blue" wire:click='addUser()'>
                Thêm
            </flux:button>
        </div>
    </flux:card>

    {{-- Thao tác --}}
    @livewire('admin.management.user.user-actions')

    {{-- Table --}}
    @livewire('admin.management.user.user-table')

</div>
