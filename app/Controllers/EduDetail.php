<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EduDetailModel;
use ResourceBundle;

class EduDetail extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new EduDetailModel();
        $educationDetaildata['eduDetail'] = $model->orderBy('id_edu_Detail', 'DESC')->findAll();
        return $this->respond($educationDetaildata);
    }

    public function getEduDetail()
    {
        $model = new EduDetailModel();
        $educationDetaildata = $model->join('course','course.id_course = education_detail.id_course')
        ->join('faculty','faculty.id_faculty = education_detail.id_faculty')
        ->select('course.name_course')
        ->select('faculty.name_faculty')
        ->select('education_detail.*')
        ->orderBy('education_detail.id_edu_detail ')->findAll();
        return $this->respond($educationDetaildata);
    }
    public function getEduDetailById($id = null)
    {
        $model = new EduDetailModel();
        $educationDetaildata = $model->join('course','course.id_course = education_detail.id_course')
        ->join('faculty','faculty.id_faculty = education_detail.id_faculty')
        ->select('course.name_course')
        ->select('faculty.name_faculty')
        ->select('education_detail.*')
        ->orderBy('education_detail.id_edu_detail ')->findAll();
        if($educationDetaildata){
            return $this->respond($educationDetaildata);
        }else{
            return $this->failNotFound('Not Found');
        }
       
    }
    public function getEduDetailByIdeducation($id = null)
    {
        $model = new EduDetailModel();
        $educationDetaildata = $model->join('course','course.id_course = education_detail.id_course')
        ->join('faculty','faculty.id_faculty = education_detail.id_faculty')
        ->select('course.name_course')
        ->select('faculty.name_faculty')
        ->select('education_detail.*')
        ->orderBy('education_detail.id_edu_detail')
        ->where('id_education',$id)->findAll();
        if($educationDetaildata){
            return $this->respond($educationDetaildata);
        }else{
            return $this->failNotFound('Not Found');
        }
       
    }

    public function createEduDetail()
    {

        $model = new EduDetailModel();
        $educationDetaildata = [
            "number_of_edu" => $this->request->getVar('number_of_edu'),
            "GPA"=> $this->request->getVar('GPA'),
            "curriculum_edu"=> $this->request->getVar('curriculum_edu'),
            "note_condi"=> $this->request->getVar('note_condi'),
            "id_course" => $this->request->getVar('id_course'),
            "id_faculty" => $this->request->getVar('id_faculty'),
            "id_education" => $this->request->getVar('id_education')
        ];
        $model->insert($educationDetaildata);
        $response = [
            'satatus' => 201,
            'error' => null,
            'meessage' => [
                'success' => 'เพิ่มรายละเอียดการศึกษาต่อสำเร็จ'
            ], 'data' => $educationDetaildata
        ];
        return $this->respond($response);
    }

    public function updateEduDetail($id = null)
    {
        $model = new EduDetailModel();
        $educationDetaildata = [
            "number_of_edu" => $this->request->getVar('number_of_edu'),
            "GPA"=> $this->request->getVar('GPA'),
            "curriculum_edu"=> $this->request->getVar('curriculum_edu'),
            "note_condi"=> $this->request->getVar('note_condi'),
            "id_course" => $this->request->getVar('id_course'),
            "id_faculty" => $this->request->getVar('id_faculty'),
            "id_education" => $this->request->getVar('id_education')
        
        ];

        $model->update($id, $educationDetaildata);
        $response = [
            'satatus' => 201,
            'error' => null,
            'message' => [
                'success' => 'EducationDetail create successfully'
            ]
        ];
        return $this->respond($response);
    }
}
