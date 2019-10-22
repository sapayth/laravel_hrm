@extends('layouts.master')

@section('content')
<div class="card col-md-12">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Add Department
  </div>
  <div class="card-body">

    <?php // echo dd(session()->all()); ?>

    <form action="{{ route('departments.update') }}" method="post">
      @csrf
      <div class="form-group">
        <label>Department Name</label>
        @if(session('dept_name'))
        <input type="text" name="txtDept" class="form-control" value="{{ session('dept_name') }}">
        <input type="hidden" name="hdnDeptId" class="form-control" value="{{ session('dept_id') }}">
        @endif
        @error('txtDept')
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label>Designations</label>
        @if( session('desig_arr') )
        @foreach( session('desig_arr') as $desig )
        <div class="row" style="margin-bottom:10px;">
          <div class="col-md-4">
            <input type="text" class="form-control" value="{{ $desig }}">
          </div>
        </div>
        @endforeach
        @endif
        <div class="row" style="margin-bottom:10px;">
          <div class="col-md-4">
            <input type="text" name="txtDesig" class="form-control" placeholder="Designation Name">
          </div>
          <div class="col-md-1">
            <button type="submit" name="btnAddDesignation" class="btn btn-primary"><i class="fa fa-plus"></i></button>
          </div>
        </div>
      </div>
      <button type="submit" name="btnDptUpdate" class="btn btn-primary">Update Department</button>
    </form>
    <!-- </div> end card-body -->
  </div>
  @endsection
