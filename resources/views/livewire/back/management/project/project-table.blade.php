<div>
    <div class="hidden lg:block">
        <flux:table>
            <flux:table.columns>

                <flux:table.column class="text-xl flex justify-center">Không gian làm việc</flux:table.column>

            </flux:table.columns>
        </flux:table>
    </div>

    <flux:card class="my-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @forelse ($projects as $project)
                <flux:card
                    class="relative p-4 pr-10 rounded-xl cursor-pointer transition-all
                            border border-transparent
                            hover:-translate-y-1
                            hover:border-pink-300
                            hover:shadow-lg hover:shadow-pink-300/40">
                    {{-- sửa xóa --}}
                    <div class="absolute top-2 right-2 z-10">
                        <flux:dropdown>
                            <flux:button icon="ellipsis-horizontal" variant="ghost" size="sm" icon-only
                                class="hover:bg-gray-100 rounded-md" />

                            <flux:menu class="min-w-[140px]">
                                <flux:menu.item wire:click='editProject({{ $project->id }})'
                                    class="flex items-center gap-2 px-3 py-2
                                            text-blue-600SSS
                                            hover:bg-blue-50
                                            hover:text-blue-700
                                            rounded-md transition">
                                    <flux:icon name="pencil-square" class="w-4 h-4" />
                                    Sửa
                                </flux:menu.item>

                                <flux:separator />

                                <flux:menu.item variant="danger" wire:click='deleteProject({{ $project->id }})'
                                    class="flex items-center gap-2 px-2 py-1 hover:bg-red-50 rounded-md">
                                    <flux:icon name="trash" class="w-4 h-4" />
                                    Xóa
                                </flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                    </div>
                    {{-- project --}}
                    <div class="flex flex-col gap-3 h-full">

                        <div class="flex items-start justify-between gap-2">
                            <div class="font-semibold text-base leading-tight line-clamp-2">
                                {{ $project->name }}
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 line-clamp-2">
                            {{ $project->description ?? '' }}
                        </div>

                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <flux:icon name="user" class="w-4 h-4" />
                            <span>{{ $project->creator?->name ?? '' }}</span>
                        </div>

                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <flux:icon name="calendar-days" class="w-4 h-4" />
                            <span>
                                {{ $project->deadline_at?->format('d/m/Y H:i') ?? '' }}
                            </span>
                        </div>

                        <div class="mt-auto">
                            <flux:badge class="w-full justify-center text-xs px-2 py-1 font-medium"
                                color="{{ $project->status_color_project }}">
                                {{ $project->status_name_project }}
                            </flux:badge>
                        </div>

                    </div>

                </flux:card>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    Bạn chưa có dự án nào.
                </div>
            @endforelse
        </div>
    </flux:card>


</div>
