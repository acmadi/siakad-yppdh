<?php
switch($_GET[cmd]){
case "tk":
?>
<html>
<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_tk.php",
			minLength: 2			
			});
		$( "#tags2" ).autocomplete({
			source: "cari_siswa_tk.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script>
</head>
<body>
	<div id="demo">
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">0 Kecil</a></li>
			<li><a href="#tabs-2">0 Besar</a></li>		
		</ul>
		<div id="tabs-1">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="tk">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_tk WHERE smt='ganjil' AND tgk='Kecil'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_tk WHERE smt='genap' AND tgk='Kecil'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		<div id="tabs-2">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="tk">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags2"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_tk WHERE smt='ganjil' AND tgk='Besar'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_tk WHERE smt='genap' AND tgk='Besar'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>	
	</div>
	
	</div>
</body>
</html>
<?php
break;
/*========================================= input mi ===============================================*/
case "mi":
?>
<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=1;
		for(i=1;i<=6;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_siswa_mi.php",
			minLength: 2			
			});
			}
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs2">
		<ul>
		<?php
					$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mi' ORDER BY kelas");
					while($op=mysql_fetch_array($sql)){
					echo "<li><a href='#tabs-$op[kelas]'>Kelas $op[kelas]</a></li>";
					}
			?>
		</ul>
		<?php
			$nk=mysql_num_rows($sql);
			for($i=1;$i<=$nk;$i++){
				echo "<div id='tabs-$i'>
					<form method=POST action=./action.php?opt=nilai&cmd=input>
			<input type=hidden name=tingkat value=mi>
			<fieldset>
				<label>Tahun Ajaran</label>				<select name=tahun>";
				$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($r=mysql_fetch_array($agk)){
					echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
				}
				echo "</select><br>
				<label>NIS</label> <input type=text name=nis id=tags$i><br><br><br>
				<div style='float:left; clear:both;padding-right:150px;'>Semester Ganjil<br>";
				
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_mi WHERE smt='ganjil' AND kelas='$i'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				echo "</div>
				 <div>Semester Genap<br>";
				
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_mi WHERE smt='genap' AND kelas='$i'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				
				echo "</div><br><br>
				 <input type=hidden name=jumMP value=$no-1><input type=submit value=Simpan>			
			</fieldset></form>";
			
			echo "</div>";
			}
		?>
		</div>
		
		</div>
				
	</body>
</html>
<?php
break;
/*========================================= input mts ===============================================*/
case "mts":
?>
<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=7;
		for(i=7;i<=9;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_siswa_mts.php",
			minLength: 2			
			});
			}
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs2">
		<ul>
		<?php
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mts' ORDER BY kelas");
			while($op=mysql_fetch_array($sql)){
				echo "<li><a href='#tabs-$op[kelas]'>Kelas $op[kelas]</a></li>";
			}
		?>
		</ul>
		<?php
			$nk=mysql_num_rows($sql);
			for($i=7;$i<=$nk+6;$i++){
				echo "<div id='tabs-$i'>
					<form method=POST action=./action.php?opt=nilai&cmd=input>
			<input type=hidden name=tingkat value=mts>
			<fieldset>
				<label>Tahun Ajaran</label>				<select name=tahun>";
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				echo "</select><br>
				<label>NIS</label> <input type=text name=nis id=tags$i><br><br><br>
				<div style='float:left; clear:both;padding-right:150px;'>Semester Ganjil<br>";
				
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_mts WHERE smt='ganjil' AND kelas='$i'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				echo "</div>
				 <div>Semester Genap<br>";
				
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_mts WHERE smt='genap' AND kelas='$i'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				
				echo "</div><br><br>
				 <input type=hidden name=jumMP value=$no-1><input type=submit value=Simpan>			
			</fieldset></form>";
			
			echo "</div>";
			}
		?>
		</div>
		
		</div>
				
	</body>
</html>
<?php
break;
/*========================================= input ma ===============================================*/
case "ma":
?>
<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=1;
		for(i=1;i<=6;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_siswa_ma.php",
			minLength: 2			
			});
			}
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs2">
		<ul>
			<li><a href='#tabs-1'>Kelas 10</a></li>
			<li><a href='#tabs-2'>Kelas 11 IPA</a></li>
			<li><a href='#tabs-3'>Kelas 11 IPS</a></li>
			<li><a href='#tabs-4'>Kelas 12 IPA</a></li>
			<li><a href='#tabs-5'>Kelas 12 IPS</a></li>
		</ul>
		<div id="tabs-1">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags1"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='ganjil' AND kelas='10'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='genap' AND kelas='10'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		<div id="tabs-2">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags2"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='ganjil' AND kelas='11' AND jurusan='IPA'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='genap' AND kelas='11' AND jurusan='IPA'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		<div id="tabs-3">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags3"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='ganjil' AND kelas='11' AND jurusan='IPS'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='genap' AND kelas='11' AND jurusan='IPS'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		<div id="tabs-4">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags4"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='ganjil' AND kelas='12' AND jurusan='IPA'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='genap' AND kelas='12' AND jurusan='IPA'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		<div id="tabs-5">
			<form method="POST" action="./action.php?opt=nilai&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
			<fieldset>
				<label>Tahun Ajaran</label>				<select name="tahun">
				<?php
					$agk=mysql_query("SELECT th_ajar FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
					while($r=mysql_fetch_array($agk)){
						echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
					}
				?></select><br>
				<label>NIS</label> <input type="text" name="nis" id="tags5"><br><br><br>
				<div style="float:left; clear:both;padding-right:150px;">Semester Ganjil<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='ganjil' AND kelas='12' AND jurusan='IPS'");
				$no=1;
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?></div>
				 <div>Semester Genap<br>
				<?php
				$result=mysql_query("SELECT nama_matpel, kode_matpel FROM matpel_ma WHERE smt='genap' AND kelas='12' AND jurusan='IPS'");
				
				while($mn=mysql_fetch_array($result)) {
					echo "<input type=checkbox value='$mn[kode_matpel]' name='mp$no'>$mn[nama_matpel]<br>";
					$no++;
					}
				?>
				</div><br><br>
				 <?php echo "<input type=hidden name=jumMP value=$no-1>";
				 ?>
				 <input type="submit" value="Simpan">			
			</fieldset></form>		
		</div>
		</div>
		
		</div>
				
	</body>
</html>
<?php
break;
}
?>