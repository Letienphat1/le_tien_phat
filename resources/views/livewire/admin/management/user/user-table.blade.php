<div>

    <flux:card class="my-2"  >
        {{-- Desktop --}}
        <div class="hidden lg:block">
            <flux:table>
                <flux:table.columns>
                    <flux:table.column class="w-[50px]" align="center">STT</flux:table.column>
                    <flux:table.column class="w-[220px]">Họ và tên</flux:table.column>
                    <flux:table.column class="w-[260px]">Email</flux:table.column>
                    <flux:table.column class="w-[160px]">Chức vụ</flux:table.column>
                    <flux:table.column class="w-[140px]">Trạng thái</flux:table.column>
                    <flux:table.column class="w-[120px]" align="center">Thao tác</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($users as $user)
                        <flux:table.row wire:key="desktop-{{ $user->id }}">
                            <flux:table.cell align="center">
                                {{ $users->firstItem() + $loop->index }}
                            </flux:table.cell>
                            <flux:table.cell>{{ $user->name }}</flux:table.cell>
                            <flux:table.cell>{{ $user->email }}</flux:table.cell>
                            <flux:table.cell>{{ $user->role_name }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="{{ $user->status_color }}">
                                    {{ $user->status_name }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell align="center">
                                <flux:dropdown>
                                    <flux:button icon="ellipsis-horizontal" />
                                    <flux:menu>
                                        <flux:menu.item wire:click="$dispatch('editUser', { id: {{ $user->id }} })">Sửa</flux:menu.item>
                                        <flux:separator />
                                        <flux:menu.item variant="danger" wire:click="$dispatch('deleteUser', { id: {{ $user->id }} })">Xóa</flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="6" class="text-center py-8 text-zinc-500">
                                Không có dữ liệu
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>

        {{-- Mobile --}}
        <div class="lg:hidden space-y-3">
            <flux:accordion>
                @foreach ($users as $user)
                    <flux:accordion.item>
                        <flux:accordion.heading>
                            {{ $user->name }}
                        </flux:accordion.heading>
                        <flux:accordion.content>
                            <div class="text-sm space-y-2">
                                <div>Email: {{ $user->email }}</div>
                                <div>Chức vụ: {{ $user->role_name }}</div>
                            </div>
                        </flux:accordion.content>
                    </flux:accordion.item>
                @endforeach
            </flux:accordion>
        </div>

        <flux:pagination :paginator="$users" />
    </flux:card>
</div>
