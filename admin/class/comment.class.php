<?php
require_once "common.class.php";
	class Comment extends Common{
		public $id,$news_id,$name,$email,$comment,$commented_date,$status;
		function create(){
			// print_r($this);
			 $sql="insert into tbl_comment (news_id,name,email,comment,commented_date,status) values ('$this->news_id','$this->name','$this->email','$this->comment','$this->commented_date','$this->status') ";
			 return $this->insert($sql);

		}
		public function list()
		{
			$sql="select * from tbl_comment";
			return $this->select($sql);
		}
		public function remove()
		{
			$sql="delete from tbl_comment where id='$this->id'";
			return $this->delete($sql);
		}
		public function edit()
		{
			$sql="update tbl_comment set status='$this->status' where id='$this->id'";
			 return $this->update($sql);
		}
		public function getCommentByNewsID()
		{
			$sql="select * from tbl_comment where news_id='$this->news_id' and status=1 order by commented_date desc";
			return $this->select($sql);
		}
		public function getComment()
		{
			$sql="select * from tbl_comment where status=1 order by commented_date desc";
			return $this->select($sql);
		}
	}
?>