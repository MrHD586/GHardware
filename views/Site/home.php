<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Site/home.php:
    #### 	  Page Home par défaut
    ################################################################################
    

	
	echo '
		
			<div class="col-lg-9">
			
		<!-- SLIDER -->	
			
			<div class="slideshow-container">

				<div class="mySlides fade">
				<a href="#">
				  <div class="numbertext">1 / 3</div>
				  <img src="images/Slide1.png" style="width:100%">
				</div>

				<div class="mySlides fade">
				<a href="#1">
				  <div class="numbertext">2 / 3</div>
				  <img src="images/Slide2.png" style="width:100%">
				</div>

				<div class="mySlides fade">
				<a href="#2">
				  <div class="numbertext">3 / 3</div>
				  <img src="images/Slide3.png" style="width:100%">
				 </a>
				</div>

				</div>
				<br>

				<div style="text-align:center">
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				</div>

				<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
					   slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex > slides.length) {slideIndex = 1}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 4000); // Change image every 2 seconds
				}
				</script>

			
			
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->
			
			<!-- Article Button -->

				<div class="col-xs-12 col-sm-6 col-md-4">
								
								<div class="articlebox">
									<a id="categorylink" href="#">
											
											<!-- Category -->
											<div class="col-xl-12">
												Catégorie
											</div>
														

											<!-- Image -->
											<div class="col-xl-12">
												<img class="img-responsive" src="images/imagetemplate.png">
											</div>
									
											<!-- Price -->
											<div class="col-xl-12">
												214.50
											</div>
											
											<!-- Name -->
											<div class="col-xl-12">
												NOM DE L\'ARTICLE
											</div>
											
									</a>	
											
									
											<div class="col-xl-12">
												<div class="row">
													<!-- Note -->
													<div class="col-xs-9">
														*****
													</div><div class="col-xs-3">
													
													<!-- Cart Button -->
														<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
													</div>
												</div>
											</div>
								</div>
				</div>	

			<!-- Article Button End -->

				</div>


	';

