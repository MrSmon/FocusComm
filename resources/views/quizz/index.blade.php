@extends('layouts.master')
@section('title', 'Quizz')
@section('content')
<h1>Quizz</h1>

<script>
var categories = {!! $categories !!};
</script>

<div id="liensCatQ">

</div>

@endsection