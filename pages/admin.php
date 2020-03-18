<nav class="navbar navbar-expand-sm bg-light">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Lista zmienionych</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Wszystkie zmiany</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Statystyki</a>
    </li>
	<li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="reset.php">Wyloguj się</a>
    </li>
  </ul>
</nav>

<div class="show_shifts_container">
	<div class="show_shifts table-responsive">
		<table class="table table-light table-bordered">
			<thead class="thead-light">
				<tr>
					<th scope="col">Data</th>
					<th scope="col">Początek</th>
					<th scope="col">Koniec</th>
					<th scope="col">Długość</th>
					<th scope="col">Numer tygodnia</th>
					<th scope="col">Oddaje</th>
					<th scope="col">Zabiera</th>
					<th scope="col">Archiwizuj</th>
					<th scope="col">Usuń</th>
					</tr>
			</thead>
			<tbody class="">
				<?php

					$stmt = "SELECT ID, date, shift_start, shift_end, lenght, week_number,owner_id,taker_id FROM shifts WHERE taken = 1 AND archived != 1 ORDER BY date, shift_start, shift_end";
					$shifts = $conn->query($stmt);
					while($shift = $shifts->fetch()){
						echo "<tr>";
							switch($shift['shift_start']){
								case 1:
									$shift_start='11:00';
									break;
								case 2:
									$shift_start='11:30'; 
									break;
								case 3:
									$shift_start='12:00'; 
									break;
								case 4:
									$shift_start='12:30'; 
									break;
								case 5:
									$shift_start='13:00'; 
									break;
								case 6:
									$shift_start='13:30'; 
									break;
								case 7:
									$shift_start='14:00'; 
									break;
								case 8:
									$shift_start='14:30'; 
									break;
								case 9:
									$shift_start='15:00'; 
									break;
								case 10:
									$shift_start='15:30'; 
									break;
								case 11:
									$shift_start='16:00'; 
									break;
								case 12:
									$shift_start='16:30'; 
									break;
								case 13:
									$shift_start='17:00'; 
									break;
								case 14:
									$shift_start='17:30'; 
									break;
								case 15:
									$shift_start='18:00'; 
									break;
								case 16:
									$shift_start='18:30'; 
									break;
								case 17:
									$shift_start='19:00'; 
									break;
								case 18:
									$shift_start='19:30'; 
									break;
								case 19:
									$shift_start='20:00'; 
									break;
								case 20:
									$shift_start='20:30'; 
									break;
								case 21:
									$shift_start='21:00'; 
									break;
								case 22:
									$shift_start='21:30'; 
									break;
								}
							switch($shift['shift_end']){
								case 2:
									$shift_end='11:30'; 
									break;
								case 3:
									$shift_end='12:00'; 
									break;
								case 4:
									$shift_end='12:30'; 
									break;
								case 5:
									$shift_end='13:00'; 
									break;
								case 6:
									$shift_end='13:30'; 
									break;
								case 7:
									$shift_end='14:00'; 
									break;
								case 8:
									$shift_end='14:30'; 
									break;
								case 9:
									$shift_end='15:00'; 
									break;
								case 10:
									$shift_end='15:30'; 
									break;
								case 11:
									$shift_end='16:00'; 
									break;
								case 12:
									$shift_end='16:30'; 
									break;
								case 13:
									$shift_end='17:00'; 
									break;
								case 14:
									$shift_end='17:30'; 
									break;
								case 15:
									$shift_end='18:00'; 
									break;
								case 16:
									$shift_end='18:30'; 
									break;
								case 17:
									$shift_end='19:00'; 
									break;
								case 18:
									$shift_end='19:30'; 
									break;
								case 19:
									$shift_end='20:00'; 
									break;
								case 20:
									$shift_end='20:30'; 
									break;
								case 21:
									$shift_end='21:00'; 
									break;
								case 22:
									$shift_end='21:30'; 
									break;
								case 23:
									$shift_end='22:00'; 
									break;
								}
							switch($shift['lenght']){
								case 1:
									$length='0:30';
									break;
								case 2:
									$length='1:00';
									break;
								case 3:
									$length='1:30';
									break;
								case 4:
									$length='2:00';
									break;
								case 5:
									$length='2:30';
									break;
								case 6:
									$length='3:00';
									break;
								case 7:
									$length='3:30';
									break;
								case 8:
									$length='4:00';
									break;
								case 9:
									$length='4:30';
									break;
								case 10:
									$length='5:00';
									break;
								case 11:
									$length='5:30';
									break;
								case 12:
									$length='6:00';
									break;
								case 13:
									$length='6:30';
									break;
								case 14:
									$length='7:00';
									break;	
								case 15:
									$length='7:30';
									break;
								case 16:
									$length='8:30';
									break;
								case 17:
									$length='9:00';
									break;
								case 18:
									$length='9:30';
									break;
								case 19:
									$length='10:00';
									break;
								case 20:
									$length='10:30';
								case 21:
									$length='11:00';
								}
							echo "<td>";
								echo $shift['date'];
							echo "</td>";
							echo "<td>";
								echo $shift_start;
							echo "</td>";
							echo "<td>";
								echo $shift_end;
							echo "</td>";
							echo "<td>";
								echo $length;
							echo "</td>";
							echo "<td>";
								echo $shift['week_number'];
                            echo "</td>";
                            echo "<td>";
								echo $shift['owner_id'];
                            echo "</td>";
                            echo "<td>";
								echo $shift['taker_id'];
                            echo "</td>";
							echo "<td>";
							 echo "<button type='button' class='btn btn-primary'";
							 echo "onclick=archive(";
							 echo $shift['ID'];
							 echo ")";
							 echo ">Archiwizuj</button>";
                            echo "</td>";
                            echo "<td>";
							 echo "<button type='button' class='btn btn-primary'";
							 echo "onclick=dele(";
							 echo $shift['ID'];
							 echo ")";
							 echo ">Usuń(f)</button>";
							echo "</td>";
						echo "<tr>";
					}

				?>
			</tbody>
		</table>
	</div>
