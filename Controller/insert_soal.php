<?php 
	//include '../Controller/homeadmin.php';
	require_once '../core/sessionadmin.php';
	include 'configdb.php';
	//$soal = "SELECT * FROM t_soal";
	//$jawaban = "SELECT * FROM t_system_answer";
	//$ans = $conn->query($jawaban);
	$q = $conn->query("SELECT * FROM t_soal");

	if (isset($_POST['submit'])) 
	{
		$question = htmlspecialchars($_POST['soal'], ENT_QUOTES);
		$system_answer = htmlspecialchars($_POST['jawaban'], ENT_QUOTES);

		//$questionQuery = mysqli_query($conn, "INSERT INTO t_soal(no, soal, system_answer) VALUES (null, '$question', '$system_answer')");
		$questionQuery = $conn->query("INSERT INTO t_soal(no, soal, system_answer) VALUES (null, '$question', '$system_answer')");
		//$system_answerQuery = mysqli_query($conn, "INSERT INTO t_system_answer(no, system_answer) VALUES (null, '$system_answer')");

		if ($questionQuery)
		{
			echo '<script>alert("Berhasil memasukkan Soal dan Jawaban sukses!")</script>';
			header("Location: ../admin/manage_soal.php");
		} 
		else if($question or $system_answer) 
		{
			echo '<script>alert("memasukkan Soal dan Jawaban")</script>';
		}
		else
		{
			echo '<script>alert("memasukkan Soal dan Jawaban")</script>';
		}
	}

?>
