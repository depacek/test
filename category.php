  <?php
    require_once "header.php";
    $news->set('category_id',$_GET['category_id']);
    $pages=1;
    if (isset($_GET['page'])) {
      $pages=$_GET['page'];
      }
      $offset=($pages-1)*3;
    $totalnews=count($news->getTotalNewsByCategory());
    echo $totalnews;
    $cnews=$news->getNewsByCategory($offset);
  ?>
<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
             <ul class="spost_nav">
             	<?php foreach ($cnews as $cn) {?>
                <li>
                  <div class="media wow fadeInDown"> <a href="news.php?id=<?php echo $cn->id; ?>&&category_id=<?php echo $cn->category_id; ?>" class="media-left"> <img alt="" src="admin/images/<?php echo $cn->feature_image; ?>"> </a>
                    <div class="media-body"> <a href="news.php?id=<?php echo $cn->id; ?>&&category_id=<?php echo $cn->category_id; ?>" class="catg_title"><?php echo $cn->title; ?></a> </div>
                  </div>
                </li>
            <?php } ?>
            </ul>
        </div>
         <?php for ($i=0; $i < ceil($totalnews/3); $i++) { ?>
             <button><a href="category.php?category_id=<?php echo $_GET['category_id']; ?>&page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></button> 
           <?php } ?>
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

<?php require_once "footer.php"; ?>