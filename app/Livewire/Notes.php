<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Notes extends Component
{
    use WithPagination;
    public $noteid;
    public function render()
    {
        $notes = Note::orderby('created_at', 'desc')->paginate(5);
        return view('livewire.notes', [
            'notes' => $notes,
        ]);
    }

    public function edit($id) 
    {
        $this->dispatch('edit-note', $id); 
    }

    public function delete($id) 
    {
        $this->noteid = $id;
        Flux::modal('delete-note')->show();
    }

    public function confirmDelete() 
    {
        Note::find($this->noteid)->delete();
        Flux::modal('delete-note')->close();
        //emite uma notificação de sucesso
        session()->flash('success', 'Nota deletada com sucesso!');
        $this->redirectRoute('notes', navigate: true);
    }
}
