<!-- resources/views/admin/contacts/show.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Kapcsolati üzenet részletei</h1>
        <div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Vissza a listához</a>
        </div>
    </div>

    <div class="row">
        <!-- Üzenet részletei -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Üzenet adatai</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Tárgy:</strong>
                        <p class="fs-4">{{ $contact->subject }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Feladó:</strong>
                            <p>{{ $contact->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>E-mail cím:</strong>
                            <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        </div>
                    </div>

                    @if($contact->phone)
                    <div class="mb-3">
                        <strong>Telefonszám:</strong>
                        <p><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
                    </div>
                    @endif

                    <div class="mb-3">
                        <strong>Időpont:</strong>
                        <p>{{ $contact->created_at->format('Y. m. d. H:i') }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Üzenet:</strong>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feladatok -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kapcsolódó feladatok</h5>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal">
                        <i class="fas fa-plus"></i> Új feladat
                    </button>
                </div>
                <div class="card-body">
                    @if($tasks->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Feladat</th>
                                        <th>Határidő</th>
                                        <th>Állapot</th>
                                        <th>Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr class="{{ $task->is_completed ? 'task-completed' : ($task->due_date && $task->due_date->isPast() ? 'task-overdue' : '') }}">
                                            <td>{{ $task->title }}</td>
                                            <td>
                                                {{ $task->due_date ? $task->due_date->format('Y.m.d.') : 'Nincs határidő' }}
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

                                                <form action="{{ route('admin.tasks.complete', $task) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm {{ $task->is_completed ? 'btn-secondary' : 'btn-success' }}">
                                                        <i class="fas {{ $task->is_completed ? 'fa-undo' : 'fa-check' }}"></i>
                                                    </button>
                                                </form>

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
                                                            <input type="hidden" name="contact_message_id" value="{{ $contact->id }}">
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
                    @else
                        <p class="text-muted">Nincs kapcsolódó feladat.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Oldalsáv - állapot és jegyzetek -->
        <div class="col-md-4">
            <!-- Állapot panel -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Állapot</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="status" class="form-label">Üzenet állapota</label>
                            <select class="form-select" id="status" name="status">
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>Új</option>
                                <option value="in_progress" {{ $contact->status == 'in_progress' ? 'selected' : '' }}>Folyamatban</option>
                                <option value="completed" {{ $contact->status == 'completed' ? 'selected' : '' }}>Befejezve</option>
                                <option value="archived" {{ $contact->status == 'archived' ? 'selected' : '' }}>Archiválva</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Jegyzetek</label>
                            <textarea class="form-control" id="notes" name="notes" rows="6">{{ $contact->notes }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Mentés</button>
                    </form>
                </div>
            </div>

            <!-- Gyors műveletek -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Gyors műveletek</h5>
                </div>
                <div class="card-body">
                    <a href="mailto:{{ $contact->email }}" class="btn btn-info w-100 mb-2">
                        <i class="fas fa-envelope"></i> E-mail küldése
                    </a>

                    @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="btn btn-success w-100 mb-2">
                        <i class="fas fa-phone"></i> Telefonhívás
                    </a>
                    @endif

                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Biztosan törölni szeretnéd ezt az üzenetet?')">
                            <i class="fas fa-trash"></i> Üzenet törlése
                        </button>
                    </form>
                </div>
            </div>
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
                        <input type="hidden" name="contact_message_id" value="{{ $contact->id }}">
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
