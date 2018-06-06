<?php
session_start();
//récuperation de valeur
$_SESSION['count'] = time();
$image;
?>

<?php
$flag = 5;
//test pour savoir si le capcha a été poster
if (isset($_POST["flag"])) {
    //récuperation de valeur
    $input = $_POST["input"];
    $flag = $_POST["flag"];
}else{
    //récuperation de valeurs
    $input = $_GET["input"];
    $flag = $_GET["flag"];
}
//si le captcha a été poster et que l'input et égale au bon mot
if ($flag == 1) {
    if ($input == $_SESSION['captcha_string']) {
        //afficher que le captcha et réussi
        ?>
		
        <div style="text-align:center;">
            <strong>Bonne réponse !</strong>
			
        </div>

    <?php
    //mise en session d'une valeur pour la réussite du captcha
    $_SESSION['captcharéussi']=1;
    } else {
        //afficher que le capcha n'a pas été réussi
        ?>

        <div style="text-align:center;">
            <strong>Mauvaise réponse<br>Veuillez réessayer</strong>
        </div>

        <?php
        //création d'une nouvelle image et affichage a l'écran
        create_image();
        display();
    }
} else {
    //si c'est la prémiere fois que on arrive sur la page juste crée le captcha
    $_SESSION['captcharéussi']=0;
    create_image();
    display();
}
//Display l'image du captcha et le formulaire pour remplir
function display()
{
    ?>

    
        <div class="col-lg-4"><strong>Entrez les lettres visibles sur l'image</strong></div>
        

        <div class="col-lg-8" style="display:block;margin-bottom:20px;margin-top:20px;">
            <img src="image<?php echo $_SESSION['count'] ?>.png">
        </div>
        <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
         >
		<div class="col-lg-4"></div>
        <div class="col-lg-8"><input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="contrôler" name="submitcaptcha" value="Valider"/></div>
        </form>


    

<?php
}
//fonction de création de l'image
function  create_image()
{
    global $image;
    //création d'une image vide
    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");
    //valeur pour definir la couleur de fond
    $background_color = imagecolorallocate($image, 255, 255, 255);
    //valeur pour écrire le texte de l'image
    $text_color = imagecolorallocate($image, 0, 255, 255);
    //valeur pour la création de ligne aléatoire sur le site
    $line_color = imagecolorallocate($image, 64, 64, 64);
    //valeur pour la création de point bleu aléatoire
    $pixel_color = imagecolorallocate($image, 0, 0, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);
    for ($i = 0; $i < 3; $i++) {
        //crée des ligne aléatoire sur l'image
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }
    for ($i = 0; $i < 1000; $i++) {
        //crée des point bleu aléatoire sur l'image
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
    }
    //valeur pour les lettres
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $len = strlen($letters);
    //génération d'un texte random
    $letter = $letters[rand(0, $len - 1)];
    //valeur de la couleur du texte
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $word = "";
    //ecriture du texte a des emplacement aléatoire sur l'image
    for ($i = 0; $i < 6; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;
    }
    //mise dans une variable de session le mot du captcha
    $_SESSION['captcha_string'] = $word;
    $images = glob("*.png");
    //quand une image est crée détruire l'ancienne
    foreach ($images as $image_to_delete) {
        @unlink($image_to_delete);
    }
    //création du fichier de la nouvelle image
    imagepng($image, "image" . $_SESSION['count'] . ".png");
}
?>