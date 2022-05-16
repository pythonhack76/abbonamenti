<?php

// Include config file
require_once "connection.php";
require_once "functions.php";
 
// Define variables and initialize with empty values
$titolo = $descrizione = $immagine = $prezzo = "";
$titolo_err = $descrizione_err = $prezzo_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_titolo = trim($_POST["titolo"]);
    if(empty($input_titolo)){
        $name_err = "Per favore inserisci un titolo valido.";
    } elseif(!filter_var($input_titolo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Per favore inserisci un titolo valido";
    } else{
        $titolo = $input_titolo;
    }
    
    // Validate descrizione
    $input_descrizione = trim($_POST["descrizione"]);
    if(empty($input_descrizione)){
        $descrizione_err = "Per favore inserisci una descrizione.";     
    } else{
        $descrizione = $input_descrizione;
    }
    
    // Validate prezzo
    $input_prezzo = trim($_POST["prezzo"]);
    if(empty($input_prezzo)){
        $prezzo_err = "Per favore inserisci un prezzo.";     
    } elseif(!ctype_digit($input_prezzo)){
        $prezzo_err = "Per favore inserisci un numero intero senza decimali.";
    } else{
        $prezzo = $input_prezzo;
    }
    
    // Check input errors before inserting in database
    if(empty($titolo_err) && empty($descrizione_err) && empty($prezzo_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO abbonamenti (titolo, descrizione, immagine, prezzo) VALUES (:titolo, :descrizione, :immagine, :prezzo)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":titolo", $param_titolo);
            $stmt->bindParam(":descrizione", $param_descrizione);
            $stmt->bindParam(":immagine", $param_immagine);
            $stmt->bindParam(":prezzo", $param_prezzo);
            
            // Set parameters
            $param_titolo = $titolo;
            $param_descrizione = $descrizione;
            $param_immagine = $immagine;
            $param_prezzo = $prezzo; 
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ok.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aggiungi Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Aggiungi Card</h2>
                    <p><?php echo $compila_form; ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Titolo</label>
                            <input type="text" name="titolo" class="form-control <?php echo (!empty($titolo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $titolo; ?>">
                            <span class="invalid-feedback"><?php echo $titolo_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Descrizione</label>
                            <textarea name="descrizione" class="form-control <?php echo (!empty($descrizione_err)) ? 'is-invalid' : ''; ?>"><?php echo $descrizione; ?></textarea>
                            <span class="invalid-feedback"><?php echo $descrizione_err;?></span>
                        </div>
                        <div class="form-group">
                        <h2>Aggiungi immagine</h2>
        <label for="immagine">Nome File:</label>
        
        <input type="file" name="immagine" id="immagine">
        <!-- <input type="submit" name="submit" value="Upload"> -->
        <p><strong>Attenzione:</strong> Soltanto .jpg, .jpeg, .gif, .png come formato consentito per una massimo d 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label>Prezzo</label>
                            <input type="text" name="prezzo" class="form-control <?php echo (!empty($prezzo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prezzo; ?>">
                            <span class="invalid-feedback"><?php echo $prezzo_err;?></span>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancella</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>