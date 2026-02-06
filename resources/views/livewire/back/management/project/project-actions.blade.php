<div>
    <flux:modal name="action-project" class="md:w-96">
        <form wire:submit.prevent='createProject'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Thêm mới dự án</flux:heading>
                </div>
                <flux:input label="Tên dự án" wire:model='name' />

                <flux:input label="Mô tả" wire:model='description' />

                <div class="grid grid-cols-2 gap-4">
                    <flux:input label="Ngày" type="date" wire:model='date_deadline' />

                    <flux:time-picker type="input" label="Thời gian" wire:model='time_deadline' />
                </div>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Thêm</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
