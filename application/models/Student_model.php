<?php
class Student_model extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert("student_register", $data);
        //  return $this->db->insert_id();
        return true;
    }

    public function getAllBranch()
    {
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function insert_Branchdata($Bdata)
    {
        $this->db->insert("branch", $Bdata);
        //  return $this->db->insert_id();
        return true;
    }

    public function getAllDepartment()
    {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_Departmentdata($Ddata)
    {
        $this->db->insert("department", $Ddata);
        //  return $this->db->insert_id();
        return true;
    }

    public function getList()
    {
        $this->db->select('student_register.id,student_register.name,student_register.email,student_register.city,student_register.country,student_register.state,student_register.pincode,student_register.phone,student_register.dob,branch.branch_name,department.department_name');
        $this->db->from('student_register');
        $this->db->join('branch', 'student_register.branch = branch.id', 'left');
        $this->db->join('department', 'student_register.department = department.id', 'left');

        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function getbranchdata()
    {
        $this->db->select('*');
        $this->db->from('branch');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getdepartmentdata()
    {
        $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function displayrecordsById($id)
    {
        $query = $this->db->query("select * from student_register where id='.$id.'");
        return $query->result();
    }

    // Update Query For Selected Student
    function update_records($where, $data)
    {
        $this->db->where('id', $where['id']);
        $this->db->update('student_register', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getRecordsById($where)
    {
        $this->db->select('*');
        $this->db->from('student_register');
        $this->db->where('id', $where['id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




    public function deleterecords($id)
    {
        $this->db->where("id", $id);

        //$this->db->from('student_register');
        $this->db->delete("student_register");
        //print_r($this->db->last_query());  

    }

    function checkId($id)
    {
        $this->db->select('id');
        $this->db->from('student_register');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function dltdata($id)
    {
        //print_r($id);die;
        $this->db->where("id", $id);
        $this->db->delete("student_register");
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function record_count() {
        return $this->db->count_all("student_register");
    }
    public function fetch_departments($dataArray) {
        $this->db->limit($dataArray['per_page'], $dataArray['page']);
        if($dataArray['keyword'] !=''){
            $this->db->like('name',$dataArray['keyword'] );
        }
       
        $query = $this->db->get("student_register");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else{
            return false;
        }
        
    }

public function data_count(){
  return $this->db->count_all("student_register");
}
public function fetch_data($dataArray){
    // $this->db->limit($dataArray['per_page'], $dataArray['page']);
    // $this->db->like('name',$dataArray['keyword'] );
    // $query = $this->db->get("student_register");
    $this->db->select('student_register.id,student_register.name,student_register.email,student_register.city,student_register.country,student_register.state,student_register.pincode,student_register.phone,student_register.dob,branch.branch_name,department.department_name');
    $this->db->from('student_register');
    $this->db->join('branch', 'student_register.branch = branch.id', 'left');
    $this->db->join('department', 'student_register.department = department.id', 'left');
    if(!empty($dataArray['per_page']) && !empty($dataArray['page']))
    {
        $this->db->limit($dataArray['per_page'], $dataArray['page']);
    }
    if(!empty($dataArray['keyword']))
    {
        $this->db->like('name',$dataArray['keyword']);
    }
    $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else{
            return false;
        }
}


}
