<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CourseModel;
use App\Models\GroupMajorModel;
use App\Models\DegreeModel;


class Course extends ResourceController
{
    use ResponseTrait;
    //+createCourse(courseData) : Course
    //+updateCourse(courseName): boolean
    //+editCouse(editAttr,editdata) :boolean
    //+addGroupMajor(groupMajor) : boolean
    //+getGroupMajor() :string
    //+addDegree(degree) : boolean
    //+getDegree():string



    public function index()
    {
        $couse = new CourseModel();
        $major = new GroupMajorModel();
        $degree = new DegreeModel();

        //$major->join('group_major' , 'group_major.id_major = couse.id_major' , 'left');
        //$degree->join('degree' , 'degree.id_degree = couse.id_degree' , 'left');
        //$data['course'] = $couse->join('group_major' , 'group_major.id_major = couse.id_major' , 'left')->findAll();
        $data['course'] = $couse->orderBy('id_course','DESC')->findAll();
        return $this->respond($data);

    }

    public function createCourse(){

        $couse = new CourseModel();
        $data =[
            "id_course"=> $this->request->getvar('id_course'),
            "name_course"=> $this->request->getvar('name_course'),
            "id_major"=> $this->request->getvar('id_major'),
            "id_degree"=> $this->request->getvar('id_degree')

        ];
        $couse->insert($data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'Course create successfully'
            ]
        ];
            return $this->respond($response);
    } 

    public function updateCourse($id = null)
    {
        
        $couse = new CourseModel();
        $data =[
            "name_course"=> $this->request->getvar('name_course'),
            "id_major"=> $this->request->getvar('id_major'),
            "id_degree"=> $this->request->getvar('id_degree')
        ];

        $couse->update($id, $data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'Course create successfully'
            ]
        ];
            return $this->respond($response);
    } 
   

    
}
?>