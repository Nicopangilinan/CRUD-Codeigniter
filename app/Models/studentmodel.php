<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = ['first_name','last_name', 'address'];

    public function __construct(){
        parent::__construct(); // Call the parent constructor
    }

    

    public function insert_data($data) {
        // Attempt to insert data into the 'students' table
        if ($this->db->table($this->table)->insert($data)) {
            // If insertion is successful, return the ID of the inserted row
            return $this->db->insertID();
        } else {
            // If insertion fails, return false
            return false;
        }
    }

    public function getGradesById($id) {

        $query = $this->db->table('grades');


        $query->where('id', $id);


        $results = $query->get()->getResult();


        return $results;
    }


    }
    
    
?>
