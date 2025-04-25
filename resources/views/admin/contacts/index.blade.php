<!-- resources/views/admin/contacts/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Kapcsolati üzenetek</h1>
    </div>

    <!-- Szűrők -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.contacts.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="status" class="form-label">Státusz</label>
                    <select name="status" id="status" class="form-select">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Összes</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>Új</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Folyamatban</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Befejezve</option>
                        <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archiválva</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="read" class="form-label">Olvasottság</label>
                    <select name="read" id="read" class="form-select">
                        <option value="all" {{ request('read') == 'all' || !request('read') ? 'selected' : '' }}>Összes</option>
                        <option value="unread" {{ request('read') == 'unread' ? 'selected' : '' }}>Olvasatlan</option>
                        <option value="read" {{ request('read') == 'read' ? 'selected' : '' }}>Olvasott</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="search" class="form-label">Keresés</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Név, e-mail, tárgy..." value="{{ request('search') }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Szűrés</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Üzenetek táblázat -->
    <div class="card">
        <div class="card-body">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ route('admin.contacts.index', array_merge(request()->query(), ['orderBy' => 'name', 'order' => request('orderBy') == 'name' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        Név
                                        @if(request('orderBy') == 'name')
                                            <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.contacts.index', array_merge(request()->query(), ['orderBy' => 'email', 'order' => request('orderBy') == 'email' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        E-mail
                                        @if(request('orderBy') == 'email')
                                            <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.contacts.index', array_merge(request()->query(), ['orderBy' => 'subject', 'order' => request('orderBy') == 'subject' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        Tárgy
                                        @if(request('orderBy') == 'subject')
                                            <i class="fas fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.contacts.index', array_merge(request()->query(), ['orderBy' => 'created_at', 'order' => request('orderBy') == 'created_at' && request('order') == 'asc' ? 'desc' : 'asc'])) }}">
                                        Dátum
                                        @if(request('orderBy') == 'created_at' || !request('orderBy'))
                                            <i class="fas fa-sort-{{ request('order') == 'asc' || !request('order') ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Állapot</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}">
                                            {{ $contact->subject }}
                                            @if(!$contact->is_read)
                                                <span class="badge bg-danger">Új</span>
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ $contact->created_at->format('Y.m.d. H:i') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $contact->status == 'completed' ? 'success' : ($contact->status == 'in_progress' ? 'warning' : ($contact->status == 'archived' ? 'secondary' : 'primary')) }}">
                                            {{ $contact->status == 'new' ? 'Új' :
                                              ($contact->status == 'in_progress' ? 'Folyamatban' :
                                              ($contact->status == 'completed' ? 'Befejezve' : 'Archiválva')) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Biztosan törölni szeretnéd ezt az üzenetet?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $contacts->appends(request()->query())->links() }}
                </div>
            @else
                <p class="text-center text-muted">Nincs találat a megadott szűrési feltételeknek megfelelően.</p>
            @endif
        </div>
    </div>
@endsection
