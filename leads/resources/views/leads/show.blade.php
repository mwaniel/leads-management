@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lead Details</h1>
        <p><strong>Surname:</strong> {{ $lead->surname }}</p>
        <p><strong>Email:</strong> {{ $lead->email }}</p>
        <p><strong>Status:</strong> {{ $lead->lead_status }}</p>
        <!-- Add other lead details here -->
        <a href="{{ route('leads.index') }}" class="btn btn-primary">Back to All Leads</a>
    </div>
@endsection
