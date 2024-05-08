@extends('layouts.index')
@section('content')
<header class="flex gap-56">
  <h2 class="text-4xl">CRUD de Tareas</h2>
  <a href="{{ url('/') }}" class="text-2xl border border-red-400 rounded-3xl p-2 hover:bg-red-400 hover:border-red-200 hover:text-red-200">Volver</a>
</header>

<div class="border-red-200 border m-2"></div>

<section class="text-center">
  <a href="{{ route('tasks.create') }}" class="text-lg border border-red-400 rounded-3xl p-1 hover:bg-red-400 hover:border-red-200 hover:text-red-200">
    Crear tarea
  </a>
</section>
@if(Session::get('success'))
<div class="text-green-500 text-center">
  {{ Session::get('success') }}
</div>
@endif
<section>

  <section>
    <table class="w-full mt-4 text-center">
      <thead>
        <tr>
          <th class="border border-red-400">ID</th>
          <th class="border border-red-400">Tarea</th>
          <th class="border border-red-400">Descripción</th>
          <th class="border border-red-400">Estado</th>
          <th class="border border-red-400">Fecha</th>
          <th class="border border-red-400">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
        <tr>
          <td class="border border-red-400">{{ $task->id }}</td>
          <td class="border border-red-400">{{ $task->title }}</td>
          <td class="border border-red-400">{{ $task->description }}</td>

          @if($task->status == 'pending')
          <td class="border border-red-400">Pendiente</td>
          @elseif($task->status == 'inProgress')
          <td class="border border-red-400">En progreso</td>
          @else
          <td class="border border-red-400">Completada</td>
          @endif

          <td class="border border-red-400">{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</td>
          <td class="border border-red-400 flex justify-center p-1 gap-1">
            <a href="{{ route('tasks.edit', $task->id) }}" class="text-lg border border-red-400 rounded-3xl p-1 hover:bg-red-400 hover:border-red-200 hover:text-red-200">Editar</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-lg border border-red-400 rounded-3xl p-1 hover:bg-red-400 hover:border-red-200 hover:text-red-200">Eliminar</button>
            </form>
        </tr>
        @endforeach
  </section>
  @endsection