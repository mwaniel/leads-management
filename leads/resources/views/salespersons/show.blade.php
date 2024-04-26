@extends('layouts.app')

@section('content')
    <h1>Salesperson Details</h1>
    <p><strong>Name:</strong> {{ $salesperson->salesname }}</p>
    <p><strong>Travel Spirit ID:</strong> {{ $salesperson->travelspirit_id }}</p>
    <!-- Show other details as needed -->
    <a href="{{ route('salespersons.index') }}" class="btn btn-secondary">Back</a>
@endsection
