{{--
  Variables disponibles
    - $categories ARRAY(Categorie)
--}}

@php
  $categories = \App\Models\Categorie::orderBy('name', 'ASC')->get();
@endphp

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Ajout d\'un post') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('postsAdmin.index') }}">Revenir vers la gestion des posts</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Ajout d'un enregistrement</h3>
                  <form action="{{ route('postsAdmin.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                      <label for="title">Titre</label>
                    </div>
                    <div class="mb-2">
                      <input type="text" name="title" id="title" required>
                    </div>
                    <div>
                      <label for="content">Contenu</label>
                    </div>
                    <div class="mb-2">
                      <textarea name="content" id="content"></textarea>
                    </div>
                    <div>
                      <label for="image">Image</label>
                    </div>
                    <div class="mb-2">
                      <input type="file" name="image" id="image">
                    </div>
                    <div>
                      <label for="categorie">Catégorie</label>
                    </div>
                    <div class="mb-2">
                      <select name="categorie_id" id="categorie_id">
                        @foreach ($categories as $categorie)
                          <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-2">
                      <button class="h-10 px-5 my-2 transition-colors duration-150 bg-indigo-200 rounded-lg focus:shadow-outline hover:bg-indigo-400">Valider</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>