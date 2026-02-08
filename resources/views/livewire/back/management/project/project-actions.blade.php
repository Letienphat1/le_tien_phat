<div>
    <flux:modal name="action-project" class="md:w-400">
        <form wire:submit.prevent='{{ $isUpdateProject ? 'updateProject()' : 'createProject()' }}'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Thêm mới dự án</flux:heading>
                </div>
                <flux:input label="Tên dự án" wire:model='name' />

                <flux:input label="Mô tả" wire:model='description' />

                <flux:select variant="listbox" placeholder="Chọn trạng thái" label="Trạng thái" wire:model='status' :disabled='!$isUpdateProject'>

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

                @if ($isUpdateProject)
                    <div class="grid grid-cols-2 gap-4">
                        <flux:date-picker label="Ngày" wire:model='date_deadline' :min='now()->addDay()->toDateString()'/>

                        <flux:time-picker label="Thời gian" type="input" wire:model='time_deadline' />
                        
                    </div>
                @endif

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Thêm</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>

    <flux:modal name="delete-project" class="min-w-[22rem]">
        <form wire:submit.prevent='deleteProjectConfirm()' class="space-y-6">
            <div>
                <flux:heading size="lg">Xoá dự án trong hệ thống?</flux:heading>
                <flux:text class="mt-2">
                    Bạn có chắc muốn xoá dự án này {{ $name }} này không?<br>
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
