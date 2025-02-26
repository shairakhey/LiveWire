<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nama;
    public $email;
    public $alamat;

    public function store()
    {
        $rules = [
            'nama'=>'required',
            'email'=>'required|email',
            'alamat'=>'required',
        ];
        $pesan = [
            'nama.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Email wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ];
        $validated = $this->validate($rules,$pesan);
        ModelsEmployee::create($validated);
        session()->flash('message', 'Data berhasil disimpan');
    }
    public function edit($id){
        $data = ModelsEmployee::find($id);
        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;
    }
    public function render()
    {
        $data = ModelsEmployee::orderBy('nama', 'asc')->paginate(2);
        return view('livewire.employee',['dataEmployees' => $data]);
    }
}