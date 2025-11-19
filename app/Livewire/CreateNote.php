<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Livewire\Component;

class CreateNote extends Component
{
    public $title;
    public $content;

    protected function rules() 
    {
        return [
            'title' => 'required|string|unique:notes,title|max:255',
            'content' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();
        //dd('Nota salva com sucesso!');

        //Lógica para salvar a nota no banco de dados
        Note::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);
        //reseta os campos do formulário
        $this->reset();
        //fecha a modal
        Flux::modal('create-note')->close();

        //emite uma notificação de sucesso
        session()->flash('success', 'Nota criada com sucesso!');

        $this->redirectRoute('notes', navigate: true);
    }
    public function render()
    {
        return view('livewire.create-note');
    }
}
