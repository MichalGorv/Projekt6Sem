<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sklep internetowy | Rejestracja</title>
    <link rel="stylesheet" href="style rejestracja.css">
</head>
<body>
        <div id="register-form" class='register-page'>
            <div class="form-box1">
                <div class="form1">
                    <form class='register-form', action="rejestracja.php", method="post">
                        <center><h1 class="main-heading">Rejestracja</h1></center>
				        <input type="text" name='nazwa'placeholder="nazwa użytkownika" required/>
				        <input type="text" name='email'placeholder="email" required/>
				        <input type="password"name='haslo' placeholder="hasło" required/>
				        <button>Rejestracja</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>