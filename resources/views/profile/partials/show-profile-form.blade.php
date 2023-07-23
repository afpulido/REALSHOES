<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Add your personal information') }}
        </p>
    </header>

    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'show-profile-info')"
    >{{ __('Show more') }}</x-primary-button>


    <x-modal name="show-profile-info" :show="$errors->userUpdate->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.update') }}" class="p-6">
            @csrf
            @method('put')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Your information is safe') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Register your information or update it.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="tipo_doc_id" value="{{ __('tipo_doc_id') }}" class="sr-only" />
                <x-text-input id="tipo_doc_id" name="tipo_doc_id" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Document Type') }}"/>
                 
                <x-input-label for="persona_id" value="{{ __('persona_id') }}" class="sr-only" />
                <x-text-input id="persona_id" name="persona_id" type="text" class="mt-1 block w-3/4" placeholder="{{ __('ID Number') }}"/>

                <x-input-label for="name" value="{{ __('name') }}" class="sr-only" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Name') }}"/>

                <x-input-label for="lastname" value="{{ __('apellidos') }}" class="sr-only" />
                <x-text-input id="apellidos" name="lastname" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Last Name') }}"/>

                <x-input-label for="direccion" value="{{ __('direccion') }}" class="sr-only" />
                <x-text-input id="direccion" name="direccion" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Address') }}"/>

                <x-input-label for="telefono" value="{{ __('telefono') }}" class="sr-only" />
                <x-text-input id="lastaname" name="lastaname" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Phone') }}"/>

                <x-input-label for="rol_id" value="{{ __('rol_id') }}" class="sr-only" />
                <x-text-input id="rol_id" name="rol_id" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Phone') }}"/>
                
                <x-input-error :messages="$errors->userUpdate->get('id')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Update') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
