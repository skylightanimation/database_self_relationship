<?php

	require_once("./connection/connection.php");

	$root = 1;
	$queryDataRootkaryawan = mysql_query("SELECT * From karyawan WHERE karyawan_id = '$root'");

	$arrayAnak[] = array();
	
	 while ($datakaryawan = mysql_fetch_array($queryDataRootkaryawan)) {
			$id = $datakaryawan['karyawan_id'];
			$nama = $datakaryawan['karyawan_name'];
			//$relasi = $datakaryawan['manager_id'];

			// echo '<br>'.$id;
			// echo '<br>'.$nama;

			$querykaryawan = mysql_query("SELECT * From karyawan WHERE manager_id = '$id'")or die(mysql_error());


			$countKaryawan = mysql_num_rows($querykaryawan);



				if ($countKaryawan >= 1) {

					while ($datakaryawan = mysql_fetch_assoc($querykaryawan)) {
													
						$idKaryawan = $datakaryawan['karyawan_id'];
						$namaKaryawan = $datakaryawan['karyawan_name'];
						$idManager = $datakaryawan['manager_id'];

						// echo '<br>'.$idKaryawan;
						// echo '<br>'.$namaKaryawan;



						$queryAnak = mysql_query("SELECT * From karyawan WHERE manager_id = '$idKaryawan'");

						$counta = mysql_num_rows($queryAnak);

							if ($counta >= 1) {

								//echo $counta;

								while ($anak = mysql_fetch_assoc($queryAnak)) {
									$idKaryawan2 = $anak['karyawan_id'];
									$namaKaryawan2 = $anak['karyawan_name'];
									// $idManager2 = $anak['manager_id'];

									// echo '<br>'.$idKaryawan;
									// echo '<br>'.$namaKaryawan;

									$arrayKaryawan2[] = array(
										'nama' => $namaKaryawan2,
										'id' => $idKaryawan2
									);
									// echo '<br>';
									// echo json_encode($arrayKaryawan2);
								}

							}else{
								$arrayKaryawan2 =  [];

							}


							$arrayKaryawan1[] = array(
								'nama' => $namaKaryawan,
								'id' => $idKaryawan,
								'karyawan'=> $arrayKaryawan2
							);	
							$arrayKaryawan2 = [];
							// echo '<br>';
							// echo json_encode($arrayKaryawan1);
					}			
										
				}else{
					$arrayKaryawan1 = array(
						'nama' => $namaKaryawan,
						'id' => $idKaryawan,
						'karyawan'=> $arrayKaryawan2
					);
					$arrayKaryawan2 = [];
				}

			$arraykaryawan[] = array(
				'nama' => $nama,
				'id' => $id,
				'karyawan'=> $arrayKaryawan1
			);
	}

	echo json_encode($arraykaryawan);

?>

