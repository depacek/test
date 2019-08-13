<?php
  require_once "header.php";
?>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
            <?php foreach ($latestNews as $latest) { ?>

          <div class="single_iteam"> <a href="news.php?id=<?php echo $latest->id; ?>&&category_id=<?php echo $latest->category_id; ?>"> <img src="admin/images/<?php echo $latest->feature_image; ?> " alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="news.php?id=<?php echo $latest->id; ?>&&category_id=<?php echo $latest->category_id; ?>"><?php echo $latest->title; ?></a></h2>
              <p><?php echo $latest->short_description; ?></p>
            </div>
          </div>
          <?php  }?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Breaking News</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <?php foreach ($breakingNews as $breaking) { ?>
              <li>
               <div class="media"> <a href="news.php?id=<?php echo $breaking->id; ?>&&category_id=<?php echo $breaking->category_id; ?>" class="media-left"> <img alt="" src="admin/images/<?php echo $breaking->feature_image; ?>"> </a>
                  <div class="media-body"> <a href="news.php?id=<?php echo $breaking->id; ?>&&category_id=<?php echo $breaking->category_id; ?>" class="catg_title"><?php echo $breaking->title; ?></a> </div>
                </div>
              </li>
            <?php } ?>
              
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <?php foreach ($menus as $mun) {
            $news->set('category_id',$mun->id);
            $catnews=$news->getLatestNewsByCategory();
           ?>

          <div class="single_post_content">
            <h2><span><?php echo $mun->name; ?></span></h2>
            <div class="single_post_content_left">
              <?php if (count($catnews)>0) {?>
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="admin/images/<?php echo $catnews[0]->feature_image; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html"><?php echo $catnews[0]->title; ?></a> </figcaption>
                    <p><?php echo $catnews[0]->short_description; ?></p>
                  </figure>
                </li>
              </ul>
              <?php unset($catnews[0]); ?>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <?php foreach ($catnews as $cn) {?>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="admin/images/<?php echo $cn->feature_image; ?>"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> <?php echo $cn->title; ?></a> </div>
                  </div>
                </li>
              <?php } ?>
                
              </ul>
            </div>
          <?php } else{?>
            <div class="alert alert-danger">News not available  for <?php echo $mun->name ?></div>
          <?php } ?>
          </div>
          <?php } ?>
        
        </div>
      </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Feature News</span></h2>
            <ul class="spost_nav">
              <?php foreach ($featureNews as $feature) {?>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="admin/images/<?php echo $feature->feature_image;?>"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"><?php echo $feature->title; ?></a> </div>
                </div>
              </li>
              <?php }?>
             
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  <?php foreach ($menus as $menu) { ?>
          <li class="cat-item"><a href="category.php?category_id=<?php echo $menu->id; ?>"><?php echo $menu->name; ?></a></li>  
          <?php } ?>          
                    <!-- li class="cat-item"><a href="#">Sports</a></li>
                  <li class="cat-item"><a href="#">Fashion</a></li>
                  <li class="cat-item"><a href="#">Business</a></li>
                  <li class="cat-item"><a href="#">Technology</a></li>
                  <li class="cat-item"><a href="#">Games</a></li>
                  <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                  <li class="cat-item"><a href="#">Photography</a></li> -->
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <?php foreach ($comments as $coment) { ?>
                  <li>
                    <div class="media wow fadeInDown"> <!-- <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a> -->
                      <div class="media-body"> <a href="" class="catg_title"> <?php echo $coment->comment; ?></a> </div>
                    </div>
                  </li>
                <?php } ?>
                  <!-- <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
               <?php foreach ($menus as $menu) { ?>
          <option><!-- <a href="category.php?category_id=<?php echo $menu->id; ?>"> --><?php echo $menu->name; ?></a></option>  
          <?php } ?>
              <!-- <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option> -->
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
<?php require_once "footer.php"; ?>