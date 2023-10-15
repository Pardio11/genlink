<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualiza tu contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegurate de usar una contraseña segura para mantener protegida tu cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <label for="current_password" class="text-black">{{ __('Contraseña actual') }}</label>
            {{-- <x-label for="current_password" value="{{ __('Current Password') }}" /> --}}
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="password" class="text-black">{{ __('Nueva contraseña') }}</label>
            {{-- <x-label for="password" value="{{ __('New Password') }}" /> --}}
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="password_confirmation" class="text-black">{{ __('Confirmar contraseña') }}</label>
            {{-- <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> --}}
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button>
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
