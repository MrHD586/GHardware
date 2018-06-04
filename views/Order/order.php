<?php
    ################################################################################
    #### Auteur : Viquerat Killian
    #### Date : 01 Juin 2018
    #### Page views/order/order.php:
    #### 		  Page pour choisir le moyen de payement
    ################################################################################
    
    echo '<h1>Moyen de payement</h1>
        <p style="color:red;">L\'adresse de votre profile va être utiliser comme adresse de destination. Veuillez être sur qu\'elle sois correcte avant de passer votre order.</p>
        <form action="index.php?controller=order&action=order" method="POST">
            <input type="radio" name="payment" value="0" checked>Nature<br>
            <input type="radio" name="payment" value="1" checked>Facture<br>
            <input type="submit" name="continuer" value="Continuer">
        </form>
        <form action="index.php?controller=order&action=order" method="POST">
            <input type="submit" name="annuler" value="Annuler">
        </form>';
