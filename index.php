<?php

	require_once("./connection/connection.php");
	$queryDataRootKaryawan = mysql_query("SELECT * From karyawan WHERE karyawan_id = 1");

	if (mysql_num_rows($queryDataRootKaryawan) >= 1) {
		$number=0;
	    while ($dataKaryawan = mysql_fetch_array($queryDataRootKaryawan)) {
	       	$number=$number+1;

	       	$idRoot 	= $dataKaryawan['karyawan_id'];
	       	$nama 		= $dataKaryawan['karyawan_name'];
			$relation 	= $dataKaryawan['manager_id'];
			
			if ($relation == 0) {
				$queryDataChildKaryawan = mysql_query("SELECT * From karyawan WHERE manager_id= '$idRoot'");
				$numberChild = 0;
				if (mysql_num_rows($queryDataChildKaryawan) >= 1) {

					$boxReturn = '<br><div class="manager">'.$nama.'</div>';
					echo $boxReturn;
					
				    while ($dataChildKeluarga = mysql_fetch_array($queryDataChildKaryawan)) {
				       	$numberChild=$numberChild+1;

				       	$idChild = $dataChildKeluarga['karyawan_id'];
				       	$namaChild = $dataChildKeluarga['karyawan_name'];
						$relationChild = $dataChildKeluarga['manager_id'];
							echo '<div class="inline">';
							if ($relationChild  == $idRoot) {			

								$queryDataChildChildKaryawan = mysql_query("SELECT * From karyawan WHERE manager_id = '$idChild'");

									$numberChildChild = 0;
								if (mysql_num_rows($queryDataChildChildKaryawan) >= 1) {
									$boxReturn = '<br><div class="submanager">'.$namaChild.'</div>';
									echo $boxReturn;

									echo '<div class="inlineChild">';
								    while ($dataChildChildKaryawan = mysql_fetch_array($queryDataChildChildKaryawan)) {
								       	$numberChildChild=$numberChildChild+1;

								       	$idChildChild 	= $dataChildChildKaryawan['karyawan_id'];
								       	$namaChildChild = $dataChildChildKaryawan['karyawan_name'];
										$relChildChild 	= $dataChildChildKaryawan['manager_id'];
											
										if ($relChildChild  == $idChild) {
											$boxReturn = '<div class="karyawan">'.$namaChildChild.'</div>';
											echo $boxReturn;
										}
									}
									echo '</div>';
								}else{
									$boxReturn = '<br><div class="karyawan">'.$namaChild.'</div>';
									echo $boxReturn;
									
									// echo 'no data';
								}
							}else {

							}
						echo '</div>';
					}
				}else{

					$boxReturn = '<br><div class="karyawan">'.$nama.'</div>';
					echo $boxReturn;
					echo 'no data';
				}

			}else {
				$boxReturn = '<div class="karyawan">'.$nama.'</div>';
				echo $boxReturn;
			}


			echo '</div>';
		}

	}else{
		echo 'no data';
	}

?>


<style type="text/css">
	.manager{
		border: solid 2px #2365b7;
		background: #1f83ff;
		padding: 15px 10px;
		text-align: center;
	}
	
	.submanager{
		border: solid 2px #a83c3c;
		background: #dd3838;
		padding: 15px 10px;
		text-align: center;
	}

	.karyawan{
		border: solid 2px #48a83c;
    	background: #42dd38;
		padding: 15px 10px;
		text-align: center;
	}

	.inline{
		display: inline-grid;
	}

	.inlineChild{
		display: inline-flex;
		padding: 10px 0px;
		width: 40%;
	}

	.inline div.inlineChild {

	    display: inline-flex;
	    
	}
	.inlineRoot{
		display: inline-flex;
	}
</style>

