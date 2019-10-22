@extends('layouts.master')

@section('content')
<div class="card col-md-12">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Make Calendar
	</div>
	<div class="card-body">
    <form class="" action="{{ route('calendars.store') }}" method="post">
			@csrf
      <div class="form-group">
        <label>Year</label>
        <input type="text" name="txtEmpName" class="form-control" placeholder="Year">
      </div>
      <div class="form-group">
        <label>Weekly Holiday</label>
        <select class="form-control" name="cmbWeeklyHoliday">
          <option value="1">Saturday</option>
          <option value="2">Sunday</option>
          <option value="3">Monday</option>
          <option value="4">Tuesdsay</option>
          <option value="5">Wednesday</option>
          <option value="6">Thursday</option>
          <option value="7">Friday</option>
        </select>
      </div>
      <input type="submit" class="form-control" value="Create Calendar">
    </form>
	</div>
</div>
@endsection
