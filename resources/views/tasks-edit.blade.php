@extends('layouts.index')
@section('content')
<section>
  <form class="text-center" method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')
    <header class="mb-4">
      <h2 class="text-4xl">Editar tarea</h2>
    </header>
    <section class="grid grid-cols-2 gap-2">
      <section class="flex flex-col gap-2">
        <label class="flex flex-col">
          <span>Título <strong class="text-red-600">*</strong></span>
          <input type="text" name="title" placeholder="Título de la tarea" required value="{{$task->title}}" />
        </label>

        <label class="flex flex-col">
          <span>Estado</span>
          <select name="status">
            <option value="pending" @selected("pending"==$task->status)>Pendiente</option>
            <option value="inProgress" @selected("inProgress"==$task->status)>En progreso</option>
            <option value="completed" @selected("completed"==$task->status)>Completada</option>
          </select>
        </label>

        <label class="flex flex-col">
          <span>Fecha a terminar</span>
          <input type="date" name="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}" />
        </label>
      </section>

      <section>
        <label class="flex flex-col h-full">
          <span>Descripción <strong class="text-red-600">*</strong></span>
          <textarea name="description" class="h-full" placeholder="Algo" required>{{$task->description}}</textarea>
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