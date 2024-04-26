@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">All Leads</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Note</th>
                        <th>How</th>
                        <th>Mail ID</th>
                        <th>Mail Date</th>
                        <th>Mail Message</th>
                        <th>Mail Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->surname }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->status }}</td>
                            <td>{{ $lead->note }}</td>
                            <td>{{ $lead->how }}</td>
                            <td>{{ $lead->mail_id }}</td>
                            <td>{{ $lead->mail_date }}</td>
                            <td>{{ $lead->mail_message }}</td>
                            <td>{{ $lead->mail_subject }}</td>
                            <td>
                                <form action="{{ route('leads.update_status', $lead->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="good" {{ $lead->status === 'good' ? 'selected' : '' }}>Good</option>
                                            <option value="bad" {{ $lead->status === 'bad' ? 'selected' : '' }}>Bad</option>
                                            <option value="later" {{ $lead->status === 'later' ? 'selected' : '' }}>Later</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="note" class="form-control" placeholder="Add note...">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
