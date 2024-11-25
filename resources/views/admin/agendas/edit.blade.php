@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Agenda</h1>
    <form action="{{ route('dashboard.agendas.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $agenda->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required>{{ old('description', $agenda->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="event_date">Event Date</label>
            <input type="date" class="form-control" name="event_date" id="event_date" value="{{ old('event_date', $agenda->event_date ? $agenda->event_date->toDateString() : null) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update Agenda
        </button>
        <a href="{{ route('dashboard.agendas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </form>
</div>
@endsection
