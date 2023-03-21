@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Tutti i progetti
                </h1>

                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                    Aggiungi Progetto
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                        Dettagli
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                        Aggiorna
                                    </a>
                                    <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection