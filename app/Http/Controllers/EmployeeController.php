<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Employee;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;


class EmployeeController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function addForm()
    {
        return view('employee-add');
    }
 
    public function import(EmployeeRequest $request){
           
       // Excel::import(new EmployeesImport, request()->file('file'));
        
       //  return redirect('employee')->with('success', 'File got imported successfully');

         try{

           Excel::import(new EmployeesImport, request()->file('file'));
        
        return redirect('employee')->with('success', 'File got imported successfully');

           

        }catch(\Exception $e) {

            return redirect()->back()->with('error','This error ocurred.'.$e->getMessage());

        }
 
    }

     public function index($sort=''){

       try{

            //$employees = Employee::all();
       	    if($sort == 'DESC'){
               $employees = Employee::orderBy('dob', 'DESC')->get();
            }else{
               $employees = Employee::orderBy('dob', 'ASC')->get();
            }


            return view('list.index')->with('employees',$employees)->with('sort',$sort);

       }catch(\Exception $e) {

            return redirect()->back()->with('error','This error ocurred.'.$e->getMessage());

      }
    	

    }


    public function edit($id){

        try{

            $employee = Employee::find($id);

            return view('list.edit')->with('employee',$employee);

        }catch(\Exception $e) {

            return redirect()->back()->with('error','This error ocurred.'.$e->getMessage());

      }
     	
    }


      // function for updating existing companies
    public function update(EmployeeUpdateRequest $request){
          
        try{
                $id = $request->id;

                $employee = Employee::find($id);   
              
                $employee->update($request->toArray());
                
                
                return redirect('/list')->with('success','Employee edited successfully.');

        }catch(\Exception $e) {

            return redirect()->back()->with('error','This error ocurred.'.$e->getMessage());

      }
        


    }

    //function for deleting the service

    public function destroy($id){
		 
         try{
                   $employee = Employee::find($id);
                   $employee->delete();
                   
                   return redirect('/list')->with('success','Employee deleted successfully.');

         }catch(\Exception $e) {

            return redirect()->back()->with('error','This error ocurred.'.$e->getMessage());

      }

	}

}
