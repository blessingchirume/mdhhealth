@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>List of Patients with Episodes</h2>
    <table class="table">
      <thead>
        <tr>
          <th>patient Name</th>
          <th>Episodes</th>
        </tr>
      </thead>
      <tbody>
        @foreach($episodes as $episode)
        <tr>
          <td>{{ $Episode->patient->name }}</td>
          <td>
            <ul>
              @foreach($episodes as $episode)
              <li>{{ $episode->episode_code }}</li>
              @endforeach
            </ul>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
