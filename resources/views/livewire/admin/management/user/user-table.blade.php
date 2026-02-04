<div>
    <flux:card class="my-2">
        <div class="grid grid-cols-12 gap-4 items-center">

            <!-- Industry -->
            <div class="col-span-3">
                <flux:input label="Tìm kiếm" placeholder="Tên / Email ..." />
            </div>
            <!-- Sort -->
            <div class="col-span-3">
                <flux:select variant="listbox" placeholder="Chọn chức vụ" label='Lọc theo chức vụ'>
                    <flux:select.option value="name">Tên / Email</flux:select.option>
                    <flux:select.option value="role">Chức vụ</flux:select.option>
                </flux:select>
            </div>

            <!-- Trạng thái -->
            <div class="col-span-3">
                <flux:select variant="listbox" placeholder="Trạng thái" label='Lọc theo trạng thái'>
                    <flux:select.option value="active">Đang hoạt động</flux:select.option>
                    <flux:select.option value="deleted">Đã xoá</flux:select.option>
                </flux:select>
            </div>

            <!-- Reset -->
            <div class="col-span-3 flex justify-end">
                <flux:button icon="arrow-path" variant="primary" color="rose" :loading="false">
                    Reset
                </flux:button>
            </div>
        </div>
    </flux:card>

    <flux:card class=" my-2">
        <flux:table>
            <flux:table.columns>
                <flux:table.column>Họ và tên</flux:table.column>
                <flux:table.column>Email</flux:table.column>
                <flux:table.column>Chức vụ</flux:table.column>
                <flux:table.column>Trạng thái</flux:table.column>
                <flux:table.column>Thao tác</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>

                @forelse ($users as $user)
                    <flux:table.row wire:key='{{ $user->id }}'>
                        <flux:table.cell>{{ $user->name }}</flux:table.cell>
                        <flux:table.cell>{{ $user->email }}</flux:table.cell>
                        <flux:table.cell>{{ $user->role_name }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:badge variant="solid" color="{{ $user->status_color }}"> {{ $user->status_name }}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom">
                            </flux:button>

                            <flux:dropdown>

                                <flux:popover class="flex flex-col gap-4">
                                    <flux:button icon="adjustments-horizontal" icon:variant="micro"
                                        icon:class="text-zinc-400" icon-trailing="chevron-down"
                                        icon-trailing:variant="micro" icon-trailing:class="text-zinc-400">
                                        Options
                                    </flux:button>


                                    <flux:separator variant="subtle" />

                                    <flux:radio.group wire:model="view" label="View as"
                                        label:class="text-zinc-500 dark:text-zinc-400">
                                        <flux:radio value="list" label="List" checked />
                                        <flux:radio value="gallery" label="Gallery" />
                                    </flux:radio.group>

                                    <flux:separator variant="subtle" />

                                    <flux:button variant="subtle" size="sm" class="justify-start -m-2 px-2!">Reset
                                        to default</flux:button>
                                </flux:popover>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                @endforelse



            </flux:table.rows>
        </flux:table>
    </flux:card>
</div>
