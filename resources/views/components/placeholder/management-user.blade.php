<div>
    {{-- Desktop skeleton --}}
    <div class="hidden lg:block">
        <flux:card class="my-2">
            <flux:skeleton.group animate="shimmer">
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
                        @foreach (range(1, 15) as $i)
                            <flux:table.row>
                                @foreach (range(1, 6) as $col)
                                    <flux:table.cell>
                                        <flux:skeleton.line class="my-1" />
                                    </flux:table.cell>
                                @endforeach
                            </flux:table.row>
                        @endforeach
                    </flux:table.rows>
                </flux:table>
            </flux:skeleton.group>
        </flux:card>
    </div>

    {{-- Mobile skeleton --}}
    <div class="lg:hidden">
        <flux:card class="my-2">
            <flux:skeleton.group animate="shimmer">
                <div class="space-y-3">
                    @foreach (range(1, 5) as $i)
                        <div class="rounded-lg border border-zinc-200 dark:border-zinc-700 p-4 space-y-3">

                            {{-- Header --}}
                            <div class="flex items-center justify-between">
                                <div class="space-y-2 w-2/3">
                                    <flux:skeleton.line class="h-4 w-3/4" />
                                    <flux:skeleton.line class="h-3 w-1/2" />
                                </div>

                                <flux:skeleton.line class="h-5 w-16 rounded-full" />
                            </div>

                        </div>
                    @endforeach
                </div>
            </flux:skeleton.group>
        </flux:card>
    </div>

</div>
