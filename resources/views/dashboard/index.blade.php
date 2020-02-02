@extends('layouts.app')

@section('content')
<script>
  window.widgets = @json($widgets)
</script>
<div id="dashboard">
</div>
@endsection