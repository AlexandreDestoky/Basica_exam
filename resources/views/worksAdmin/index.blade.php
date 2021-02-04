{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Gestion des works') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  {{-- <h3 class="my-2 text-left py-2 text-2xl">Gestion des posts</h3> --}}
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('worksAdmin.addForm') }}">Ajouter un enregistrement</a>
                  </div>
                  <table class="table-auto shadow-lg bg-white">
                    <thead>
                      <tr>
                        <th class="bg-indigo-100 border text-left px-4 py-2">#</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Title</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Content</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Image</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">inSlider</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Created</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Updated</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Client</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Tag</th>
                        <th class="bg-indigo-100 border text-left px-4 py-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($works as $work)
                        <tr>
                          <td class="border px-4 py-2">{{ $work->id }}</td>
                          <td class="border px-4 py-2">{{ $work->title }}</td>
                          <td class="border px-4 py-2">{{ Str::words($work->content, 10, ' ...') }}</td>
                          <td class="border px-4 py-2">{{ $work->image }}</td>
                          <td class="border px-4 py-2">{{ $work->inSlider === 1 ? "oui":"non" }}</td>
                          <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($work->created_at)->format('j/m/Y') }}</td>
                          <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($work->updated_at)->format('j/m/Y') }}</td>
                          <td class="border px-4 py-2">{{ $work->client->name }}</td>
                          <td class="border px-4 py-2">@include('tags._portfolio_tags_show', ['tags' => $work->tags])</td>
                          <td class="border px-4 py-2">
                            <a href="#">Edit</a> | <a href="#">Delete</a>
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