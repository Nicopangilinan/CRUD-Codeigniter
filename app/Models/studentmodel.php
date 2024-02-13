<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';

    protected $allowedFields = ['first_name','last_name', 'address'];

    public function __construct(){
        parent:: __construct();
        //$this->load->database::connect():
        $db = \Config\Database::connect();
        $builder = $db->table('students');
    }

    public function insert_data($data) {
        if($this->db->table($this->table)->insert($data))
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }

    // Example database query in StudentModel
    public function getStudentGrades($student_id) {
        $query = $this->db->where('student_id', $student_id)->get('grades');
        if ($query) {
            return $query->result();
        } else {
            // Handle error
            return false;
        }
    }
}
?>