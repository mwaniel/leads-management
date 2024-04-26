@extends('layouts.app')

@section('content')
    <h1>All Salespersons</h1>
    <a href="{{ route('salespersons.create') }}" class="btn btn-primary mb-3">Add Salesperson</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Travel Spirit ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salespersons as $salesperson)
            <tr>
                <td>{{ $salesperson->salesname }}</td>
                <td>{{ $salesperson->travelspirit_id }}</td>
                <td>
                    <a href="{{ route('salespersons.show', $salesperson->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('salespersons.edit', $salesperson->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
