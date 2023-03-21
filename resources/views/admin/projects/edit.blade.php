@extends('layouts.admin')

@section('pageTitle')
    Modifica {{ $project->title }} | Portfolio    
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Modifica Progetto
                </h1>
            </div>
        </div>
        
        @include('partials.success')

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Titolo<span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            required
                            maxlength="64"
                            value="{{ old('title', $project->title) }}"
                            placeholder="Inserisci il titolo...">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Contenuto<span class="text-danger">*</span>
                        </label>
                        <textarea
                            class="form-control"
                            rows="10"
                            id="description"
                            name="description"
                            required
                            maxlength="4096"
                            placeholder="Inserisci il contenuto...">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Stato</label>
                        <select class="form-select" name="status" id="status" required>
                            <option {{ !isset($project->status) ? 'selected' : '' }}>-- Seleziona uno stato --</option>
                            <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>{{ __('page.completed') }}</option>
                            <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>{{ __('page.active') }}</option>
                            <option value="on_hold" {{ old('status', $project->status) == 'on_hold' ? 'selected' : '' }}>{{ __('page.on_hold') }}</option>
                            <option value="cancelled" {{ old('status', $project->status) == 'cancelled' ? 'selected' : '' }}>{{ __('page.cancelled') }}</option>
                        </select>
                    </div>

                    <div>
                        <p>
                            N.B. i campi contrassegnati con <span class="text-danger">*</span> sono obbligatori.
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning">
                            Aggiorna
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection