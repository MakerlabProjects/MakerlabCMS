<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class EventsListe extends Component
{
    public $events;
    public $state = [
        'nom' => '',
        'description' => '',
        'photos' =>'',
        'date' =>'',
        'type' =>'',
        'secteur'=>''
    ];

 public $updateMode = false;


    public function mount()
    {
        $this->events = Event::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'nom' => '',
            'description' => '',
            'photos' =>'',
            'date' =>'',
            'type' =>'',
            'secteur'=>'',
        ])->validate();

        Event::create($this->state);

        $this->reset('state');
        $this->events = Event::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $event = Event::find($id);

        $this->state = [
        'id'=>$event->id,   
        'nom' =>$event->nom,
        'description' =>$event->description,
        'photos' =>$event->photos,
        'date' =>$event->date,
        'type' =>$event->type,
        'secteur' =>$event->secteur,
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
            'nom' => 'required',
            'description' => 'required',
            'photos' =>'required',
            'date' =>'required',
            'type' =>'required',
            'secteur'=>'required',
        ])->validate();

        if ($this->state['id']) {
            $event = Event::find($this->state['id']);
            $project->update([
                'nom' => $this->state['nom'],
                'descrpition' => $this->state['description'],
                'photos' => $this->state['photos'],
                'date' => $this->state['date'],
                'type' => $this->state['type'],
                'secteur' => $this->state['secteur'],
                
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->events = Event::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Event::where('id',$id)->delete();
            $this->events = Event::all();
        }
    }

    public function render()
    {
        return view('livewire.events-liste');
    }
}
