<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Notas') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gerencie suas notas') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <livewire:create-note />
    <flux:modal.trigger name="create-note">
        <flux:button class="mt-4">Criar Nota</flux:button>
    </flux:modal.trigger>
    <livewire:edit-note />

    

    {{-- Lista das Notas --}}
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="bg-neutral-secondary-soft border-b border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Conteudo
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                        <td class="px-6 py-4">
                            {{ $note->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $note->content }}
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <flux:button wire:click="edit({{ $note->id }})" class="cursor-pointer">Editar</flux:button>
                            <flux:button wire:click="delete({{ $note->id }})" class="cursor-pointer" variant="danger">Excluir</flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                            Nenhuma nota encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Excluir --}}
    <flux:modal name="delete-note" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Excluir nota</flux:heading>

                <flux:text class="mt-2">
                    você tem certeza que deseja excluir essa nota?<br>
                    Essa ação nao pode ser desfeita.
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost" class="cursor-pointer">Cancelar</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="confirmDelete()" class="cursor-pointer">Excluir Nota</flux:button>
            </div>
        </div>
    </flux:modal>

    @session('success')
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => {show = false}, 3000)"
            class="fixed top-5 right-5 z-50 rounded-md bg-green-100 p-4 text-sm text-green-800 shadow-md"
            role="alert"
        >
            <p>{{ $value }}</p>
        </div>
    @endsession
    
    {{-- Paginação --}}
    <div class="mt-4">
        {{ $notes->links() }}
    </div>
</div>

