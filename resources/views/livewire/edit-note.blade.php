<div>
    
    <flux:modal name="edit-note" class="md:w-900">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Editar Nota</flux:heading>
                <flux:text class="mt-2">Edite uma nota</flux:text>
            </div>
    
            <flux:input 
            wire:model="title"
            label="Titulo" 
            placeholder="Título" />

            <flux:textarea
            wire:model="content"
            label="Conteudo" 
            placeholder="Escreva algo..." />

            <div class="flex">
                <flux:spacer />
    
                <flux:button 
                type="submit" 
                variant="primary"
                wire:click="update"
                class="cursor-pointer">Atualizar</flux:button>
            </div>
        </div>
    </flux:modal>
</div>