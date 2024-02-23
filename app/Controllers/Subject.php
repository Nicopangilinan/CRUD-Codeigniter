<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Controller;
use App\Models\StudentModel;
use App\Models\GradeModel;

class Subject extends BaseController
{
    public function index()
    {
        return view('subject_view');
    }
}
