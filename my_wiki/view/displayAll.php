<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Yoga</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="view\css\bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="view\css\style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="view\css\responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="view\css\jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>

      <div class="header_section">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html"><img src=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="upcoming-treks.html">Upcoming Treks</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="classes.html">Classes</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="blog.html">Blog</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Contact</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="login_bt">
                     <ul>
                        <li>Bookings Open</li>
                        <li><a href="#">1800 8888 5555</a></li>
                     </ul>
                  </div>
               </form>
            </div>
         </nav>

       
       
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="about_taital">About our plateforme</div>
               </div>
            </div>
         </div>
         <div class="about_section_2">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="about_img"><img src="https://tse3.mm.bing.net/th?id=OIP.lJ8CyqKZBg7oCZ5RuT2onAHaHG&pid=Api&P=0&h=180"></div>
                  </div>
                  <div class="col-md-6">
                     <div class="about_taital_main">
                        <div class="yoga_taital">Best wikis </div>
                        <p class="about_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi utipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>
                        <div class="read_bt"><a href="#">Read More</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- classes section start -->
      <div class="classes_section layout_padding">
         <div class="container">
            <div class="classes_border">
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="classes_taital">Our wikis</h1>
                     <p class="classes_text">use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassined </p>
                  </div>
               </div>
               <div class="classes_section_2">
                  <div class="row">
                  <?php foreach ($wikis as $wiki) : ?>

                     <div class="col-md-6">
                        <div class="classes_img"><img src=""></div>
                        <h3 class="astanga_taital"><?= $wiki->getTitle(); ?></h3>
                        <p class="astanga_text"><?= $wiki->getContent(); ?></p>
                        <h4 class="astanga_taital"><?= $wiki->getCreatedAt(); ?></h4>
                        <div class="read_btn"><a href="index.php?action=wikiDetails&id=<?= $wiki->getWikiId() ?>">Read More</a></div>
                     </div>
                     

                     <?php endforeach; ?>
      
   
                  </div>
               </div>
        
            </div>
         </div>
      </div>
      <!-- classes section end -->
      <!-- customers section start -->
    
      <!-- customers section end -->
      <!-- blog section start -->
      <div class="blog_section layout_padding">

         <div style="margin-top: 100px;" class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="blog_taital">latest categories</h1>
               </div>
            </div>
            <div class="blog_section_2">
               <div class="row">
               <?php foreach ($categories as $category) : ?>

                  <div class="col-md-4">

                     <div class="blog_box">
                        <div class="blog_img"><img src="images/img-3.png"></div>
                        <div class="blog_taital_main">
                           <p class="yoga_text"><?= $category->getCategoryId(); ?></p>
                           <h3 class="practising_taital"><?= $category->getName(); ?></h3>
                           <p class="blog_text">in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage</p>
                           <h3 class="practising_taital"><?= $category->getCreatedAt(); ?></h3>

                           <div class="date_btn"><a href="#">view</a></div>
                        </div>
                     </div>
                     </div>
                     <?php endforeach; ?>

               </div>
            </div>
         </div>


      </div>

      

      <div class="blog_section layout_padding">

      <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="blog_taital">latest tags</h1>
               </div>
            </div>
            <div class="blog_section_2">
               <div class="row">




               <?php foreach ($tags as $tag) : ?>

                  <div class="col-md-4">

                     <div class="blog_box">
                        <div class="blog_img"><img src="images/img-3.png"></div>
                        <div class="blog_taital_main">
                           <h3 class="practising_taital"><?= $tag->getTagName(); ?></h3>
                           <h3 class="practising_taital"><?= $tag->getCreatedAt(); ?></h3>

                           <div class="date_btn"><a href="#">view</a></div>
                        </div>
                     </div>
                     </div>
                     <?php endforeach; ?>

               </div>
            </div>
         </div>
      </div>
     
      <!-- blog section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">About</h2>
                     <p class="dummy_text">2593 Timbercrest Road, Chisana, Alaska Badalas United State</p>
                     <div class="location_text"><a href="#">(+91)01234567890</a></div>
                     <div class="location_text"><a href="#">demo@demo.com</a></div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Our Products</h2>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="#">Bestsellers</a></li>
                           <li><a href="#">New In</a></li>
                           <li><a href="#">Chairs</a></li>
                           <li><a href="#">Sofas</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Useful link</h2>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="about.html">About Us</a></li>
                           <li><a href="blog.html">Blog</a></li>
                           <li><a href="classes.html">Classes</a></li>
                           <li><a href="contact.html">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Newsletter Signup</h2>
                     <div class="form-group">
                        <textarea class="update_mail" placeholder="Enter Your Email" rows="5" id="comment" name="Enter Your Email"></textarea>
                        <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                     </div>
                     <div class="social_icon">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2023 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a> Distribution by <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
   </body>
</html>
