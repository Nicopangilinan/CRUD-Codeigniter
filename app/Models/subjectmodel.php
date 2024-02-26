<?php
namespace App\Models;

use CodeIgniter\Model;

class subjectmodel extends Model
{
    protected $table = 'subjects'; 
    protected $primaryKey ="subject_id";
    protected $allowedFields = [
        'subject_name',
    ];

    public function __construct(){
        parent::__construct(); 
    }



    public function insert_data($data) {

        if ($this->db->table($this->table)->insert($data)) {

            return $this->db->insertID();
        } else {
            // If insertion fails, return false
            return false;
        }
    }
}
    
?>
