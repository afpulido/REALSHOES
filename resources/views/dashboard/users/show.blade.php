<table class="table-layout: auto border-separate border border-slate-500 border-spacing-*">
    <thead>
      <tr>
        <th class="border border-slate-600">{{ __('Type Document') }}</th>
        <th class="border border-slate-600">{{ __('ID Number') }}</th>
        <th class="border border-slate-600">{{ __('Name') }}</th>
        <th class="border border-slate-600">{{ __('Last name') }}</th>
        <th class="border border-slate-600">{{ __('Adress') }}</th>
        <th class="border border-slate-600">{{ __('Nickname') }}</th>
        <th class="border border-slate-600">{{ __('Email') }}</th>
        <th class="border border-slate-600">{{ __('Phone') }}</th>
        <th class="border border-slate-600">{{ __('Role') }}</th>
        <th class="border border-slate-600">{{ __('Status') }}</th>
        <th class="border border-slate-600">{{ __('Actions') }}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="border border-slate-700">Citizenship Card</td>
        <td class="border border-slate-700">123456789</td>
        <td class="border border-slate-700">Clark</td>
        <td class="border border-slate-700">Kent</td>
        <td class="border border-slate-700">farm smallville kansas</td>
        <td class="border border-slate-700">Superman</td>
        <td class="border border-slate-700">kripton@vialactea.com</td>
        <td class="border border-slate-700">3114447799</td>
        <td class="border border-slate-700">Root</td>
        <td class="border border-slate-700">Active</td>
        <td class="border border-slate-700">


            <x-primary-button>{{ __('Active') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}
                    </p>
                @endif


            <x-secondary-button>{{ __('Deactive') }}</x-secondary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}
                </p>
            @endif
                    <br>
            <x-secondary-button>{{ __('Update') }}</x-secondary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif

            <x-danger-button>{{ __('Delete') }}</x-danger-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif

        {{-- @foreach ($personas as $persona )
        <td class="border border-slate-700">{{ $persona->personas_id }}</td>
        <td class="border border-slate-700">{{$persona->name }}</td>
        <td class="border border-slate-700">{{$persona->apellidos }}</td>
        <td class="border border-slate-700">{{$persona->direccion }}</td>
        <td class="border border-slate-700">{{$persona->name }}</td>
        <td class="border border-slate-700">{{$persona->email }}</td>
        <td class="border border-slate-700">{{$persona->telefono }}</td>
        <td class="border border-slate-700">{{$persona->deleted_at }}</td>
        <td class="border border-slate-700">
            <x-primary-button>{{ __('Active') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}
                    </p>
                @endif


            <x-secondary-button>{{ __('Deactive') }}</x-secondary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}
                </p>
            @endif


            <x-primary-button>{{ __('Update') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif

            <x-danger-button>{{ __('Delete') }}</x-danger-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
        @endforeach --}}


        </td>
      </tr>
      </tr>
    </tbody>
  </table>
