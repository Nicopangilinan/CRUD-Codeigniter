<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StudentModel;

class Student extends Controller
{   

    public function index()
    {
        $model = new StudentModel();

        $data['students_detail'] = $model->orderBy('student_id', 'DESC')->findAll();

        return view('list', $data);
    }

    public function getStudentGrades()
    {
        $student_id = $this->request->getPost('student_id');
        $model = new StudentModel();
        $grades = $model->getStudentGrades($student_id);
        echo json_encode($grades);
    }

    public function store()
    {
        helper(['form', 'url']);

        $model = new StudentModel();

        $data = [
            'first_name' => $this->request->getVar('txtFirstName'),
            'last_name' => $this->request->getVar('txtLastName'),
            'address' => $this->request->getVar('txtAddress'),
        ];
        $save = $model->insert_data($data);
        if($save != false)
        {
            $data = $model->where('student_id',$save) -> first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data => $data'));
        }
    }

    public function edit($id = null)
    {
        
     $model = new StudentModel();
      
     $data = $model->where('student_id', $id)->first();
       
    if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {  
   
        helper(['form', 'url']);
           
        $model = new StudentModel();
  
        $id = $this->request->getVar('hdnStudentId');
  
         $data = [
            'first_name' => $this->request->getVar('txtFirstName'),
            'last_name'  => $this->request->getVar('txtLastName'),
            'address'  => $this->request->getVar('txtAddress'),
            ];
  
        $update = $model->update($id,$data);
        if($update != false)
        {
            $data = $model->where('student_id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }

    public function delete ($id = null) {
         $model = new StudentModel();
         $delete = $model->where('student_id', $id)->delete();
         if ($delete)
         {
            echo json_encode(array("status" => true));
         }else{
            echo json_encode(array("status" => false));
         }
    }

}
