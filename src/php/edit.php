<?php
session_start();
include "connectdb.php";
include "admin.html";

	 if(isset($_POST['bt1']))
	 {
		$s1="update coordinates set p_population=$_POST[pop], p_places=$_POST[plc] where p_id=$_GET[id]";
		$s2="update demand set demand=$_POST[zitisi] where p_id=$_POST[id] and time=$_POST[tm]";
		mysqli_query($conn,$s1);
		mysqli_query($conn,$s2);
	 }


	 $q=mysqli_query($con,"select * from polygon where p_id=$_POST[id]"); //isws GET
	 $r=mysqli_fetch_array($q);

	 echo "ID: $r[name]
	 <form action='' method=post>
	 Population: <br>
	 <input type=number value='$r[population]' name=pop><br>
	 Parking Places: <br>
	 <input type=number value='$r[places]' name=plc><br>

    For Hour:<br><select name=tm class=\"form-control\" >";

	for ($i=0;$i<24;$i++)
		echo "<option value=$i>$i:00</option>";

	echo "
	</select><br>
	Value:
	<input type=number step=\"0.01\" name=zitisi value='0.0'>
	<input type=\"submit\" class='btn btn-primary' value='Save Data' name=bt1>
</form>";


	 $q=mysqli_query($con,"select * from curve where p_id=$_GET[id] order by time");

	 echo "<br>
	 </div>
	 <div class=col-md-12>
	 <h3>Demant Curve Parking per Hour  </h3>
	 <table border=3 class=table>";
	 echo "<tr><td>Hour<br>Value</td>";

	while( $r=mysqli_fetch_array($q))
	{
		echo "<td> $r[time] <br> ".round($r['demand'],2),"</td>";
	}

	 echo "</tr></table>";

?>
