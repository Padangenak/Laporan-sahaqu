@extends('layouts/admin-layout')

@section('title')
Buat Participant
@endsection

@section('content')
<div>
  <form action="{{ route('admin.participant.create') }}" method="post">
    @csrf
    <x-form-input name="name" title="Nama" class="has-background-danger" />
    <button class="button is-primary">Submit</button>
  </form>
</div>
@endsection