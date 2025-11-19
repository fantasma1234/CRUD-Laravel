<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditNote extends Component
{
    public $title;
    public $content;
    public $noteId;
    #[On('edit-note')] 
    public function edit($id)
    {
        //dd("Editar nota com ID: " . $id);
        $note = Note::findOrFail($id);
        $this->noteId = $id;
        $this->title = $note->title;
        $this->content = $note->content;
        Flux::modal('edit-note')->show();
    }

    public function update() 
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('notes', 'title')->ignore($this->noteId)],
            'content' => ['required', 'string'],
        ]);

        $note = Note::findOrFail($this->noteId);
        $note->title = $this->title;
        $note->content = $this->content;
        $note->save();

        //emite uma notificação de sucesso
        session()->flash('success', 'Nota atualizada com sucesso!');
        $this->redirectRoute('notes', navigate: true);

        Flux::modal('edit-note')->close();
    }

    public function render()
    {
        return view('livewire.edit-note');
    }
}
