<div class="h-screen flex flex-col bg-gray-50">

    <div class="px-6 py-4 bg-white border-b shrink-0">
        <h1 class="text-lg font-semibold">{{ $name }}</h1>
    </div>

    <div class="flex-1 overflow-x-auto pink-scroll">
        <div class="min-w-max p-6">

            <flux:kanban>

                @foreach ($statuses as $status)
                    <flux:kanban.column class="w-72 shrink-0">

                        <flux:kanban.column.header :heading="ucfirst($status)"
                            :count="$tasks->where('status', $status)->count()" />

                        <flux:kanban.column.cards wire:sort="changeStatus" wire:sort:group="kanban"
                           wire:sort:group-id="{{ $status }}">

                            @foreach ($tasks->where('status', $status) as $task)
                                <flux:kanban.card wire:key="{{ $task->id }}"
                                    wire:sort:item="{{ $task->name }}"   :heading="$task->name" />
                            @endforeach

                        </flux:kanban.column.cards>

                    </flux:kanban.column>
                @endforeach

            </flux:kanban>
        </div>
    </div>

</div>