</div>
<div class="show_shifts_container">
	<div class="show_shifts table-responsive">
		<table class="table table-light table-bordered">
			<thead class="thead-light">
				<tr>
					<th scope="col">Data</th>
					<th scope="col">Początek</th>
					<th scope="col">Koniec</th>
					<th scope="col">Długość</th>
					<th scope="col">Numer tygodnia</th>
					<th scope="col">Oddaje</th>
					<th scope="col">Archiwizuj</th>
					</tr>
			</thead>
			<tbody class="">
				<?php

					$stmt = "SELECT ID, date, shift_start, shift_end, lenght, week_number,owner_id,taker_id FROM shifts WHERE taken = 0 AND archived = 0 ORDER BY date, shift_start, shift_end";
					$shifts = $conn->query($stmt);
					while($shift = $shifts->fetch()){
						echo "<tr>";
							switch($shift['shift_start']){
								case 1:
									$shift_start='11:00';
									break;
								case 2:
									$shift_start='11:30'; 
									break;
								case 3:
									$shift_start='12:00'; 
									break;
								case 4:
									$shift_start='12:30'; 
									break;
								case 5:
									$shift_start='13:00'; 
									break;
								case 6:
									$shift_start='13:30'; 
									break;
								case 7:
									$shift_start='14:00'; 
									break;
								case 8:
									$shift_start='14:30'; 
									break;
								case 9:
									$shift_start='15:00'; 
									break;
								case 10:
									$shift_start='15:30'; 
									break;
								case 11:
									$shift_start='16:00'; 
									break;
								case 12:
									$shift_start='16:30'; 
									break;
								case 13:
									$shift_start='17:00'; 
									break;
								case 14:
									$shift_start='17:30'; 
									break;
								case 15:
									$shift_start='18:00'; 
									break;
								case 16:
									$shift_start='18:30'; 
									break;
								case 17:
									$shift_start='19:00'; 
									break;
								case 18:
									$shift_start='19:30'; 
									break;
								case 19:
									$shift_start='20:00'; 
									break;
								case 20:
									$shift_start='20:30'; 
									break;
								case 21:
									$shift_start='21:00'; 
									break;
								case 22:
									$shift_start='21:30'; 
									break;
								}
							switch($shift['shift_end']){
								case 2:
									$shift_end='11:30'; 
									break;
								case 3:
									$shift_end='12:00'; 
									break;
								case 4:
									$shift_end='12:30'; 
									break;
								case 5:
									$shift_end='13:00'; 
									break;
								case 6:
									$shift_end='13:30'; 
									break;
								case 7:
									$shift_end='14:00'; 
									break;
								case 8:
									$shift_end='14:30'; 
									break;
								case 9:
									$shift_end='15:00'; 
									break;
								case 10:
									$shift_end='15:30'; 
									break;
								case 11:
									$shift_end='16:00'; 
									break;
								case 12:
									$shift_end='16:30'; 
									break;
								case 13:
									$shift_end='17:00'; 
									break;
								case 14:
									$shift_end='17:30'; 
									break;
								case 15:
									$shift_end='18:00'; 
									break;
								case 16:
									$shift_end='18:30'; 
									break;
								case 17:
									$shift_end='19:00'; 
									break;
								case 18:
									$shift_end='19:30'; 
									break;
								case 19:
									$shift_end='20:00'; 
									break;
								case 20:
									$shift_end='20:30'; 
									break;
								case 21:
									$shift_end='21:00'; 
									break;
								case 22:
									$shift_end='21:30'; 
									break;
								case 23:
									$shift_end='22:00'; 
									break;
								}
							switch($shift['lenght']){
								case 1:
									$length='0:30';
									break;
								case 2:
									$length='1:00';
									break;
								case 3:
									$length='1:30';
									break;
								case 4:
									$length='2:00';
									break;
								case 5:
									$length='2:30';
									break;
								case 6:
									$length='3:00';
									break;
								case 7:
									$length='3:30';
									break;
								case 8:
									$length='4:00';
									break;
								case 9:
									$length='4:30';
									break;
								case 10:
									$length='5:00';
									break;
								case 11:
									$length='5:30';
									break;
								case 12:
									$length='6:00';
									break;
								case 13:
									$length='6:30';
									break;
								case 14:
									$length='7:00';
									break;	
								case 15:
									$length='7:30';
									break;
								case 16:
									$length='8:30';
									break;
								case 17:
									$length='9:00';
									break;
								case 18:
									$length='9:30';
									break;
								case 19:
									$length='10:00';
									break;
								case 20:
									$length='10:30';
								case 21:
									$length='11:00';
								}
							echo "<td>";
								echo $shift['date'];
							echo "</td>";
							echo "<td>";
								echo $shift_start;
							echo "</td>";
							echo "<td>";
								echo $shift_end;
							echo "</td>";
							echo "<td>";
								echo $length;
							echo "</td>";
							echo "<td>";
								echo $shift['week_number'];
                            echo "</td>";
                            echo "<td>";
								echo $shift['owner_id'];
                            echo "</td>";
							echo "<td>";
							 echo "<button type='button' class='btn btn-primary'";
							 echo "onclick=archive(";
							 echo $shift['ID'];
							 echo ")";
							 echo ">Archiwizuj</button>";
                            echo "</td>";
						echo "<tr>";
					}

				?>
			</tbody>
		</table>
	</div>
</div>
<form method="POST" action="pages/scripts/archive.php" id="archive_form" name="archive_form" style="display:none;">
        <input type="text" name="shift_id" id="shift_id"></input>
</form>
<script>
        function archive(id){
            document.getElementById('shift_id').value=id;
            document.getElementById('archive_form').submit();
        }
    </script>
