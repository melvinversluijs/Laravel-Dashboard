@extends('layouts.app')

@section('content')
<div class="dashboard">
  @foreach ($widgets as $widget)
  <div class="widget" id="{{ $widget['id'] }}"
    style="grid-column: {{ $widget['start-x'] }} / {{ $widget['end-x'] }}; grid-row: {{ $widget['start-y'] }} / {{ $widget['end-y'] }}">
  </div>
  @endforeach
</div>
@endsection