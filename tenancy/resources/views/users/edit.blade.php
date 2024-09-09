<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuario
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST" style="background-color: #ffffff; padding: 20px; border-radius: 8px;">
                    @method('PUT')    
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name">
                            Nombre
                        </x-input-label>
                        <x-text-input id="name" name="name" class="w-full mt-2" type="text" value="{{ old('name', $user->name) }}" placeholder="Ingrese el nombre"/>
                        <x-input-error :messages="$errors->get('name')"/>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="email">
                            Correo Electrónico
                        </x-input-label>
                        <x-text-input id="email" name="email" class="w-full mt-2" type="email" value="{{ old('email', $user->email) }}" placeholder="Ingrese el correo electrónico"/>
                        <x-input-error :messages="$errors->get('email')"/>
                    </div>

                    <div class="flex justify-end">
                        <button class="btn btn-blue">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
