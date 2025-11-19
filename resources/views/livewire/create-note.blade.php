<div>
    
    <flux:modal name="create-note" class="md:w-900">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Criar Nota</flux:heading>
                <flux:text class="mt-2">Cria uma nova nota</flux:text>
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
                wire:click="save"
                class="cursor-pointer">Salvar</flux:button>
            </div>
        </div>
    </flux:modal>
</div>