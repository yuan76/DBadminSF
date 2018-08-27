<?php
require_once 'koneksi.php';
require_once 'lib/dateformat.php';
require_once 'lib/debug.php';

if(isset($_GET['aksi']) && $_GET['aksi']=='combogrid'){
		$page       = $_GET['page'];
		$limit      = $_GET['rows'];
		$sidx       = $_GET['sidx'];
		$sord       = $_GET['sord'];
		$searchTerm = $_GET['searchTerm'];

		$ss='	SELECT *
					FROM pengguna
					WHERE
						username LIKE "%'.$searchTerm.'%" OR
						nama_dpn LIKE "%'.$searchTerm.'%" OR
						nama_dpn LIKE "%'.$searchTerm.'%" OR
						nama_fb LIKE "%'.$searchTerm.'%"
						';

		if(!$sidx) $sidx =1;

		$result = mysqli_query($conn,$ss);
		$row    = mysqli_fetch_array($result,MYSQL_ASSOC);
		$count  = mysqli_num_rows($result);

		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}

		if ($page > $total_pages) $page=$total_pages;
		$start 	= $limit*$page - $limit; // do not put $limit*($page - 1)
		if($total_pages!=0) {
			$ss.='ORDER BY '.$sidx.' '.$sord.' LIMIT '.$start.','.$limit;
		}else {
			$ss.='ORDER BY '.$sidx.' '.$sord;
		}

		// print_r($ss);exit();
		$result = mysqli_query($conn,$ss) or die("Couldn t execute query.".mysqli_error());
		$rows 	= array();

		while($row = mysqli_fetch_assoc($result)) {
			$arr= [
				'id'=>$row['id'],
				'fullname'=>$row['nama_dpn'].' '.$row['nama_blk'],
				'nama_dpn'=>$row['nama_dpn'],
				'nama_blk'=>$row['nama_blk'],
				'nama_fb'=>$row['nama_fb'],
				'username'=>$row['username'],
				'tgl_exp'=>$row['tgl_exp'],
				'tgl_exp_id'=>tgl_indo($row['tgl_exp']),
				'tgl_join'=>tgl_indo($row['tgl_join']),
				'tgl_lunas'=>tgl_indo($row['tgl_lunas']),
				'no_wa'=>$row['no_wa'],
				'gender'=>$row['gender'],
				'email'=>$row['email'],
				'nominal'=>'Rp. '.number_format($row['nominal']),
				'paytren_id'=>$row['paytren_id'],
				'jaguar'=>$row['jaguar'],
				'referal'=>$row['referal'],
				'web_training'=>$row['web_training'],
				'marketing'=>$row['marketing'],
				'dna_id'=>$row['dna_id'],
				'dna_seq'=>$row['dna_seq'],
				'dna_level'=>$row['dna_level'],
				'mlm_type'=>$row['mlm_type'],
			];
			$rows[]=$arr;
		}

		$response=array(
			'page'    =>$page,
			'total'   =>$total_pages,
			'records' =>$count,
			'rows'    =>$rows,
		);
		$out=json_encode($response);
}elseif(isset($_POST)){
	$sql='UPDATE pengguna SET
				no_wa   	="'.$_POST['no_waTB'].'",
				nama_fb  	="'.$_POST['nama_fbTB'].'"
				'.(isset($_POST['tgl_exp_newCB'])?',tgl_exp 	="'.$_POST['tgl_exp_newTB'].'"':'').'
			WHERE id='.$_POST['id_penggunaH'];
	$exe = mysqli_query($conn,$sql);
	$out=json_encode(['status'=>(!$exe?false:true)]);
}else{
	$out=json_encode(array('status'=>'invalid_request'));
}
echo $out;
?>
