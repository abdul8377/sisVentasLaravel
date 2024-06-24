<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-600 leading-tight">
            Productos
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between dark:text-gray-400 gap-4 mb-2">
            <x-input icon="search" placeholder="Buscar registro" wire:model.live="search"/>
            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo"/>
                @if($isOpen)
                    @include('livewire.product-create')
                @endif
        </div>

        <!--Tabla lista de items   -->
        <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-indigo-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">nombre</td>
                  <td scope="col" class="px-6 py-3">descripcion</td>
                  <td scope="col" class="px-6 py-3">precio</td>
                  <td scope="col" class="px-6 py-3">stock</td>
                  <td scope="col" class="px-6 py-3">categoria</td>
                  <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:text-gray-400">
                @foreach($products as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->name}}</td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->description}}</td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->price}}</td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->stock}}</td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->category}}</td>
                  <td class="px-6 py-4 text-right">
                    <x-button.circle wire:click="edit({{$item}})" primary icon="pencil" />
                    <x-button.circle negative icon="x" x-on:confirm="{
                        title: 'Seguro que deseas eliminar?',
                        icon: 'error',
                        method: 'destroy',
                        params: {{$item}}
                    }"
                    />
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$products->count())
            <p class="dark:text-gray-200">No existe ningun registro conincidente</p>
        @endif
        @if($products->hasPages())
        <div class="px-6 py-3">
            {{$products->links()}}
        </div>
        @endif

        </div>
      </div>
</div>
