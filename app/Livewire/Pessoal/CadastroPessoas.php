<?php

namespace App\Livewire\Pessoal;

use App\Livewire\Forms\CadastroPessoasForm;
use App\Models\Pessoa;
use Livewire\Component;

class CadastroPessoas extends Component
{
    public CadastroPessoasForm $form;

    public $pessoa;
    public $tipo = 'true';

    public function rules() 
    {
        return [
            'pessoa.nome' => 'required|min:3',
        ];
    }
    
    public function mount(Pessoa $codigo){
        $this->form->pessoa($codigo);

        // $this->pessoa = Pessoa::where('id','=', $codigo->id)->get()->first();
        
        // dd($this->pessoa);
    }

    public function render()
    {
        return view('livewire.pessoal.cadastro-pessoas');
    }
}
