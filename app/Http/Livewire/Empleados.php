<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombres, $Apellido, $Identificacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('Nombres', 'LIKE', $keyWord)
						->orWhere('Apellido', 'LIKE', $keyWord)
						->orWhere('Identificacion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->Nombres = null;
		$this->Apellido = null;
		$this->Identificacion = null;
    }

    public function store()
    {
        $this->validate([
		'Nombres' => 'required',
		'Apellido' => 'required',
		'Identificacion' => 'required',
        ]);

        Empleado::create([ 
			'Nombres' => $this-> Nombres,
			'Apellido' => $this-> Apellido,
			'Identificacion' => $this-> Identificacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombres = $record-> Nombres;
		$this->Apellido = $record-> Apellido;
		$this->Identificacion = $record-> Identificacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombres' => 'required',
		'Apellido' => 'required',
		'Identificacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'Nombres' => $this-> Nombres,
			'Apellido' => $this-> Apellido,
			'Identificacion' => $this-> Identificacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
