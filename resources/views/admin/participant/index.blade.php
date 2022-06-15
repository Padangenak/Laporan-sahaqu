@extends('layouts/admin-layout')

@section('title')
List Participant
@endsection

@section('content')
<div class="is-flex is-justify-content-flex-end">
  <a href="{{ route('admin.participant.create') }}" class="button is-primary">Buat baru</a>
</div>
<table class="table is-fullwidth">
  <thead>
    <th>ID</th>
    <th>Nama</th>
  </thead>
  <tbody>
    @forelse ($participants as $participant)
    <tr>
      <td>{{ $i++ }}</td>
      <td>{{ $participant->name }}</td>
    </tr>
    @empty
    <tr>
      <td colspan="2" class="has-text-centered">Data Participant Kosong</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection