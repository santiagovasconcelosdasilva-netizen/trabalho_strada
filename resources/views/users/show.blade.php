@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
  <div class="mb-4">
    <h1 class="h3 mb-0">Detalhes do usuário</h1>
    <p class="text-muted">Visualize as informações completas do usuário.</p>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row mb-0">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9">{{ $user->id }}</dd>

        <dt class="col-sm-3">Nome</dt>
        <dd class="col-sm-9">{{ $user->name }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">{{ $user->email }}</dd>

        <dt class="col-sm-3">Criado em</dt>
        <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i') }}</dd>

        <dt class="col-sm-3">Atualizado em</dt>
        <dd class="col-sm-9">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
      </dl>
    </div>
  </div>

  <div class="mt-3">
    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
  </div>
@endsection
