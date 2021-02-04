{{--
  Variables disponibles
    - $categories ARRAY(Categorie)
--}}

@php
  $tags = \App\Models\Tag::orderBy('name', 'ASC')->get();
  $clients = \App\Models\Client::orderBy('name', 'ASC')->get();
@endphp

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Ajout d\'un work') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('worksAdmin.index') }}">Revenir vers la gestion des posts</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Ajout d'un enregistrement</h3>
                  <form action="{{ route('worksAdmin.insert') }}" method="post" enctype="multipart/form-data">
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
                    <div class="mb-4">
                      <textarea name="content" id="content"></textarea>
                    </div>
                    <div>
                      <label for="image">Image</label>
                    </div>
                    <div class="mb-2">
                      <input type="file" name="image" id="image">
                    </div>
                    <br>
                    <div>
                      <label for="inSlider">inSlider</label>
                    </div>
                    <select name="inSlider" id="inSlider">
                      <option value="0">non</option>
                      <option value="1">oui</option>
                    </select>
                    <br>
                    <br>
                    <div>
                      <label for="client_id">Client</label>
                    </div>
                    <div class="mb-2">
                      <select name="client_id" id="client_id">
                        @foreach ($clients as $client)
                          <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      <label for="tags">Tags</label>
                    </div>
                    @foreach ($tags as $tag)
                      <div>
                          <input type="checkbox" id="{{$tag->name}}" name="tags[]" value="{{$tag->id}}">
                          <label for="{{$tag->name}}">{{$tag->name}}</label>
                      <div/>
                    @endforeach
                      <button class="h-10 px-5 my-2 transition-colors duration-150 bg-indigo-200 rounded-lg focus:shadow-outline hover:bg-indigo-400">Valider</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>