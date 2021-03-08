<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table = 'education';
    protected $primarykey = 'id_education';
    protected $allowedFields = [ 'year_edu', 'id_round', 'id_university', 'tcas', 'open_ date', 'close_ date', 'list_day', 'general', 'doculment_edu', 'note_edu', 'file_doculment', 'url_doculment', 'id_schedule'];
    
  
}
