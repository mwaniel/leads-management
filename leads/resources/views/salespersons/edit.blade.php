@extends('layouts.app')

@section('content')
    <h1>Edit Salesperson</h1>
    <form action="{{ route('salespersons.update', $salesperson->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="salesname">Name</label>
            <input type="text" class="form-control" id="salesname" name="salesname" value="{{ $salesperson->salesname }}" required>
        </div>
        <div class="form-group">
            <label for="travelspirit_id">Travel Spirit ID</label>
            <input type="text" class="form-control" id="travelspirit_id" name="travelspirit_id" value="{{ $salesperson->travelspirit_id }}" required>
        </div>
        <!-- Add other fields as needed -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
