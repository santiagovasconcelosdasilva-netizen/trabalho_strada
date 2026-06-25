@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
  <div class="mb-4">
    <h1 class="h3 mb-0">Criar usuário</h1>
    <p class="text-muted">Preencha os dados para cadastrar um novo usuário.</p>
  </div>

  <form action="{{ route('users.store') }}" method="POST">
    @csrf

    @include('users._form')

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
