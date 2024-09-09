<x-tenancy-layout>


    <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tareas
                </h2>
    </x-slot>


    <x-container class="py-12">
        <form action="{{route('tasks.store')}}" method="POST"  enctype="multipart/form-data" enstyle="background-color: #ffffff; padding: 20px; border-radius: 8px;">
            @csrf
        
            <div class="card mt-6 bg-white p-6 rounded-lg">
                <div class="card-body">
                    
                        <div class="mb-4">
                            <x-input-label>
                            Nombre:
                            </x-input-label>

                            <x-text-input name="name" value="{{old('name')}}" class="w-full mt-2" type="text"  placeholder="Ingrese el nombre"/>
                            <x-input-error :messages="$errors->first('name')"/>
                        </div>

                        <div class="mb-4">
                            <x-input-label>
                            Descripcion:
                            </x-input-label>

                            <textarea name="description" class="form-control w-full mt-2" value="{{old('description')}}" placeholder="Ingrese una descripcion">
                            </textarea>
                            <x-input-error :messages="$errors->first('description')"/>

                        </div>

                        <div class="mb-4">
                            <x-input-label>
                            Imagen:
                            </x-input-label>

                            <input type="file" name="image_url" class="mt-2">
                            <x-input-error :messages="$errors->first('image_url')"/>

                        </div>

                        <div class="flex justify-end">
                            <button class="btn btn-blue"> 
                                Guardar
                            </button>

                        </div>

                    
                </div>
            
            </div>

        </form>
            
    </x-container>


</x-tenancy-layout>