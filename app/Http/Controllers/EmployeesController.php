<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class EmployeesController extends Controller
{
  public function index() {
    $data['employees'] = DB::table('lhrm_employees')
                        ->join('lhrm_departments', 'lhrm_employees.dept_id', '=', 'lhrm_departments.id')
                        ->join('lhrm_designations', 'lhrm_employees.desig_id', '=', 'lhrm_designations.id')
                        ->join('lhrm_genders', 'lhrm_employees.gender_id', '=', 'lhrm_genders.id')
                        ->select(
                            'lhrm_employees.*',
                            'lhrm_departments.name AS department',
                            'lhrm_designations.name AS designation',
                            'lhrm_genders.name AS gender'
                        )
                        ->get();
    // $data['depts'] = DB::table('lhrm_departments')->get();
    // $data['desigs'] = DB::table('lhrm_designations')->get();
    // $data['genders'] = DB::table('lhrm_genders')->get();

    return view('admins.employees.all')->with($data);
  }

  public function create() {
    $data['depts'] = DB::table('lhrm_departments')->get();
    $data['desigs'] = DB::table('lhrm_designations')
    ->where('dept_id', 1)
    ->get();
    $data['genders'] = DB::table('lhrm_genders')->get();
    return view('admins.employees.create')->with($data);
  }

  public function store(Request $request) {
    $request->validate([
      'txtEmpName' => 'required|min:2|max:50',
      'txtEmpFather' => 'required|min:2|max:50',
      'txtEmpMother' => 'required|min:2|max:50',
      'txtContact1' => 'required|max:10',
      'txtSalary' => 'required',
    ],
    [
      'txtEmpName.required' => 'Employee name is required',
      'txtEmpName.min' => 'Minimum lenght should be 2',
      'txtEmpName.max' => 'Sorry, Name cannot be that long',
      'txtEmpFather.required' => 'Employee Father\'s name is required',
      'txtEmpFather.min' => 'Minimum lenght should be 2',
      'txtEmpFather.max' => 'Sorry, Name cannot be that long',
      'txtEmpMother.required' => 'Employee Mother\'s name is required',
      'txtEmpMother.min' => 'Minimum lenght should be 2',
      'txtEmpMother.max' => 'Sorry, Name cannot be that long',
      'txtContact1.required' => 'Minumum 1 contact number is required',
      'txtContact1.max' => 'Sorry, contact no cannot be that long',
      'txtSalary.required' => 'Sorry, Salary is required',
    ]);

    $new_employee = [
      'name' => $request->input('txtEmpName'),
      'father_name' => $request->input('txtEmpFather'),
      'mother_name' => $request->input('txtEmpMother'),
      'dob' => $request->input('txtDob'),
      'gender_id' => $request->input('cmbGender'),
      'contact_1' => $request->input('txtContact1'),
      'contact_2' => $request->input('txtContact2'),
      'present_addrs' => $request->input('txtareaPrsntAddrs'),
      'permanent_addrs' => $request->input('txtareaPrmntAddrs'),
      'email' => $request->input('txtMail'),
      'password' => $request->input('txtPass'),
      'emp_id' => $request->input('txtEmpId'),
      'dept_id' => $request->input('cmbDept'),
      'desig_id' => $request->input('cmbDesig'),
      'joining_date' => $request->input('txtJoiningDate'),
      'salary' => $request->input('txtSalary'),
      'bank_acc_name' => $request->input('txtAccName'),
      'bank_acc_no' => $request->input('txtAccNo'),
      'bank_name' => $request->input('txtBankName'),
      'bank_branch' => $request->input('txtBankBranch')
    ];

    DB::table('lhrm_employees')->insert($new_employee);

    return redirect()->route('employees.index');
  }

  public function edit($employee_id) {
    return "edit";
  }

  public function destroy() {
    return "destroy";
  }

  public function change_designations(Request $request) {
    if( $request->input('dept_id') ) {
      $dept_id = $request->input('dept_id');
      $designations = DB::table('lhrm_designations')
      ->where('dept_id', $dept_id)
      ->get();
      return $designations;
    } else {
      echo "not found";
    }
  }
}
