@extends('layouts.app')

@section('content')
    <h1>Add Salesperson</h1>
    <form action="{{ route('salespersons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="salesname">Name</label>
            <input type="text" class="form-control" id="salesname" name="salesname" required>
        </div>
        <div class="form-group">
            <label for="travelspirit_id">Travel Spirit ID</label>
            <input type="text" class="form-control" id="travelspirit_id" name="travelspirit_id" required>
        </div>
        <!-- Add other fields as needed -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
