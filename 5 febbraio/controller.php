<?php 
    session_start();
    
    var_dump($_REQUEST);

    $contacts = isset($_SESSION['contacts'])  ?  $_SESSION['contacts'] : [] ;
    $target_dir = "uploads/";
    $image = $target_dir.'avatar.png';

    if(!empty($_FILES['image'])) {
        if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
            if($_FILES['image']["size"] < 400000) {
                if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'])) {
                        $image = $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'];
                        echo 'Caricamento avvenuto con successo';
                    } else {
                        echo 'Errore!!!';
                    }
                }
            } else {
                echo 'FileSize troppo grande';
            }
        } else {
            echo 'FileType non supportato';
        }
    }

    // fare i controlli di validazione dei campi
    $regexphone = '/(?:([+]\d{1,4})[-.\s]?)?(?:[(](\d{1,3})[)][-.\s]?)?(\d{1,4})[-.\s]?(\d{1,4})[-.\s]?(\d{1,9})/';
    preg_match_all($regexphone, htmlspecialchars($_REQUEST['phone']), $matches, PREG_SET_ORDER, 0);
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
    preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);

    $firstname = strlen(trim(htmlspecialchars($_REQUEST['firstname']))) > 2 ? trim(htmlspecialchars($_REQUEST['firstname'])) : exit();
    $lastname = strlen(trim(htmlspecialchars($_REQUEST['lastname']))) > 2 ? trim(htmlspecialchars($_REQUEST['lastname'])) : exit();
    $city = strlen(trim(htmlspecialchars($_REQUEST['city']))) > 2 ? trim(htmlspecialchars($_REQUEST['city'])) : exit();
    $phone = $matches ? htmlspecialchars($_REQUEST['phone']) : exit();
    $email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();
    $password = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();

    $contact = [
        'Firstname' => $firstname, 
        'Lastname' => $lastname, 
        'City' => $city, 
        'Phone' => $phone,  
        'Email' => $email,
        'Password' => $password,
        'Image' => $image
    ];

    $_SESSION['contacts'] = [...$contacts, $contact];

    session_write_close();

    

    // Invia una mail di conferma

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; 
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';            //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '2466a10a9097f8';                       //SMTP username
        $mail->Password   = '483e54b4234812';                       //SMTP password
        $mail->Port       = 2525;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        //Recipients
        $mail->setFrom('admin@example.com', 'Mario Rossi');
        $mail->addAddress($email, $firstname . ' ' . $lastname);     //Add a recipient
        $mail->addReplyTo('admin@example.com', 'Information');

        //Attachments
        $mail->addAttachment($image);    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Grazie per esserti Registrato sul nostro sito';
        $mail->Body    = '<h1>Grazie!!!!</h1><p>Ti aspettiamo sulla nostra rubrica</p>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



    //header('Location: http://localhost/S1L3/Esercizio/');
    exit(header('Location: http://localhost/S1L3/Esercizio/'));
    

?>