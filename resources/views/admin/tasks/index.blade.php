<!-- resources/views/admin/tasks/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Feladatok</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal">
            <i class="fas fa-plus"></i> Új feladat
        </button>
    </div>

    <!-- Szűrők -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.tasks.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="show_completed" id="show_completed" value="1" {{ request('show_completed') ? 'checked' : '' }}>
                        <label class="form-check-label" for="show_completed">
                            Befejezett feladatok mutatása
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="due_date" class="form-label">Határidő</label>
                    <select name="due_date" id="due_date" class="form-select">
                        <option value="all" {{ request('due_date') == 'all' || !request('due_date') ? 'selected' : '' }}>Összes</option>
                        <option value="today" {{ request('due_date') == 'today' ? 'selected' : '' }}>Ma</option>
                        <option value="week" {{ request('due_date') == 'week' ? 'selected' : '' }}>Egy héten belül</option>
                        <option value="month" {{ request('due_date') == 'month' ? 'selected' : '' }}>Egy hónapon belül</option>
                        <option value="overdue" {{ request('due_date') == 'overdue' ? 'selected' : '' }}>Lejárt határidő</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="search" class="form-label">Keresés</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Feladat címe..." value="{{ request('search') }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Szűrés</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Feladatok táblázat -->
    <div class="card">
        <div class="card-body">
            @if($tasks->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px;"></th>
                                <th>
                                    <a href="{{ route('admin.tasks.index', array_merge(request()->query(), ['orderBy' => 'title', 'order' => request('orderBy') == 'title' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        Feladat
                                        @if(request('orderBy') == 'title')
                                            <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Kapcsolati üzenet</th>
                                <th>
                                    <a href="{{ route('admin.tasks.index', array_merge(request()->query(), ['orderBy' => 'due_date', 'order' => request('orderBy') == 'due_date' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        Határidő
                                        @if(request('orderBy') == 'due_date' || !request('orderBy'))
                                            <i class="fas fa-sort-{{ request('order') == 'asc' || !request('order') ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Állapot</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr class="{{ $task->is_completed ? 'task-completed' : ($task->due_date && $task->due_date->isPast() ? 'task-overdue' : '') }}">
                                    <td>
                                        <form action="{{ route('admin.tasks.complete', $task) }}" method="POST">
                                            @csrf
                                            <div class="form-check">
                                                <input class="form-check-input task-checkbox" type="checkbox" {{ $task->is_completed ? 'checked' : '' }} onchange="this.form.submit()">
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="{{ $task->is_completed ? 'text-decoration-line-through' : '' }}">{{ $task->title }}</span>
                                        @if($task->description)
                                            <button type="button" class="btn btn-sm btn-link p-0 ms-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="{{ $task->description }}">
                                                <i class="fas fa-info-circle text-muted"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($task->contactMessage)
                                            <a href="{{ route('admin.contacts.show', $task->contactMessage) }}">
                                                {{ $task->contactMessage->name }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($task->due_date)
                                            <span class="{{ $task->is_completed ? '' : ($task->due_date->isPast() ? 'text-danger' : '') }}">
                                                {{ $task->due_date->format('Y.m.d.') }}
                                            </span>
                                        @else
                                            <span class="text-muted">Nincs határidő</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($task->is_completed)
                                            <span class="badge bg-success">Kész</span>
                                        @elseif($task->due_date && $task->due_date->isPast())
                                            <span class="badge bg-danger">Lejárt</span>
                                        @else
                                            <span class="badge bg-primary">Folyamatban</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $task->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Biztosan törölni szeretnéd ezt a feladatot?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Feladat Szerkesztés Modal -->
                                <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModal{{ $task->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editTaskModal{{ $task->id }}Label">Feladat szerkesztése</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.tasks.update', $task) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Feladat címe</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Leírás</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="due_date" class="form-label">Határidő</label>
                                                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contact_message_id" class="form-label">Kapcsolt üzenet</label>
                                                        <select class="form-select" id="contact_message_id" name="contact_message_id">
                                                            <option value="">Nincs kapcsolt üzenet</option>
                                                            @foreach($contacts as $contact)
                                                                <option value="{{ $contact->id }}" {{ $task->contact_message_id == $contact->id ? 'selected' : '' }}>
                                                                    {{ $contact->name }} - {{ Str::limit($contact->subject, 30) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
                                                    <button type="submit" class="btn btn-primary">Mentés</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $tasks->appends(request()->query())->links() }}
                </div>
            @else
                <p class="text-center text-muted">Nincs találat a megadott szűrési feltételeknek megfelelően.</p>
            @endif
        </div>
    </div>

    <!-- Új feladat Modal -->
    <div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTaskModalLabel">Új feladat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tasks.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Feladat címe</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Leírás</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Határidő</label>
                            <input type="date" class="form-control" id="due_date" name="due_date">
                        </div>
                        <div class="mb-3">
                            <label for="contact_message_id" class="form-label">Kapcsolt üzenet</label>
                            <select class="form-select" id="contact_message_id" name="contact_message_id">
                                <option value="">Nincs kapcsolt üzenet</option>
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">
                                        {{ $contact->name }} - {{ Str::limit($contact->subject, 30) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Popover inicializálása
    document.addEventListener('DOMContentLoaded', function() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        });

        // Azonnali elküldés a checkbox-ra kattintáskor
        document.querySelectorAll('.task-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    });
</script>
@endsection
