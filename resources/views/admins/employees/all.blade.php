@extends('layouts.master')

@section('content')
<div class="card col-md-12">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Employee List
  </div>
  <div class="card-body">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Employee ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Department/Designation</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      @if($employees)
      @foreach($employees as $emp)
      <tr>
        <td>{{ $emp->emp_id }}</td>
        <td></td>
        <td>{{ $emp->name }}</td>
        <td>
          <p>Department: {{ $emp->department }}</p>
          <p>Designation: {{ $emp->designation }}</p>
        </td>
        <td><span class="badge badge-secondary">Active</span></td>
        <td>
          <form action="{{ route('employees.edit', $emp->id) }}" style="float:left; margin-right:10px;" method="post">
            @csrf
            @method('GET')
            <input type="submit" class="btn btn-primary btn-sm" value="View/Edit">
          </form>
          <form action="{{ route('employees.destroy', $emp->id) }}" style="float:left; margin-right:10px;" method="post">
            @csrf
            <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm" value="Delete">
          </form>
        </td>
      </tr>
      @endforeach
      @endif
    </table>
  </div>
</div>

@endsection
