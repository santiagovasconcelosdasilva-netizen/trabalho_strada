@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
  <div class="mb-4">
    <h1 class="h3 mb-0">Editar usuário</h1>
    <p class="text-muted">Atualize as informações do usuário.</p>
  </div>

  <form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    @include('users._form')

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
