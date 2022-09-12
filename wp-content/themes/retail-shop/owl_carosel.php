<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="OwlCarousel2-2.3.4\dist\assets\owl.carousel.min.css">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4\dist\assets\owl.theme.default.min.css">

</head>
<body>
	<div class="owl-carousel">
  <div> <img src="OwlCarousel2-2.3.4\src\img\car1.png" alt="pic1"> </div>
  <div> <img src="OwlCarousel2-2.3.4\src\img\car2.jpg" alt="pic2"> </div>
  <div> <img src="OwlCarousel2-2.3.4\src\img\icon.png" alt="pic3"> </div>
  <div> <img src="OwlCarousel2-2.3.4\src\img\icon1.png" alt="pic4"> </div>
  <div> <img src="OwlCarousel2-2.3.4\src\img\image1.png" alt="pic5"> </div>
  <div> <img src="OwlCarousel2-2.3.4\src\img\images.png" alt="pic6"> </div>
</div>
<footer>
		<script src="OwlCarousel2-2.3.4\docs\assets\vendors\jquery.min.js"></script>
		<script src="OwlCarousel2-2.3.4\dist\owl.carousel.min.js"></script>
</footer>
<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
</body>
</html>