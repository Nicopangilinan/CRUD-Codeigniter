<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Controller;

use App\Models\SubjectModel;

class Subject extends BaseController
{
    public function index()
    {
        $model = new subjectmodel();

        $data['subject_list'] = $model->orderBy('subject_id', 'DESC')->findAll();

        return view('subject_view', $data);
        
    }

}