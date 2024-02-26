<?php

namespace App\Models;

use CodeIgniter\Model;

class NumberModel extends Model
{
    protected $table = 'student_number'; 
    protected $allowedFields = ['id', 'student_number'];

    public function __construct()
    {
        parent::__construct();
    }

    public function store($data)
    {
        return $this->insert($data);
    }
}