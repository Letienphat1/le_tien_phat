<div>
<flux:kanban>
    <flux:kanban.column>

        <flux:kanban.column>
            <flux:kanban.column.header
                heading="Đang làm"
                count="5"
            />

            <flux:kanban.column.cards>
                <flux:kanban.card>
                    <flux:heading size="sm">Task demo 1</flux:heading>
                </flux:kanban.card>

                <flux:kanban.card>
                    <flux:heading size="sm">Task demo 2</flux:heading>
                </flux:kanban.card>
            </flux:kanban.column.cards>

            <flux:kanban.column.footer>
                <form>
                    <flux:kanban.card>
                        <div class="flex items-center gap-1">
                            <flux:heading class="flex-1">
                                <input
                                    class="w-full outline-none bg-transparent"
                                    placeholder="New card..."
                                >
                            </flux:heading>

                            <flux:button
                                type="submit"
                                variant="filled"
                                size="sm"
                                inset="top bottom"
                                class="-me-1.5"
                            >
                                Add
                            </flux:button>
                        </div>
                    </flux:kanban.card>
                </form>

                <flux:button
                    variant="subtle"
                    icon="plus"
                    size="sm"
                    align="start"
                >
                    New card
                </flux:button>
            </flux:kanban.column.footer>
        </flux:kanban.column>

    </flux:kanban.column>
</flux:kanban>

</div>
