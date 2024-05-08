@extends('layouts.index')
@section('content')
<section>
  <form class="text-center" method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <header class="mb-4">
      <h2 class="text-4xl">Crear tarea</h2>
    </header>
    <section class="grid grid-cols-2 gap-2">
      <section class="flex flex-col gap-2">
        <label class="flex flex-col">
          <span>Título <strong class="text-red-600">*</strong></span>
          <input type="text" name="title" placeholder="Título de la tarea" required />
        </label>

        <label class="flex flex-col">
          <span>Estado</span>
          <select name="status" default={pending}>
            <option value="pending">Pendiente</option>
            <option value="inProgress">En progreso</option>
            <option value="completed">Completada</option>
          </select>
        </label>

        <label class="flex flex-col">
          <span>Fecha a terminar</span>
          <input type="date" name="due_date" />
        </label>
      </section>

      <section>
        <label class="flex flex-col h-full">
          <span>Descripción <strong class="text-red-600">*</strong></span>
          <textarea name="description" class="h-full" placeholder="Algo" required></textarea>
        </label>
      </section>
    </section>

    <footer class="mt-4 flex justify-between">
      <a href="{{ route('tasks.index')}}" class="border border-red-400 rounded-3xl p-1 hover:bg-red-400 hover:border-red-200 hover:text-red-200">Volver</a>
      <button type="submit" class="border border-red-400 rounded-3xl p-1 hover:bg-red-400 hover:border-red-200 hover:text-red-200">
        Guardar
      </button>
    </footer>
</section>
@if ($errors->any())
<div class="">
  <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
</form>
@endsection