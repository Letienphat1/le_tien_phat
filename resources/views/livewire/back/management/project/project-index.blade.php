<div>
    <flux:card class="my-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:icon name="folder-kanban" class="w-10 h-10 text-zinc-500" />
                <span class="text-sm font-medium">Quản lí dự án</span>
            </div>

            <flux:button icon="folder-plus" variant="primary" wire:click="addProject">
                Thêm
            </flux:button>
        </div>
    </flux:card>

    {{-- Actions project --}}
    <livewire:back.management.project.project-actions lazy />

    <flux:card class="my-2">
        <div class="flex flex-wrap gap-4 items-end">

            <!-- Tìm kiếm -->
            <div class="w-full md:w-64">
                <flux:input label="Tìm kiếm" placeholder="Tên dự án..." wire:model.live="search" />
            </div>

            <!-- Trạng thái -->
            <div class="w-full md:w-64">
                <flux:select variant="listbox" placeholder="Trạng thái" label="Lọc theo trạng thái" wire:model.lazy='status'>
                    <flux:select.option value="">Tất cả trạng thái</flux:select.option>
                    <flux:select.option value="pending">Đang chờ</flux:select.option>
                    <flux:select.option value="progress">Đang làm</flux:select.option>
                    <flux:select.option value="done">Đã xong</flux:select.option>
                </flux:select>
            </div>

            <!-- Reset -->
            {{-- <div class="ml-auto self-center">
                <flux:button icon="arrow-path" variant="primary" color="rose" >
                    Reset
                </flux:button>
            </div> --}}
            
        </div>
    </flux:card>

    {{-- Table --}}
    <livewire:back.management.project.project-table :search="$search" :status="$status" wire:key="projects-table-{{ md5($search . '|' . $status) }}"/>
</div>
