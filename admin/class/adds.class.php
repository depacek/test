<?php
require_once "common.class.php";
	class Adds extends Common{
		public $id,$title,$image,$link,$rank,$status,$created_date,$updated_date,$created_by,$updated_by;
		function create(){
			// print_r($this);
			 $sql="insert into tbl_advertisement (title,link,rank,status,created_date,created_by,image) values ('$this->title','$this->link','$this->rank','$this->status','$this->created_date','$this->created_by','$this->image') ";
			 return $this->insert($sql);

		}
		public function list()
		{
			$sql="select * from tbl_advertisement";
			return $this->select($sql);
		}
		public function remove()
		{
			$sql="delete from tbl_advertisement where id='$this->id'";
			return $this->delete($sql);
		}

		public function getAddsByID()
		{
			$sql="select * from tbl_advertisement where id='$this->id'";
			return $this->select($sql);
			
		}
		public function edit()
		{
			$sql="update tbl_advertisement set title='$this->title',link='$this->link',rank='$this->rank',status='$this->status',updated_date='$this->updated_date',updated_by='$this->updated_by',image='$this->image' where id='$this->id' ";
			 return $this->update($sql);
		}
	}
?>