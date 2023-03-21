@extends('layouts.admin')

@section('pageTitle')
    {{ $project->title }} | Portfolio
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <h1>
                    {{ $project->title }}
                </h1>

                <h6>
                    <span class="fw-bold">
                        Slug:
                    </span>
                    {{ $project->slug }}
                </h6>

                <p>
                    <span class="fw-bold">
                        Descrizione:
                    </span>
                    {{ $project->description }}
                </p>

                <p>
                    <span class="fw-bold">
                        Stato:
                    </span>
                    {{ $project->status }}
                </p>
            </div>
        </div>
    </div>
@endsection