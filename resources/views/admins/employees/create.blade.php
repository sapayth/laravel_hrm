@extends('layouts.master')

@section('content')
<div class="card">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Add New Employee
  </div>
  <div class="card-body">
    <form action="{{ route('employees.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="personal-details">
            <div class="form-header">Personal details</div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="txtEmpName" class="form-control" placeholder="Employee Name">
              @error('txtEmpName')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Father's Name</label>
              <input type="text" name="txtEmpFather" class="form-control" placeholder="Father's Name">
              @error('txtEmpFather')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Mother's Name</label>
              <input type="text" name="txtEmpMother" class="form-control" placeholder="Mother's Name">
              @error('txtEmpMother')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Date of Birth</label>
              <input type="date" name="txtDob" class="form-control">
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" name="cmbGender">
                @foreach($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Contact No 1</label>              
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+880</div>
                </div>
                <input type="text" name="txtContact1" class="form-control" placeholder="Contact No 1">
              </div>
              @error('txtContact1')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Contact No 2</label>
              <input type="text" name="txtContact2" class="form-control" placeholder="Contact No 2">
            </div>
            <div class="form-group">
              <label>Present Address</label>
              <textarea class="form-control" name="txtareaPrsntAddrs"></textarea>
            </div>
            <div class="form-group">
              <label>Permanent Address</label>
              <textarea class="form-control" name="txtareaPrmntAddrs"></textarea>
            </div>
          </div>
          <div class="login-details">
            <div class="form-header">Log in details</div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="txtMail" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" autofill="off" name="txtPass" class="form-control" placeholder="Password">
            </div>
          </div>
        </div> <!-- end col-md-6 -->
        <div class="col-md-6">
          <div class="company-details">
            <div class="form-header">Company Details</div>
            <div class="form-group">
              <label>Employee ID</label>
              <input type="text" name="txtEmpId" class="form-control">
            </div>
            <div class="form-group">
              <label>Department</label>
              <select class="form-control" name="cmbDept" id="cmbDept">
                @foreach($depts as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Designation</label>
              <select class="form-control" name="cmbDesig" id="cmbDesig">
                @foreach($desigs as $desig)
                <option value="{{ $desig->id }}">{{ $desig->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Joining Date</label>
              <input type="date" name="txtJoiningDate" class="form-control">
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input type="text" name="txtSalary" class="form-control">
              @error('txtSalary')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="bank-details">
            <div class="form-header">Bank Details</div>
            <div class="form-group">
              <label>Account Holder Name</label>
              <input type="text" name="txtAccName" class="form-control">
            </div>
            <div class="form-group">
              <label>Account Number</label>
              <input type="text" name="txtAccNo" class="form-control">
            </div>
            <div class="form-group">
              <label>Bank Name</label>
              <input type="text" name="txtBankName" class="form-control">
            </div>
            <div class="form-group">
              <label>Branch</label>
              <input type="text" name="txtBankBranch" class="form-control">
            </div>
          </div>
        </div> <!-- end col-md-6 -->
      </div>
      <button type="submit" class="btn btn-primary">Save Employee</button>
    </form>
  </div>
</div>

@endsection
