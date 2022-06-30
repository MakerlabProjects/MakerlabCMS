<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ProjectList extends Component
{   
    public $projects;
    public $state = [
        'description' => '',
        'photo' => '',
        'lien' =>'',
        'nom' =>'',
        'equipe' =>''
    ];

 public $updateMode = false;


    public function mount()
    {
        $this->projects = Project::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
        'description' => '',
        'photo' => '',
        'lien' =>'',
        'nom' =>'',
        'equipe' =>'',
        ])->validate();

        Project::create($this->state);

        $this->reset('state');
        $this->projects = Project::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $project = Project::find($id);

        $this->state = [
            'id' => $project->id,
            'description' => $project->description,
            'photo' => $project->photo,
            'lien' => $project->lien,
            'nom'=> $project->nom,
            'equipe'=>$project->equipe,
        ];




    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'description' => 'required',
            'photo' => 'required',
            'lien'=>'required',
            'nom'=>'required',
            'equipe'=>'required',
        ])->validate();

        if ($this->state['id']) {
            $project = Project::find($this->state['id']);
            $project->update([
                'description' => $this->state['description'],
                'photo' => $this->state['photo'],
                'lien' => $this->state['lien'],
                'nom' => $this->state['nom'],
                'equipe' => $this->state['equipe'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->projects = Project::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Project::where('id',$id)->delete();
            $this->projects = Project::all();
        }
    }

    public function render()
    {
        return view('livewire.project-list');
    }
}
