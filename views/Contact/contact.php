<?php
################################################################################
#### Auteur : Valentin Favre
#### Date : 24 Mai 2018
#### Page de Commentaire (Affichage) 
################################################################################

echo'

<div class="col-lg-9">
	<div class="row">
		<div class="col-xs-offset-1 col-lg-11">
			<h1>Informations</h1>
		</div>
		<div class="col-xs-offset-1 col-lg-5">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2745.225740340461!2d6.6185803156421175!3d46.52343467016074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c2e29933c3603%3A0xf7dc4de95e501370!2sEPSIC!5e0!3m2!1sen!2sch!4v1528121275210" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div class="col-xs-offset-1 col-lg-5">
			<strong>Adresse</strong><br>
				Rue de Genève 63<br>1002 Lausanne<br><br>
			<strong>Téléphone</strong><br>
				+41 79 888 88 88<br>
				+41 21 777 77 77
		</div>

		<div class="col-xs-offset-1 col-lg-11">
			<h1>Nous contacter</h1>
		</div>
		
		<div class="col-xs-offset-1 col-lg-11">
			<form method="post" action="">
				<p>
					<div class="col-lg-2"><label for="Contact_Name">Nom</label></div>
					<div class="col-lg-10"><input type="text" name="Contact_Name"/></div>
					<div class="col-lg-2"><label for="Contact_FName">Prénom</label></div>
					<div class="col-lg-10"><input type="text" name="Contact_FName"/></div>
					<div class="col-lg-2"><label for="Contact_Email">Email</label></div>
					<div class="col-lg-10"><input type="text" name="Contact_Email"/></div>
					<div class="col-lg-2"><label for="Contact_Text">Message</label></div>
					<div class="col-lg-10"><textarea name="Contact_Text"/></textarea></div>
					<div class="col-xs-offset-2 col-lg-2"><input type="submit" name="submit" value="Envoyer"/></div>
				</p>
			</form>
		</div>
		
	</div>
</div>
';




