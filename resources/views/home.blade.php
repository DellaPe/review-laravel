@extends('layouts.index')
@section('content')
<header class="text-center border-2 p-4 border-red-400 rounded-3xl">
  <h1 class="text-6xl">PHP + Lavarel</h1>
  <h3 class="text-xl mt-3 text-red-400">Proyecto realizado para repasar la creación y acciones basica de PHP + Laravel</h3>
  <p class="text-red-400">(ultimas versiones)</p>
</header>
<section class="flex justify-center items-center mt-4">
  <a href="{{ route('tasks.store') }}" class="text-2xl border border-red-400 rounded-3xl p-2 hover:bg-red-400 hover:border-red-200 hover:text-red-200">Ir a tareas</a>
</section>
@endsection