<?php
	class abc{ 
		function abc(){
			$this->str="";
		}
		function tree($pid,$flag,$db,$table){
			$flag=$flag+1;
			$sql="select * from $table where pid=".$pid;
			$result=$db->query($sql);
			while($row=$result->fetch_assoc()){
				$cid=$row["cid"];
				$cname=$row["cname"];
				$str=str_repeat("-",$flag);
				$this->str.="<option value='$cid'>{$str}{$cname}</option>";
				$this->tree($cid,$flag,$db,$table);

			}
			return $this->str;
		}


		 function table($pid,$flag,$db,$table){
		 	$flag=$flag+1;
		 	$sql="select * from $table where pid=".$pid;
		 	$result=$db->query($sql);
    	 	while($row=$result->fetch_assoc()){
		 		$cid=$row["cid"];
		 		$cname=$row["cname"];
		 		$pid=$row["pid"];
		 		$str=str_repeat("-",$flag);
		 		$this->str.="<tr>
		 			<td>$cid</td>
		 			<td>$cname</td>
		 			<td>$pid</td>
		 			<td>
		 				<a href='delcategory.php?id={$cid}'>删除</a>
		 				<a href='editcategory.php?id={$cid}'>编辑</a>
		 			</td>
		 		</tr>";
		 		$this->table($cid,$flag,$db,$table);
		 	};
		 	return $this->str;
		 }
		 
		 
		 
		function  del($id,$db,$table){
            $sql="select * from $table where pid=".$id;
            $result=$db->query($sql);
            if($result->fetch_assoc()){
                $masseige="包含子类，不能删除，请先删除子类";
                $url="manage.php";
                include "mess.html";
            }else{
                $sql="delete from $table where cid=".$id;
                $db->query($sql);
                if($db->affected_rows>0){
                    $masseige="删除分类成功";
                    $url="manage.php";
                    include "mess.html";
                }
            }
     	}
     	
     	
     	function tatle($db,$table){
		 	$sql="select * from $table";
		 	$result=$db->query($sql);
    	 	while($row=$result->fetch_assoc()){
		 		$sid=$row["sid"];
		 		$stitle=$row["stitle"];
		 		$scon=$row["scon"];
		 		$cid=$row["cid"];
		 		$stime=$row["stime"];
				$susername=$row["susername"];
		 		$this->str.="<tr>
		 			<td>$sid</td>
		 			<td>$stitle</td>
		 			<td>$scon</td>
		 			<td>$cid</td>
		 			<td>$stime</td>
		 			<td>$susername</td>
		 			<td>
		 				<a href='delshows.php?id={$sid}'>删除</a>
		 				<a href='editshows.php?id={$sid}'>编辑</a>
		 			</td>
		 		</tr>";
//		 		$this->tatle($db,$table);
		 	}
//		 	return $this->str;
     	}
     	
     	
     	function delshows($id,$db,$table){
            $sql="delete from $table where sid=".$id; 
            $db->query($sql);
            if($db->affected_rows>0){
                $masseige="删除分类成功";
                $url="manageshows.php";
                include "mess.html";
            }
     	}
     	
     	function pus($db,$table){
     		$sql="select * from $table";
     		$result=$db->query($sql);
     		while($row=$result->fetch_assoc()){
     			$pid=$row["pid"];
     			$pname=$row["pname"];
     			$this->str.="<tr>
     				<td>$pid</td>
     				<td>$pname</td>
     				<td>
     					<a href='delpus.php?id={$pid}'>删除</a>
		 				<a href='editpus.php?id={$pid}'>编辑</a>
     				</td>
     			</tr>";
     		}
     	}
     	
     	
     	
     	function delpus($id,$db,$table){
            $sql="delete from $table where pid=".$id; 
            $db->query($sql);
            if($db->affected_rows>0){
                $masseige="删除分类成功";
                $url="managepus.php";
                include "mess.html";
            }
     	}
	}



?>