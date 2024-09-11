<x-app-layout>
    <div class="text-xl font-semibold text-gray-800">
        Asignar un rol
    </div>

    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div class="bg-green-500 text-white font-bold px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="text-xl font-semibold text-gray-800" for="name">Nombre:</label>
            <input
                id="name"
                name="name"
                type="text"
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('name', $user->name) }}"
                placeholder="Ingrese el nombre"
            />
        </div>

        <h2 class="text-xl font-semibold text-gray-800">Listado de Roles</h2>
        @foreach ($roles as $rol)
            <div class="mb-2">
                <label>
                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                        @if($user->roles->contains($rol->id)) checked @endif>
                    {{ $rol->name }}
                </label>
            </div>
        @endforeach

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Asignar rol
            </button>
        </div>
    </form>
</x-app-layout>
