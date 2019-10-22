<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session;

use DB;

class DepartmentsController extends Controller
{
  public function index() {
    // session()->forget('desig_arr');
    // session()->forget('dept_name');

    $data['depts'] = DB::table('lhrm_departments')->get();
    $data['designations'] = DB::table('lhrm_designations')->get();
    return view('admins.departments.all')->with($data);
  }

  public function create() {
    // session()->forget('dept_name');
    // session()->forget('desig_arr');
    return view('admins.departments.create');
  }

  public function edit($dept_id) {
    session()->forget('desig_arr');
    session()->forget('dept_name');
    $dept = DB::table('lhrm_departments')
    ->where('id', '=', $dept_id)
    ->get();

    $designations = DB::table('lhrm_designations')
    ->where('dept_id', '=', $dept_id)
    ->get();

    foreach ($dept as $d) {
      $dept_name = $d->name;
      $dept_id = $d->id;
      $this->add_dept_to_session($dept_name, $dept_id);
    }

    foreach ($designations as $desig) {
      $this->add_desig_to_session($desig->name);
    }
    return view('admins.departments.edit');
  }

  public function update(Request $request) {
    $dept_id = $request->input('hdnDeptId');

    $request->validate([
      'txtDept' => 'required|min:2|max:50',
    ],
    [
      'txtDept.required' => 'Department name is required',
      'txtDept.min' => 'Department name should be minimum 2 character',
      'txtDept.max' => 'Department name cannot be that long',
    ]
  );

  $dept_name = $request->input('txtDept');
  $desig_name = $request->input('txtDesig');

  if( isset($_POST['btnAddDesignation']) ) {
    $this->add_dept_to_session($dept_name);
    $this->add_desig_to_session($desig_name);
    // print_r(session('desig_arr'));
    // die();
    return redirect('admin/departments/editing');
  }

  if( isset($_POST['btnDptUpdate']) ) {
    $affected = DB::table('lhrm_departments')
    ->where('id', $dept_id)
    ->update(['name' => $dept_name]);

    // print_r($affected);
    // die();

    if( session('desig_arr') ) {
      // first delete all the previous designations
      DB::table('lhrm_designations')
      ->where('dept_id', $dept_id)
      ->delete();

      // then add all the designations from current session array
      foreach( session('desig_arr') as $desig ) {
        DB::table('lhrm_designations')
        ->insert(
          ['name' => $desig, 'dept_id' => $dept_id]
        );
      }
    }

    session()->forget('desig_arr');
    session()->forget('dept_name');

    return redirect()->route('departments.index');
  }
}

public function store(Request $request) {
  $request->validate([
    'txtDept' => 'required|min:2|max:50',
  ],
  [
    'txtDept.required' => 'Department name is required',
    'txtDept.min' => 'Department name should be minimum 2 character',
    'txtDept.max' => 'Department name cannot be that long',
  ]
);

$dept_name = $request->input('txtDept');
$desig_name = $request->input('txtDesig');

if( isset($_POST['btnAddDesignation']) ) {
  $this->add_desig_to_session($desig_name);
  $this->add_dept_to_session($dept_name);

  return redirect()->route('departments.create');
}

if( isset($_POST['btnDptSave']) ) {
  $dept_id = DB::table('lhrm_departments')
  ->insertGetId(
    ['name' => $dept_name]
  );

  if( session('desig_arr') ) {
    foreach( session('desig_arr') as $desig ) {
      DB::table('lhrm_designations')
      ->insert(
        ['name' => $desig, 'dept_id' => $dept_id]
      );
    }
  }

  $request->session()->forget('desig_arr');
  $request->session()->forget('dept_name');

  return redirect()->route('departments.index');
}
}

public function destroy(Request $request) {
  $dept_id = $request->input('hdnDeptId');
  DB::table('lhrm_departments')
  ->where('id', '=', $dept_id)
  ->delete();

  $data['depts'] = DB::table('lhrm_departments')->get();
  $data['designations'] = DB::table('lhrm_designations')->get();

  return redirect()->route('departments.index')->with($data);
}

private function add_dept_to_session($dept_name, $dept_id = null) {
  session()->put('dept_name', $dept_name);
  if($dept_id != null) {
    session()->put('dept_id', $dept_id);
  }
}

private function add_desig_to_session($desig_name) {
  $desig_arr = array();
  if( session('desig_arr') ) {
    $desig_arr = session()->get('desig_arr');
  }
  array_push($desig_arr, $desig_name);

  session()->put('desig_arr', $desig_arr);
}

public function editing_data(Request $request) {
  return view('admins.departments.edit');
}

}
