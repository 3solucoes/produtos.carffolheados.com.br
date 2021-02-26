<x-jet-form-section submit="updatePassword">
    
    <x-slot name="form">
        <div style="margin: 1% 1% 1% 17%;" >
            <h1>Alterar senha</h1>
            <p>Verifique se sua conta está usando uma senha longa e aleatória para permanecer segura.</p>
        </div>
        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="current_password" value="{{ __('Senha atual') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="current_password" type="password" class="form-control" wire:model.defer="state.current_password" placeholder="{{ __('Senha atual') }}" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="alert alert-info" role="alert" />
            </div>
        </div>

        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="password" value="{{ __('Nova senha') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="password" type="password" class="form-control" wire:model.defer="state.password" placeholder="{{ __('Nova senha') }}" autocomplete="new-password" />
                <x-jet-input-error for="password" class="alert alert-info" role="alert" />
            </div>
        </div>

        <div class="form-group row">
            <x-jet-label class="col-sm-12 col-md-2 col-form-label" for="password_confirmation" value="{{ __('Confirme a senha') }}" />
            <div class="col-sm-12 col-md-10">
                <x-jet-input id="password_confirmation" type="password" class="form-control" wire:model.defer="state.password_confirmation" placeholder="{{ __('Confirme a senha') }}" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="alert alert-info" role="alert" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="alert alert-success" role="alert" on="saved">
            {{ __('Alterado.') }}
        </x-jet-action-message>

        <x-jet-button class="btn btn-success">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
