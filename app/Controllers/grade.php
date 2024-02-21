<?php namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\GradeModel;

class Grade extends BaseController
{
    public function index(){
        $gradeModel = new GradeModel();
        $data['grades'] = $gradeModel->findAll();

        $studentModel = new StudentModel();
        $data['students_detail'] = $studentModel->findAll();

        return view('index', $data);
    }
}
