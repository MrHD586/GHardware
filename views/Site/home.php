<?php
    ################################################################################
    #### Auteur : Butticaz Yvann
    #### Date : 27 Février 2018
    #### Page views/Site/home.php:
    #### 	  Page Home par défaut
    ################################################################################
    

	
	echo '
		
			<div class="col-lg-9">
			
			
			
			<div class="slideshow-container">

			<div class="mySlides fade">
			  <div class="numbertext">1 / 3</div>
			  <img src="images/slide1.png" style="width:100%">
			  <div class="text">Caption Text</div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">2 / 3</div>
			  <img src="images/slide2.png" style="width:100%">
			  <div class="text">Caption Two</div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">3 / 3</div>
			  <img src="images/slide3.png" style="width:100%">
			  <div class="text">Caption Three</div>
			</div>

			</div>
			<br>

			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span> 
			  <span class="dot" onclick="currentSlide(2)"></span> 
			  <span class="dot" onclick="currentSlide(3)"></span> 
			</div>

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
			
			
			<!-- ADMIN -->
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								<center>Nouvel Utilisateur</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/adduser.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								<center>Nouvel Article</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/article.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								<center>Nouvelle Marque</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/mark.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<div class="col-xs-12 col-sm-6 col-md-3">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								<center>Nouvelle Catégorie</center>
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/category.png">
							</div>
							
							</a>	
							
					</div>
				</div>
				
			<!-- FIN ADMIN -->
			

<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
					
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>			

<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
					
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>
				
			
				<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
						
						
							<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
						
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
					
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>			

<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
													<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
					
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
				</div>
				
			
				<div class="col-xs-12 col-sm-6 col-md-4">
				
				<div class="articlebox">
					<a id="categorylink" href="#">
					
							<div class="col-xl-12">
								Catégorie
							</div>
						
						
							<div class="col-xl-12">
								<img class="img-responsive" src="images/imagetemplate.png">
							</div>
						
							<div class="col-xl-12">
								214.50
							</div>
							<div class="col-xl-12">
								NOM DE L\'ARTICLE
							</div>
							
							</a>	
							
					
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xs-9">
										*****
									</div><div class="col-xs-3">
										<a href="#"><img class="img-responsive" src="images/carticon.png"></a>
									</div>
								</div>
							</div>
					</div>
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
