<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StudentModel;
use App\Models\GradeModel;

class Student extends Controller
{

    public function index()
    {
        $model = new StudentModel();

        $students = $model->select('students.*, student_number.student_number')
        ->join('student_number', 'student_number.id = students.id')
        ->orderBy('students.id', 'DESC')
        ->findAll();

        $data['students_detail'] = $students;

        return view('list', $data);    
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

    if ($save != false) {
        $data = $model->where('id', $save)->first();
        echo json_encode(array("status" => true, 'data' => $data));
    } else {
        echo json_encode(array("status" => false, 'data' => $data));
    }
}


    public function edit($id = null)
    {
        
     $model = new StudentModel();
      
     $data = $model->where('id', $id)->first();
       
    if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    public function view($id = null)
    {
        
     $model = new StudentModel();
      
     $data = $model->where('id', $id)->first();
       
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
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }

    public function delete ($id = null) {
         $model = new StudentModel();
         $delete = $model->where('id', $id)->delete();
         if ($delete)
         {
            echo json_encode(array("status" => true));
         }else{
            echo json_encode(array("status" => false));
         }
    }

        //GRADES FUNC//

    public function viewGrades($id = null)
    {
        $gradeModel = new GradeModel();
        // Assuming you want to fetch grades for a specific student
        $grades = $gradeModel->where('id', $id)->findAll(); // Assuming student_id is the foreign key in the grades table

        if ($grades) {
            echo json_encode(array("status" => true, 'data' => $grades));
        } else {
            echo json_encode(array("status" => false));
        }
    }

        public function storeGrades()
    {
        helper(['form', 'url']);

        $gradeModel = new GradeModel();

        // Retrieve form data
        $data = [
            'subject' => $this->request->getVar('txtSubject'),
            'grade' => $this->request->getVar('txtGrade'),
            // Get the student ID from the POST data
            'id' => $this->request->getVar('student_id'),
        ];

        // Insert data into the database
        $save = $gradeModel->insert($data);

        if ($save) {
            // Retrieve the inserted grade data
            $gradeData = $gradeModel->find($save);

            // Return a JSON response with the inserted grade data
            echo json_encode(array("status" => true, 'data' => $gradeData));
        } else {
            // Return a JSON response indicating failure
            echo json_encode(array("status" => false));
        }
    }

    public function deleteGrades ($id = null) {
        $model = new GradeModel();
        $delete = $model->where('grade_id', $id)->delete();
        if ($delete)
        {
           echo json_encode(array("status" => true));
        }else{
           echo json_encode(array("status" => false));
        }
   }

   public function updateGrades()
   {  
       helper(['form', 'url']);
          
       $model = new GradeModel();
   
       $id = $this->request->getVar('grade_id');
   
       $data = [
           'subject' => $this->request->getVar('txtSubject'),
           'grade'  => $this->request->getVar('txtGrade'),
       ];
   
       $update = $model->where('grade_id', $id)->update($data);
       if ($update) {
           $data = $model->find($id); // Use find() instead of where()->first()
           echo json_encode(array("status" => true , 'data' => $data));
       } else {
           echo json_encode(array("status" => false , 'data' => $data));
           echo json_encode($update);
       }
   }
   




    }