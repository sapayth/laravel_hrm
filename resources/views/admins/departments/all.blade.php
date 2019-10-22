@extends('layouts.master')

@section('content')
<div class="card col-md-12">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Department List
	</div>
	<div class="card-body">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Department Name</th>
					<th>Designation</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($depts as $dept)
			<tr>
				<td>{{ $dept->name }}</td>
				<td>
					<ul>
						@foreach($designations as $desig)
						@if( $desig->dept_id == $dept->id )
						<li>{{ $desig->name }}</li>
						@endif
						@endforeach
					</ul>
				</td>
				<td>
					<form action="departments/{{ $dept->id }}/edit" method="post">
						@csrf
						@method('GET')
						<input type="hidden" name="hdnDeptId" value="{{ $dept->id }}">
						<input type="submit" class="btn btn-primary btn-sm" style="float:left; margin-right:10px;" value="View/Edit">
					</form>
					<form action="{{ route('departments.destroy') }}" method="post">
						@csrf
						<input type="hidden" name="hdnDeptId" value="{{ $dept->id }}">
						<input type="submit" onclick="return confirm('Are you sure?');" value="Delete" class="btn btn-danger btn-sm">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection
