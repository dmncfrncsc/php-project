
<?php

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  </head>
  <body>
      
      <div class="navbar">
          <a href="#"><img src="img/wangshuinn.png" alt="" class="logoNav"> </a>
          <a href="#" class="logo"> WANGSHU INN</a>
          <ul class="nav">
              <li><a href="#" class="home">Home</a></li>
              <li><a href="#about"class="about">About Us</a></li>
              <li><a href="#rooms"class="rooms">Rooms</a></li>
              <li><a href="booking.php" class="booking">Book Now</a></li>
              <li><a href="login.php"class="login">Logout</a></li>
          </ul>
      </div>
      <div class="banner-area">
          <img src="img/wangshuinn.png" alt="" class="front_image">
          <p class="banner-greet">
              "Redefine your expectations"
          </p>
      </div>
      <div class="aboutus_container" id="about">
              <div class="aboutusimages">
                  <img src="../HTML PROJECT SIR AJ/img/pictureinn.png" alt="" class="img1">
                  <div class="imagerow">
                      <img src="../HTML PROJECT SIR AJ/img/p4.jpg" alt="" class="img2">
                      <img src="../HTML PROJECT SIR AJ/img/p6.jpg" alt="" class="img3">
                  </div>
              </div>
              <div class="aboutustext" id="about">
                  <h1 class="title">ABOUT US</h1>
                  <p class="text-content">
                  An inn that stands at the southern end of Dihua Marsh seems to serve as something other than a resting place for guests. They say that Wangshu Inn is a haven for lovers' moonlit rendezvous. Folk stories also have it that even ones as august as the adepti sometimes bask in the moonlight here. <br><br>
                  As most of the patrons that stop here are traveling merchants, the inn provides an area for them to trade and set up stalls. The view from the top of the inn is jaw-dropping.
                  </p>
              </div>
  
      </div>
      
      <div class="room-area" id="rooms">
          <div class="border">
              <h1 class="roomTitle">ROOMS</h1>
          </div>
  
          <div class="bg-roomarea">
              <div class="room1" id="room1">
                  <div class="room-fade">
                      <div class="info-container">
                          <h6 class="room-category">CLASSIC</h6>
                          <p class="room-info">The Classic Bedroom, with furniture layout inspired on the Knights of Favonius quarters. <br>The Room is made up of several pieces of furniture. A rug, a potted plant with compound leaves, a tall birch wardrobe, a birch vanity, and a bed type that has recently become popular in Mondstadt.</p>
                          <hr class="horizontal">
                      </div>
                  </div>
              </div>  
  
              <div class="room2" id="room2">
                  <div class="room-fade">
                      <div class="info-container-2">
                          <h6 class="room-category-2">DELUXE</h6>
                          <p class="room-info-2">In many aspects, this is a basic and inconspicuous bedroom, similar to others seen at Wangshu Inn. Like the sunshine peeping through the whirling clouds, it will occasionally stir memories in those who pass by. However, it will sweep away the emotions and leave just the traces of what happened in the past.</p>
                          <hr class="horizontal">
                      </div>
                  </div>
              </div> 
  
              <div class="room3" id="room3">
                  <div class="room-fade">
                      <div class="info-container">
                          <h6 class="room-category-3">PREMIUM</h6>
                          <p class="room-info-3">A potted plant in this room balances out the moisture in the space, and the table and shelves release a faint woody aroma that blends with the basic arrangement and the sunset glow of the lights to inspire genius and enhance work.</p>
                          <hr class="horizontal">
                      </div>
                  </div>
              </div>  
              <div class="room4" id="room4">
                  <div class="room-fade">
                      <div class="info-container-2">
                          <h6 class="room-category-4">EXCLUSIVE</h6>
                          <p class="room-info-4">This bedroom has a distinct look, but it also freely incorporates concepts from other countries, establishing a perfect mix between heritage and modernity. The area itself was created to allow people to relax sufficiently so that they feel re-energized, as one does after a lengthy, dreamy sleep, even though they just slept for a brief time.</p>
                          <hr class="horizontal">
                      </div>
                  </div>
              </div> 
              <div class="room5" id="room5">
                  <div class="room-fade">
                      <div class="info-container">
                          <h6 class="room-category-5">ULTRA</h6>
                          <p class="room-info-5">This bedroom features a mix of antique and modern design elements. <br>It is made out of various lighting, a large bed, and a carpet that allows the user to rest.
  </p>
                          <hr class="horizontal">
                      </div>
                  </div>
              </div> 
          </div>
          <form action="booking.php" method="post">
              <button class="btnBookNow"><span class="span">BOOK NOW</span></button>
          </form>
      </div>
      <div class="footer-area">
      
          <img src="img/footer.png" alt="" class="footer-img">
      </div>
  
  </body>
  </html>