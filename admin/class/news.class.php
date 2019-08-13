<?php
require_once "common.class.php";
	class News extends Common{
		public $id,$category_id,$title,$short_description,$description,$feature_image,$status,$breaking_key,$feature_key,$created_date,$updated_date,$created_by,$updated_by;
		function create(){
			// print_r($this);
			 $sql="insert into tbl_news (category_id,title,short_description,description,status,breaking_key,feature_key,created_date,created_by,feature_image) values ('$this->category_id','$this->title','$this->short_description','$this->description','$this->status','$this->breaking_key','$this->feature_key','$this->created_date','$this->created_by','$this->feature_image') ";
			 return $this->insert($sql);

		}
		public function list(){
			 $sql="select * from tbl_news";
			 return $this->select($sql);
		}

		public function remove(){
			$sql="delete from tbl_news where id='$this->id'";
			return $this->delete($sql);
		}
		public function getNewsByID(){
			$sql="select * from tbl_news where id='$this->id'";
			return $this->select($sql);
			
		}
		public function edit(){
			if (empty($this->feature_image)) {
				$sql="update tbl_news set category_id='$this->category_id',title='$this->title',short_description='$this->short_description',description='$this->description',status='$this->status',breaking_key='$this->breaking_key',feature_key='$this->feature_key',updated_date='$this->updated_date',updated_by='$this->updated_by' where id='$this->id' ";
			}else{
				$sql="update tbl_news set category_id='$this->category_id',title='$this->title',short_description='$this->short_description',description='$this->description',status='$this->status',breaking_key='$this->breaking_key',feature_key='$this->feature_key',updated_date='$this->updated_date',updated_by='$this->updated_by',feature_image='$this->feature_image' where id='$this->id' ";
			}
			
			 return $this->update($sql);
			}
		
		function getLatestNews(){
			$sql="select * from tbl_news where status=1 order by created_date desc";
			return $this->select($sql);
			
		}
		function getBreakingNews(){
			$sql="select * from tbl_news where status=1 and breaking_key=1 order by created_date desc limit 5";
			return $this->select($sql);
			
		}
		function getFeatureNews(){
			$sql="select * from tbl_news where status=1 and feature_key=1 order by created_date desc limit 10";
			return $this->select($sql);
		}
		function getLatestNewsByCategory(){
			$sql="select id,feature_image,title,short_description from tbl_news where status=1 and category_id='$this->category_id' order by created_date desc";
			return $this->select($sql);
		}
		function getNewsByCategory($offset){
			$sql="select id,feature_image,title,short_description,category_id from tbl_news where status=1 and category_id='$this->category_id' order by created_date desc limit 3 offset $offset";
			return $this->select($sql);
		}
		function getTotalNewsByCategory(){
			$sql="select id from tbl_news where status=1 and category_id='$this->category_id' ";
			return $this->select($sql);
		}
		
		function getNewsInId(){
			$sql="select n.*,c.name as cname,a.name as aname from tbl_news n join tbl_category c on n.category_id=c.id join tbl_admin a on n.created_by=a.username where n.status=1 and n.id='$this->id'";
			return $this->select($sql);
		}
	}
?>