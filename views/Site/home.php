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

			<!-- Slide 1 -->
				<div class="mySlides fade">
				  <div class="numbertext">1 / 3</div>
					<img src="images/slide1.png" style="width:100%">
				  <div class="text">Caption Text</div>
				</div>
			
			<!-- Slide 2 -->
				<div class="mySlides fade">
				  <div class="numbertext">2 / 3</div>
					<img src="images/slide2.png" style="width:100%">
				  <div class="text">Caption Two</div>
				</div>
			
			<!-- Slide 3 -->
				<div class="mySlides fade">
				  <div class="numbertext">3 / 3</div>
					<img src="images/slide3.png" style="width:100%">
				  <div class="text">Caption Three</div>
				</div>

			
			</div>
			
			<br>
			
			<!-- Slider Nav -->

			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
					<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
			
			<!-- Slider Script -->

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
					setTimeout(showSlides, 1800); // Change image every 2 seconds
				}
			</script>
			
			<!-- Slider End -->
			
			
			
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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GHardware</title>
	</head>

	<body>
	</body>
</html>
