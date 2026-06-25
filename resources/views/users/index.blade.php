@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-0">Usuários</h1>
      <p class="text-muted">Gerencie os usuários cadastrados no sistema.</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Novo usuário</a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Criado em</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
            <td>
              <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
              <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-primary">Editar</a>
              <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{ $users->links() }}
@endsection
