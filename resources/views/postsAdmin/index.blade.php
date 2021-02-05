{{--
  Variables disponibles
    - $categories ARRAY(Categorie)
--}}

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Gestion des posts') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  {{-- <h3 class="my-2 text-left py-2 text-2xl">Gestion des posts</h3> --}}
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('postsAdmin.addForm') }} " class="hover:text-red-400">Ajouter un enregistrement</a>
                  </div>
                  <table class="table-auto shadow-lg bg-white">
                    <thead>
                      <tr>
                        <th class="bg-indigo-700 border text-white px-1 py-2">#</th>
                        <th class="bg-indigo-700 border text-white px-3 py-2">Title</th>
                        <th class="bg-indigo-700 border text-white px-4 py-2">Content</th>
                        <th class="bg-indigo-700 border text-white px-3 py-2">Created</th>
                        <th class="bg-indigo-700 border text-white px-3 py-2">Updated</th>
                        <th class="bg-indigo-700 border text-white px-3 py-2">Categorie</th>
                        <th class="bg-indigo-700 border text-white px-5 py-2">Image</th>
                        <th class="bg-indigo-700 border text-white px-4 py-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                        <tr>
                          <td class="border px-4 py-2 bg-indigo-300">{{ $post->id }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ $post->title }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ Str::words($post->content, 10, ' ...') }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ \Carbon\Carbon::parse($post->created_at)->format('j/m/Y') }} {{ \Carbon\Carbon::parse($post->created_at)->format('G:i:s') }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ \Carbon\Carbon::parse($post->updated_at)->format('j/m/Y') }} {{ \Carbon\Carbon::parse($post->updated_at)->format('G:i:s') }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ $post->categorie->name }}</td>
                          <td class="border px-4 py-2 bg-indigo-300">{{ $post->image }} <img src="{{ asset('assets/img/blog/' . $post->image )}}" alt="{{ $post->title }}"></td>
                          <td class="border px-4 py-2 bg-indigo-300">
                            <a href="{{ route('postsAdmin.editForm', $post->id) }}" class="hover:text-red-400">Edit</a> | 
                            <form action="{{ route('postsAdmin.destroy', $post->id) }}" method="post" class="py-1.5">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="hover:text-red-400">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout> 