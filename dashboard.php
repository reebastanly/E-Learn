<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else
{
	$search_sql="select * from tblbook";	
		if(isset($_POST['Search']))
			{
				if(isset($_POST['searchstr']))
				{
				$searchstr=$_POST['searchstr'];
				$search_sql="select * from tblbook where BookName like '%$searchstr%'";
				}
				else
				{
				$search_sql="select * from tblbook";
				}
			}

    $UserId=$_SESSION['UserId'];
    $sql="SELECT FirstName,LastName FROM tblUsers WHERE UserId ='$UserId'";
    $query=$dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {  
            $UserName="$result->FirstName $result->LastName";
        }
    }


    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Elearn | Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Inspire Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->



<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" 	href="css/chocolat.css" type="text/css" media="all">
<!--// css -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
	<!-- Popup-Box-JavaScript -->
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.gallery-grids a').Chocolat();
		});
	</script>
	<!-- //Popup-Box-JavaScript -->
	<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
          <!--  <script type="text/javascript" src="validate.js"></script> -->
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			</script>
	<!-- //start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script> 
 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
</script>	


</head>
<body>
	<div class="header">
		<div class="container">

			<div class="w3l_header_left"> 
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+91-123123123</li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>bookstore@elearn.com</li>
				</ul>
			</div>
			
			
			<div class="w3l_header_right">
				<ul>
                <li><a class="book  button-isi zoomIn animated" data-wow-delay=".5s" href="index.php">Home</a></li>
				<li><a class="book  button-isi zoomIn animated" data-wow-delay=".5s" href="dashboard.php"></span>Dashboard</a></li>
					<li><a class="book  button-isi zoomIn animated" data-wow-delay=".5s" href="forgot_password.php"></span>Change Password</a></li>
					<li><a class="book  button-isi zoomIn animated" data-wow-delay=".5s" href="user_profile.php"></span>Profile</a></li>
					
					
					<?php if($_SESSION['login'])
                            {
                    ?> 
					<li><a class="book  button-isi zoomIn animated" data-wow-delay=".5s" href="logout.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Logout</a></li>
            		<?php }?>
				</ul>
			</div>
			
		<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="logo-navigation-w3layouts">
		<div class="container">
		<div class="logo-w3">
			<a href="#"><h1><img src="images/logo.png" alt=" " /><span><strong>E-Learn</strong></span></h1></a>
		</div>
		<div class="navigation agileits w3layouts">
			<nav class="navbar agileits w3layouts navbar-default">
				<div class="navbar-header agileits w3layouts">
					<button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only agileits w3layouts">Toggle navigation</span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
					</button>
				</div>

<!-- 
user icons
 -->				

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
                <li><a href="feedback.php"><span ></span>&nbsp; Feedback</a></li>
                <li><a href="advanced_search.php"><span ></span>&nbsp; Advanced search</a></li>
                <li><a href="user_view_orders.php"><span ></span>&nbsp; Your Orders</a></li>
                <li><a href="user_view_feedbacks.php"><span ></span>&nbsp; Your Feedbacks</a></li>
            </ul>
        </div>
        

			</nav>
		</div>
	</div>

<br>
	<div class="container">
	<div class="row">
           <div id="custom-search-input">
           <form action="dashboard.php" method="post">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" name="searchstr" id="searchstr" placeholder="Search your favourite books here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"  id="Search" name="Search">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                    
                                </span>
                             
                            </div>
                        </div>
           </form>
	</div>
</div>

<br>

<style>

.my-custom-scrollbar-menu {
  position: relative;
  left:30px;
  height: 420px;
  width:200px;
  overflow: auto;
}

.my-custom-scrollbar-content {
  position: relative;
  left:55px;
  height: 420px;
  width:970px;
  overflow: auto;
}


.table-wrapper-scroll-y {
  display: block;
}

</style>

<table border=0>
<tr><td>

<div class="table-wrapper-scroll-y my-custom-scrollbar-menu">

    <table class="table table-bordered table-striped mb-0">
    
    
    <tr>
            <td align=center>
            		<b>-- OPTIONS --</b>
            		
                  <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light">All Books</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Advanced search</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Order Status</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Provide Feedback</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Feedback Status</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">View Cart</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Change password</a>
                    
            
                  </div>
            
            </td>
     </tr>
    
    
    </table>



</div>


</td>
<td>


<div class="table-wrapper-scroll-y my-custom-scrollbar-content">

    <table class="table table-bordered table-striped mb-0">
    
    
    <tr>
            <td align=center>
				
<table border=0>
<tr>
<?php 
$ii=0;
$query=$dbh->prepare($search_sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
    foreach($results as $result)
    {
        $BookName="$result->BookName";
        $BookId="$result->BookId";
		$ii++;
		

?>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>

				<a href="book.php?bookid=<?php echo htmlentities($BookId);?>">
           
                                
                                <table width=200 height="200">
                                
                                	<tr>
                                		<td align=center width=100 height=150><img width="100%" height="100%" style="display:block;" id="book_image" name="book_image" src="book_image.php?bookid=<?php echo htmlentities($BookId);?>"></td>
                                	</tr>
                                	<tr>
                                	<td align=center><?php echo $BookName;?></td>
                                	</tr>
                                
                                </table>

				</a>
                
</td>



<?php

			if ($ii>3)
			{
			$ii=0;
			?>
            <tr><td colspan="3">&nbsp;&nbsp;</td></tr><tr>
            <?php
			}
 
    }
}
?>

</tr>
</table>





            </td>
    </tr>
    
    </table>        
</div>



</td>
</tr>
</table>



</body>
</html>
<?php } ?>
