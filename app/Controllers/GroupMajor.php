<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\GroupMajorModel;

class GroupMajor extends ResourceController
{
    use ResponseTrait;

//+createGroupMajor(groupmajor_id, groupmajor_name):GroupMajor
//+updateGroup(updateAttr,updatedata): boolean


    public function index()
    {
        $model = new GroupMajorModel();
        $data['group_major'] = $model->orderBy('id_major','DESC')->findAll();
        return $this->respond($data);
    }

    public function createGroupMajor(){

//-groupmajor_id : int
//-groupmajor_name :string


        $model = new GroupMajorModel();
        $data =[
            "id_major"=> $this->request->getvar('id_major'),
            "name_major"=> $this->request->getvar('name_major')
        ];
        $model->insert($data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'Group Major create successfully'
            ]
        ];
            return $this->respond($response);
    } 

    public function updateGroupMajor($id = null)
    {
        
        $model = new GroupMajorModel();
        $data =[
            "name_major"=> $this->request->getvar('name_major')
        ];

        $model->update($id, $data);
        $response=[
            'satatus'=>201,
            'error'=>null,
            'meessage'=>[
                'success' => 'Group Major create successfully'
            ]
        ];
            return $this->respond($response);
    } 
   

    
}
?>