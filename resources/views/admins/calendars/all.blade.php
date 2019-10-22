@extends('layouts.master')

@section('content')
<div class="card col-md-12">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Make Calendar
		<a href="{{ route('calendars.create') }}">Create</a>
	</div>
</div>
@endsection
