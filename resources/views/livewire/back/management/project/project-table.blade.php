<div>
    <div class="hidden lg:block">
        <flux:table>
            <flux:table.columns>

                <flux:table.column class="text-xl flex justify-center">Không gian làm việc</flux:table.column>

            </flux:table.columns>
        </flux:table>
    </div>

    <flux:card class="my-2">
        <flux:table>
            <flux:table.rows>
                @forelse ( $projects as $project )
                    
                @empty
                    
                @endforelse
                


            </flux:table.rows>
        </flux:table>
    </flux:card>
</div>
