<?php
session_start();
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koszyk";

// Połączenie z bazą
$conn = mysqli_connect("localhost","root","","koszyk");

// Test połączenia
if (!$conn) {
  die("Połączenie nieudane: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sklep internetowy |</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    img {
        width: 100%;
        height: 100px;
        object-fit: contain;
    }
	
    h3 {
        text-align: center;
    }

    h6 {
        text-align: center;
    }
    </style>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="row">

				<?php

				$sql = "SELECT * FROM produkty";
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {
				// echo $row['id'] ." ". $row['nazwa'] ." ". $row['image'] ." ". $row['cena']."<br>";
				?>
				<div class="col-md-3 text-center mt-5">
					<img src="grafiki/<?php echo $row['image']?>" alt="">
					<h3><?php echo $row['nazwa']?></h3>
					<h6>cena: <?php echo $row['cena']?></h6>
					<div class="form-group">
						<select class="form-control" id="ilosc<?php echo $row['id']?>">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						<input type="hidden" id="nazwa<?php echo $row['id']?>" value='<?php echo $row['nazwa']?>'>
						<input type="hidden" id="cena<?php echo $row['id']?>" value='<?php echo $row['cena']?>'>
						<button class='btn btn-danger add' data-id="<?php echo $row['id']?>">Do koszyka</button>
					</div>
				</div>

				<?php
				}
				?>

			</div>
		</div>
        <div class="col-md-4">
            <h3 class='text-center'>Twój koszyk</h3>
            <div id="displayCheckout">
            <?php 
                if(!empty($_SESSION['koszyk'])){
                    $outputTable = '';
                    $total = 0;
                    $outputTable .= "<table class='table table-bordered'><thead><tr><td>nazwa</td><td>cena</td><td>ilosc</td><td>Action</td> </tr></thead>";
                    foreach($_SESSION['koszyk'] as $key => $value){
                        $outputTable .= "<tr><td>".$value['p_nazwa']."</td><td>".($value['p_cena'] * $value['p_ilosc']) ."</td><td>".$value['p_ilosc']."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Delete</button></td></tr>";  
                        $total = $total + ($value['p_cena'] * $value['p_ilosc']);
                    }
                    $outputTable .= "</table>";
                    $outputTable .= "<div class='text-center'><b>Suma: ".$total."</b></div>";
                    echo $outputTable;
                }
			?>
            </div> 
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
	alldeleteBtn = document.querySelectorAll('.delete')
	alldeleteBtn.forEach(onebyone => {
	onebyone.addEventListener('click',deleteINsession)
	})

	function deleteINsession(){
		removable_id = this.id;
		$.ajax({
			url:'koszyk.php',
			method:'POST',
			dataType:'json',
			data:{ 
				id_to_remove:removable_id,
				action:'remove' 
			},
		success:function(data){
			$('#displayCheckout').html(data);
			alldeleteBtn = document.querySelectorAll('.delete')
			alldeleteBtn.forEach(onebyone => {
			onebyone.addEventListener('click',deleteINsession)
			})
		}
		})
		.fail( function(xhr, textStatus, errorThrown) {
			alert(xhr.responseText);
		});

	}
	$('.add').click(function() { 
		id = $(this).data('id');
		nazwa = $('#nazwa' + id).val();
		cena = $('#cena' + id).val();
		ilosc = $('#ilosc' + id).val();
			$.ajax({
				url:'koszyk.php',
				method:'POST',
				dataType:'json',
				data:{
					koszyk_id : id,
					koszyk_nazwa : nazwa,
					koszyk_cena : cena,
					koszyk_ilosc : ilosc,
					action:'add'
				},
				success:function(data){
					$('#displayCheckout').html(data);
					 alldeleteBtn = document.querySelectorAll('.delete')
					 alldeleteBtn.forEach(onebyone => {
					 onebyone.addEventListener('click',deleteINsession)
					 })
				}
			})
			.fail( function(xhr, textStatus, errorThrown) {
				alert(xhr.responseText);
			});
			}
	)
		}
)
</script>

</body>
</html>

<?php
mysqli_close($conn);
?>