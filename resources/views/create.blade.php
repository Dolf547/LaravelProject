{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Cadastrar Novo Veículo</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" method="POST" action="{{ route('vehicles.store') }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required maxlength="20">
        <label for="Nome">Ano:</label>
        <input type="number" name="year" id="year" required maxlength="4">
        <label for="Nome">Cor:</label>
        <input type="text" name="color" id="color" required maxlength="20">
        <input type="submit" name="salvar" id="salvar" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection