<?php
namespace App\Models;

use CodeIgniter\Model;

class grademodel extends Model
{
    protected $table = 'grades'; // Assuming your table name is 'grades'
    protected $primaryKey ="grade_id";
    protected $allowedFields = [
        'id',
        'subject',
        'grade',
    ];

    public function __construct(){
        parent::__construct(); // Call the parent constructor
    }
}
?>