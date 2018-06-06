<?php
session_start();
$_SESSION['count'] = time();
$image;
?>

<?php
$flag = 5;
if (isset($_POST["flag"])) {
    $input = $_POST["input"];
    $flag = $_POST["flag"];
}
if ($flag == 1) {
    if ($input == $_SESSION['captcha_string']) {
        ?>

        <div style="text-align:center;">
            <strong>Bonne réponse !</strong>
			
        </div>

    <?php
    $_SESSION['captcharéussi']==1;
    } else {
        ?>

        <div style="text-align:center;">
            <strong>Mauvaise réponse<br>Veuillez réessayer</strong>
        </div>

        <?php
        create_image();
        display();
    }
} else {
    create_image();
    display();
}
function display()
{
    ?>

    
        <div class="col-lg-4"><strong>Entrez les chiffres visibles sur l'image</strong></div>
        

        <div class="col-lg-8" style="display:block;margin-bottom:20px;margin-top:20px;">
            <img src="image<?php echo $_SESSION['count'] ?>.png">
        </div>
        <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
        / >
		<div class="col-lg-4"></div>
        <div class="col-lg-8"><input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="contrôler" name="submit" value="Valider"/></div>
        </form>


    

<?php
}
function  create_image()
{
    global $image;
    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 255, 255);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    $pixel_color = imagecolorallocate($image, 0, 0, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);
    for ($i = 0; $i < 3; $i++) {
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }
    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
    }
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $len = strlen($letters);
    $letter = $letters[rand(0, $len - 1)];
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $word = "";
    for ($i = 0; $i < 6; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;
    }
    $_SESSION['captcha_string'] = $word;
    $images = glob("*.png");
    foreach ($images as $image_to_delete) {
        @unlink($image_to_delete);
    }
    imagepng($image, "image" . $_SESSION['count'] . ".png");
}
?>