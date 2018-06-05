<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Site/home.php:
    #### 	  Page Home par défaut
    ################################################################################
    

	
	echo '
		
			<div class="col-lg-9">
			
		

			
			<!-- Slider -->

			<script>
							var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none"; 
					}
					slideIndex++;
					if (slideIndex > slides.length) {slideIndex = 1} 
					slides[slideIndex-1].style.display = "block"; 
					setTimeout(showSlides, 4000); // Change image every 2 seconds
				}
			</script>
			
			<!-- Slider End -->

			
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<a href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=13"><img src="images/Slide1.png" style="width:100%"></a>
				  </div>

				  <div class="item">
					<a href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=8"><img src="images/Slide2.png" style="width:100%"></a>
				  </div>
				
				  <div class="item">
					<a href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=16"><img src="images/Slide3.png" style="width:100%"></a>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Précédent</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Suivant</span>
				</a>
			  </div>
			

			
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=7">
											
											<!-- Category -->
											<div class="col-xl-12">
												Alimentation
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/corsaircx550m.jpg">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												70 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												Corsair CX550M
											</div>
											
									</a>	
											
									
											
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=11">
											
											<!-- Category -->
											<div class="col-xl-12">
												Boitiers
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/corsaircrystal570.jpg">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												193 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												Corsair Crystal 570X RGB
											</div>
											
									</a>	
											
									
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=5">
											
											<!-- Category -->
											<div class="col-xl-12">
												Cartes graphiques
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/1080strix.jpg">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												870 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												Nvidia GTX 1080 Strix
											</div>
											
									</a>	
											
									
											
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=9">
											
											<!-- Category -->
											<div class="col-xl-12">
												Ventirad
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/bequiet.jpg">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												119 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												Be quiet! Straight Power 10 CM
											</div>
											
									</a>	
											
									
											
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=13">
											
											<!-- Category -->
											<div class="col-xl-12">
												Carte graphiques
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/AsusGeForceGTX1080STRIXA8G-GAMING.jpg">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												848 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												Asus GeForce GTX 1080 STRIX A8G-GAMING
											</div>
											
									</a>	
											
							
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="http://ghardware.clanviquerat.ch/index.php?controller=Article&action=articlecommentaire&id=16">
											
											<!-- Category -->
											<div class="col-xl-12">
												Cartes mères
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/AsRockH110PROBTC+.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												179 CHF
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												AsRock H110 PRO BTC+
											</div>
											
									</a>	
											
									
											
								</div>
				</div>	

			<!-- Article Button End -->

				</div>


	';

