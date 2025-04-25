<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1 class="h2 mb-4">Vezérlőpult</h1>

    <!-- Összefoglaló kártyák -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Üzenetek</h5>
                    <p class="card-text fs-1">{{ $totalContacts }}</p>
                    <p class="text-muted">Összes kapcsolatfelvételi üzenet</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Új üzenetek</h5>
                    <p class="card-text fs-1">{{ $newContacts }}</p>
                    <p class="text-muted">Olvasatlan üzenetek</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Jövőbeli feladatok</h5>
                    <p class="card-text fs-1">{{ $upcomingTasks->count() }}</p>
                    <p class="text-muted">Közelgő feladatok</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Lejárt feladatok</h5>
                    <p class="card-text fs-1 {{ $overdueTasks->count() > 0 ? 'text-danger' : '' }}">{{ $overdueTasks->count() }}</p>
                    <p class="text-muted">Határidőn túli feladatok</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Üzenetek -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Legutóbbi üzenetek</h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary">Összes üzenet</a>
                </div>
                <div class="card-body">
                    @if($latestContacts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Név</th>
                                        <th>Tárgy</th>
                                        <th>Dátum</th>
                                        <th>Állapot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestContacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.contacts.show', $contact) }}">
                                                    {{ $contact->subject }}
                                                </a>
                                            </td>
                                            <td>{{ $contact->created_at->format('Y.m.d. H:i') }}</td>
                                            <td>
                                                @if(!$contact->is_read)
                                                    <span class="badge bg-danger">Új</span>
                                                @else
                                                    <span class="badge bg-{{ $contact->status == 'completed' ? 'success' : ($contact->status == 'in_progress' ? 'warning' : 'secondary') }}">
                                                        {{ $contact->status == 'new' ? 'Új' :
                                                           ($contact->status == 'in_progress' ? 'Folyamatban' :
                                                           ($contact->status == 'completed' ? 'Befejezve' : 'Archiválva')) }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Nincs megjeleníthető üzenet.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Feladatok -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Közelgő feladatok</h5>
                    <a href="{{ route('admin.tasks.index') }}" class="btn btn-sm btn-primary">Összes feladat</a>
                </div>
                <div class="card-body">
                    @if($upcomingTasks->count() > 0)
                        <div class="list-group">
                            @foreach($upcomingTasks as $task)
                                <a href="{{ route('admin.tasks.index') }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $task->title }}</h6>
                                        <small class="{{ $task->due_date && $task->due_date->isPast() ? 'text-danger' : '' }}">
                                            {{ $task->due_date ? $task->due_date->format('Y.m.d.') : 'Nincs határidő' }}
                                        </small>
                                    </div>
                                    @if($task->contactMessage)
                                        <small class="text-muted">Kapcsolat: {{ $task->contactMessage->name }}</small>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Nincs közelgő feladat.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lejárt határidejű feladatok</h5>
                </div>
                <div class="card-body">
                    @if($overdueTasks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Feladat</th>
                                        <th>Kapcsolat</th>
                                        <th>Határidő</th>
                                        <th>Művelet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($overdueTasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>
                                                @if($task->contactMessage)
                                                    <a href="{{ route('admin.contacts.show', $task->contactMessage) }}">
                                                        {{ $task->contactMessage->name }}
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-danger">{{ $task->due_date->format('Y.m.d.') }}</td>
                                            <td>
                                                <form action="{{ route('admin.tasks.complete', $task) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Kész</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Nincs lejárt határidejű feladat.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
