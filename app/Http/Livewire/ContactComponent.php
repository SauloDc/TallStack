<?php

namespace App\Http\Livewire;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $data, $name, $email, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = ModelsContact::all();
        return view('livewire.contact.contact');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = ModelsContact::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($this->selected_id) {
            $record = ModelsContact::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    
    public function destroy($id)
    {
        if ($id) {
            $record = ModelsContact::where('id', $id);
            $record->delete();
        }
    }
}
