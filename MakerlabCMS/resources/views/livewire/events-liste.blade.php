<div>
    <div class="row">
        <div class="form col-5">
            <form>

<!-- formulaire -->

                <div class="mb-3">
                    <label for="nom" class="form-label">nom</label>
                    <input type="text" class="form-control" wire:model="state.nom" id="nom" placeholder="">
                    @error('nom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>



                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="textarea" class="form-control" wire:model="state.description" id="description" placeholder="">
                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label for="lien" class="form-label">photos</label>
                    <input type="file" class="form-control" wire:model="state.photos" id="photos" placeholder="">
                    @error('photos') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control" wire:model="state.date" id="date" placeholder="">
                    @error('date') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


                <div class="mb-3">
                    <label for="type" class="form-label">type</label>
                    <input type="text" class="form-control" wire:model="state.type" id="type" placeholder="">
                    @error('type') <span class="text-danger">{{ $message }}</span>@enderror
                </div>


                <div class="mb-3">
                    <label for="secteur" class="form-label">secteur</label>
                    <input type="text" class="form-control" wire:model="state.secteur" id="secteur" placeholder="">
                    @error('secteur') <span class="text-danger">{{ $message }}</span>@enderror
                </div>




            <!-- buttons reset update register -->

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

        <!-- affichage de evenements -->

        <div class=" col-7">
            <h3>List des evenements</h3>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">description</th>
                    <th scope="col">photos</th>
                    <th scope="col">date</th>
                    <th scope="col">type</th>
                    <th scope="col">secteur</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">{{ $event->id }}</th>
                            <td>{{ $event->nom }}</td>
                            <td>{{ $event->description}}</td>
                            <td>{{ $event->photo}}</td>
                            <td>{{ $event->dtae}}</td>
                            <td>{{ $event->type }}</td>
                            <td>{{ $event->secteur }}</td>

                            <td>
                                <button type="button" wire:click.prevent="edit({{ $event->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                <button type="button" wire:click.prevent="delete({{ $event>id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>