<!DOCTYPE html>
<html>
<head>
	<title>Data | WIKI Botani</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		td{
			color: black;
		}
		th{
			color: white;
		}
	</style>
</head>
<body>
	<div class="header">
		<center>
			<h1><font face="forte" color="white">WIKI BOTANI</font></h1>
		</center>
		<center>
			<i><h3><font face="calibri" color="white" size="1">Apapun yang Ingin Anda Ketahui tentang Tumbuhan</font></h3></i>
		</center>
		<ul style="background: linear-gradient(to bottom, #2a2b2d 0%, #78866b 100%);">
			<li style="float: right;"><a href="pilihan.php">Data Input</a></li>
			<li style="float: right;"><a href="form.html">Input Data</a></li>
			<li style="float: right;"><a href="index.html">Home</a></li>
		</ul>
	</div>

	<div class="main">
		<div class="content">
			<h2>Data Input Form</h2>
			<center>
				<?php
					if(isset($_GET['submit'])){
						$namaTumbuhan = $_GET["nama"];
						$des = $_GET["deskripsi"];

						$myfile = fopen("data.txt", "a");
						fwrite($myfile,$namaTumbuhan."\r\n");
						if (isset($_GET['Klasifikasi'])){
							$klasifikasiTumbuhan = $_GET['Klasifikasi'];
							fwrite($myfile, $klasifikasiTumbuhan."\r\n");
						}
						if (!empty($_GET['yang_dicari'])) {
							foreach ($_GET['yang_dicari'] as $dapat){
								fwrite($myfile, $dapat."\r");
							}
							fwrite($myfile, "\n");
						}
						fwrite($myfile,$des."\r\r\n");
						fclose($myfile);
					}

					if(file_exists("data.txt")){
						$myfile = fopen("data.txt", "r");
						echo "<table border='2'>";
						echo "<tr><th>Nama Tumbuhan</th><th>Klasifikasi Tumbuhan</th><th>Yang Ingin Diketahui</th><th>Deskripsi Tumbuhan</th></tr>";
						while(!feof($myfile)){
						  	echo "<tr><td>".fgets($myfile)."</td><td>".fgets($myfile)."</td><td>".fgets($myfile)."</td><td>".fgets($myfile)."</td></tr>";
						}
						echo "</table>";
						fclose($myfile);
					}else{
						echo "'Belum Terdapat Data'";
					}	
				?>
				<br><br>
				<form action="form.html">
					<input id="tambah" type="submit" value="Tambah">
				</form>
			</center>
		</div>
	</div>

	<div class="footer">
		<center>
			<h3 style="color: white; font-family: forte">WIKI BOTANI</h3>
			<h5 style="color: white; font-family: calibri">dyahayurosi11@gmail.com</h5>		
		</center>
	</div>
</body>
</html>