<div>
    <flux:kanban.column>
        <flux:kanban.column.header :heading="$column->title" :count="count($column->cards)">
            <x-slot name="actions">
                <flux:dropdown>
                    <flux:button variant="subtle" icon="ellipsis-horizontal" size="sm" />

                    <flux:menu>
                        <flux:menu.item icon="plus">New card</flux:menu.item>
                        <flux:menu.item icon="archive-box">Archive column</flux:menu.item>

                        <flux:menu.separator />

                        <flux:menu.item variant="danger" icon="trash">Delete</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>

                <flux:button variant="subtle" icon="plus" size="sm" />
            </x-slot>
        </flux:kanban.column.header>

        <flux:kanban.column.cards>
            <!-- ... -->
        </flux:kanban.column.cards>
    </flux:kanban.column>

    
</div>
