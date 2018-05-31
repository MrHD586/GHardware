<?php
################################################################################
#### Auteur : Valentin Favre
#### Date : 24 Mai 2018
#### Page de Commentaire (Affichage)
################################################################################

echo'
    
	<div class="col-lg-10 col-lg-offset-1">
    
    
    
				<center>
			<div class="row">
    
			<!-- N°Commentaire -->
    
				<div class="col-md-3">
					<div class="row">
						<center>
						<b>N°Commentaire</b>
						</center>
					</div>
				</div>
			<!-- Texte -->
				<div class="col-md-2">
					<div class="row">
						<center>
						<b>Texte</b>
						</center>
					</div>
				</div>
    
            <!-- Articles -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<b>Article</b>
								</center>
							</div>
						</div>
			<!-- Etat -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<b>Etat</b>
								</center>
							</div>
						</div>
            
				</center>
            <!-- Action -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<b>Action</b>
								</center>
							</div>
						</div>
            
				</center>
    
';      foreach($Commentaire as $Commentaire){
        $idCommentaire=$Commentaire['idComment'];
            $Etat=$Commentaire['State'];
            if($Etat==0){
                $EtatTxt= 'En attente';
            }else if($Etat==1){
                $EtatTxt= 'Refusé';
            }else{
                $EtatTxt= 'Accepté et publié';
            }
            
echo'<form method=POST action=index.php?controller=commentaire&action=AddDeleteCommentaire&id='.$idCommentaire.'>	
        <div class="commandarticle">
			    <a class="commandlink" href="index.php?controller=Article&action=articlecommentaire&id='.$Commentaire['Fk_Article'].'">
				<center>
			<div class="row">
    
			<!-- N°Commentaire -->
    
				<div class="col-md-3">
					<div class="row">
						<center>
						'.$idCommentaire.'
						</center>
					</div>
				</div>
			<!-- Texte -->
				<div class="col-md-2">
					<div class="row">
						<center>
						'.$Commentaire['Text'].'
						</center>
					</div>
				</div>

            <!-- Article -->
				<div class="col-md-2">
					<div class="row">
						<center>
						'.$article[$idCommentaire].'
						</center>
					</div>
				</div>
    
			<!-- Etat -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
                        
						'.$EtatTxt.'
								</center>
							</div>
						</div>
				
            <!-- Action -->
    
						<div class="col-md-2">
							<div class="row">
								<center>
						<input type="submit" name="Delete" value="Supprimer le commentaire">
								</center>
							</div>
						</div>
                </center>
			</a>
		</div>
</form>';
}echo'
    
	</div>';