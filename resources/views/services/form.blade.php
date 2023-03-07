<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($service) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data"class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($client)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Description" />
                            <x-text-input id="title" name="description" type="text" class="mt-1 block w-full" :value="$client->description ?? old('description')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Price" />
                            <x-text-input id="content" name="price" class="mt-1 block w-full" required autofocus>{{ $service->price ?? old('price') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
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