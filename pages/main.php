<?php
    include("scripts/user_check.php");
    include("scripts/config.php");
?>

<nav class="navbar navbar-expand-sm bg-light">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Profil</a>
	</li>
	<li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="reset.php">Wyloguj się</a>
    </li>
  </ul>
</nav>

<div class="add_shift">
  <form class="form-horizontal" method="POST" action="pages/scripts/add.php">
    <fieldset>

    <!-- Form Name -->
    <legend>Oddaj zmianę</legend>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="date">Data</label>
    <div class="col-md-4">
        <select id="date" name="date" class="form-control">
        <?php
            $day = date("N");
            echo $day;
            switch($day){
                case 1: 
                $i=7;
                break;
                case 2: 
                $i=6;
                break;
                case 3: 
                $i=5;
                break;
                case 4: 
                $i=4;
                break;
                case 5: 
                $i=10;
                break;
                case 6: 
                $i=9;
                break;
                case 7: 
                $i=8;
            }
            $data = $_SESSION['curr_date'];
            for($j=0; $j<$i;$j++){
                echo "<option value='";
                echo date("Y-m-d", strtotime("$data +$j day"));
                echo "'>";
                echo date("Y-m-d", strtotime("$data +$j day"));
                echo "</option>";
            }
        ?>
        </select>
    </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="shift_start">Początek zmiany</label>
    <div class="col-md-4">
        <select id="shift_start" name="shift_start" class="form-control">
        <option value="1">11:00</option>
        <option value="2">11:30</option>
        <option value="3">12:00</option>
        <option value="4">12:30</option>
        <option value="5">13:00</option>
        <option value="6">13:30</option>
        <option value="7">14:00</option>
        <option value="8">14:30</option>
        <option value="9">15:00</option>
        <option value="10">15:30</option>
        <option value="11">16:00</option>
        <option value="12">16:30</option>
        <option value="13">17:00</option>
        <option value="14">17:30</option>
        <option value="15">18:00</option>
        <option value="16">18:30</option>
        <option value="17">19:00</option>
        <option value="18">19:30</option>
        <option value="19">20:00</option>
        <option value="20">20:30</option>
        <option value="21">21:00</option>
        <option value="22">21:30</option>
        </select>
    </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="shift_end">Koniec zmiany</label>
    <div class="col-md-4">
        <select id="shift_end" name="shift_end" class="form-control">
        <option value="2">11:30</option>
        <option value="3">12:00</option>
        <option value="4">12:30</option>
        <option value="5">13:00</option>
        <option value="6">13:30</option>
        <option value="7">14:00</option>
        <option value="8">14:30</option>
        <option value="9">15:00</option>
        <option value="10">15:30</option>
        <option value="11">16:00</option>
        <option value="12">16:30</option>
        <option value="13">17:00</option>
        <option value="14">17:30</option>
        <option value="15">18:00</option>
        <option value="16">18:30</option>
        <option value="17">19:00</option>
        <option value="18">19:30</option>
        <option value="19">20:00</option>
        <option value="20">20:30</option>
        <option value="21">21:00</option>
        <option value="22">21:30</option>
        <option value="23">22:00</option>
        </select>
    </div>
    </div>

    <!-- Button -->
    <div class="form-group col-md-4">
        <label class="control-label" for="submit">Oddaj zmiane</label>
        <button id="submit" name="submit" class="btn btn-primary" style="margin-left: 1em;">Dane są poprawne</button>

    </div>

    </fieldset>
  </form>
</div>
<div class="show_shifts_container">
	<div class="show_shifts table-responsive">
		<legend>Zabierz zmianę</legend>
		<table class="table table-light table-bordered">
			<thead class="thead-light">
				<tr>
					<th scope="col">Data</th>
					<th scope="col">Początek</th>
					<th scope="col">Koniec</th>
					<th scope="col">Długość</th>
					<th scope="col">Numer tygodnia</th>
					<th scope="col">Zabierz</th>
					</tr>
			</thead>
			<tbody class="">
				<?php
					$cur_date = date("Y-m-d");
					$stmt = "SELECT ID, owner_id, date, shift_start, shift_end, lenght, week_number FROM shifts WHERE taken = 0 AND archived != 1 ORDER BY date, shift_start, shift_end";
					$shifts = $conn->query($stmt);
					while($shift = $shifts->fetch()){
						if($shift['date'] >= $cur_date AND $shift['owner_id'] != $_SESSION['id']){ 
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
							 echo "<button type='button' class='btn btn-primary'";
							 echo "onclick=take(";
							 echo $shift['ID'];
							 echo ")";
							 echo ">Zabierz</button>";
							echo "</td>";
						echo "<tr>";
							}
					}

				?>
			</tbody>
		</table>
	</div>
</div>
<form method="POST" action="pages/scripts/take.php" id="take_form" name="take_form" style="">
        <input type="text" name="shift_id" id="shift_id"></input>
        <input type="text" name="taker_id" id="taker_id"></input>
</form>
<script>
        function take(id){
            document.getElementById('shift_id').value=id;
            document.getElementById('taker_id').value=<?php echo "'".$_SESSION['id']."'"; ?>;
            document.getElementById('take_form').submit();
        }
		</script>