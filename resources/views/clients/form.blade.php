<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($client) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data"class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($client)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Raison sociale" />
                            <x-text-input id="title" name="raison_sociale" type="text" class="mt-1 block w-full" :value="$client->raison_sociale ?? old('raison_sociale')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('raison_sociale')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Email" />
                            <x-text-input id="content" name="email" class="mt-1 block w-full" required autofocus>{{ $client->email ?? old('email') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                        <x-input-label for="content" value="telephone" />                           
                            <x-text-input id="content" name="phone" class="mt-1 block w-full" required autofocus>{{ $client->phone ?? old('phone') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div>
                        <x-input-label for="content" value="Adresse" />                           
                            <x-text-input id="content" name="address" class="mt-1 block w-full" required autofocus>{{ $client->address ?? old('address') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>