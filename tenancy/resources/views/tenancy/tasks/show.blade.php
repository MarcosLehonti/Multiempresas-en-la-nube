<x-tenancy-layout>


    <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tareas
                </h2>
    </x-slot>


    <x-container class="py-12">
        <div class="card mt-6 bg-white p-6 rounded-lg">
            <div class="card-body">
                <h1 class="text-2x1 font semibold mb-4">{{ $task->name}}</h1>
                <p>{{$task->description}}</p>
            </div>
        </div>

    </x-container>


</x-tenancy-layout>