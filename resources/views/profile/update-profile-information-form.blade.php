<x-jet-form-section submit="updateProfileInformation">
    

    <x-slot name="form">
        <div style="margin: 4% 1% 1% 17%;" >
            <h1>Dados</h1>
            <p>Nome, avatar, e-mail e celular.</p>
        </div>
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 " style="margin: 1% 0% 1% 17%;">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Avatar') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview" >
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" style="width: 30%;" class="avatar-photo">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 avatar-photo"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecione uma nova foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remover avatar') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="name" value="{{ __('Nome') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="name" type="text" class="form-control" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="alert alert-danger" role="alert" />
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="email" value="{{ __('Email') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="email" type="email" class="form-control" wire:model.defer="state.email" />
                <x-jet-input-error for="email"  class="alert alert-danger" role="alert" />
            </div>
        </div>
        <!-- Celular -->
        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="celular" value="{{ __('Celular') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="celular" type="tel" class="form-control" wire:model.defer="state.celular" />
                <x-jet-input-error for="celular"  class="alert alert-danger" role="alert" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 alert alert-success" role="alert" on="saved">
            {{ __('Salvo.') }}
        </x-jet-action-message>

        <x-jet-button class="btn btn-success" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
