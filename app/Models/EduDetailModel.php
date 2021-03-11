<?php

namespace App\Models;

use CodeIgniter\Model;

class EduDetailModel extends Model
{
    protected $table = 'education_detail';
    protected $primarykey = 'id_edu_detail';
    protected $allowedFields = ['number_of_edu','GPA','	curriculum_edu','note_condi','id_course','id_faculty','id_education'];
    
  
}
