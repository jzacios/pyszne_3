<?php
    include("scripts/user_check.php");
    include("scripts/config.php");
?>

<nav class="navbar navbar-expand-sm bg-light">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Dodaj zmiane</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Zobacz zmiany</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Zobacz swoje zmiany</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info btn btn-light" href="#">Profil</a>
    </li>
  </ul>
</nav>

<div class="add_shift">
    <form class="form-horizontal">
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
                echo date("d.m.y", strtotime("$data +$j day"));
                echo "'>";
                echo date("d.m.y", strtotime("$data +$j day"));
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
