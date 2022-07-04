<div>
    <div class="row">
        <div class="form col-5">
            <form>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control" wire:model="state.description" id="description" placeholder="">
                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="text" class="form-control" wire:model="state.photo" id="photo" placeholder="">
                    @error('photo') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label for="lien" class="form-label">lien</label>
                    <input type="text" class="form-control" wire:model="state.lien" id="lien" placeholder="">
                    @error('lien') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">nom</label>
                    <input type="text" class="form-control" wire:model="state.nom" id="nom" placeholder="">
                    @error('nom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


                <div class="mb-3">
                    <label for="equipe" class="form-label">equipe</label>
                    <input type="text" class="form-control" wire:model="state.equipe" id="equipe" placeholder="">
                    @error('equipe') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
        </div>
        <div class=" col-7">
            <h3>List des projets</h3>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">lien</th>
                    <th scope="col">nom</th>
                    <th scope="col">equipe</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->photo }}</td>
                            <td>{{ $project->lien }}</td>
                            <td>{{ $project->nom }}</td>
                            <td>{{ $project->equipe }}</td>
                            <td>
                                <button type="button" wire:click.prevent="edit({{ $project->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                <button type="button" wire:click.prevent="delete({{ $project->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
