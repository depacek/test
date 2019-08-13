<?php
require_once "header.php";
$news->set('id',$_GET['id']);
$newsdata=$news->getNewsInId();
$news->set('category_id',$_GET['category_id']);
// print_r($newsdata);
$comment->set('news_id',$_GET['id']);

  if (isset($_POST['btnComment'])&& !empty($_POST['btnComment'])) {
      $comment->set('name',$_POST['name']);
      $comment->set('email',$_POST['email']);
      $comment->set('comment',$_POST['comment']);
      $comment->set('commented_date',date('Y-m-d H:i:s'));
      $status=$comment->create();
    }
    $commentlist=$comment->getCommentByNewsID();
    // print_r($commentlist);
    $cnews=$news->getNewsByCategory(0);
    // print_r($cnews);
    ?>
<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="../index.html">Home</a></li>
              <li class="active"><?php echo $newsdata[0]->cname; ?></li>
            </ol>
            <?php   if (isset($status) && !empty($status)) {?>
             <div class="alert alert-success"><?php echo 'comment inserted';?></div>
           <?php  }else if (isset($status) && $status==false){?>
            <div class="alert alert-danger"><?php echo 'comment is not inserted';?></div>
          <?php }?>
            <h1><?php echo $newsdata[0]->title; ?></h1>
            <div class="post_commentbox"> <a href=""><i class="fa fa-user"></i><?php echo $newsdata[0]->aname; ?></a> <span><i class="fa fa-calendar"></i><?php echo $newsdata[0]->created_date; ?></span> <a href="#"><i class="fa fa-tags"></i><?php echo $newsdata[0]->cname; ?></a> </div>
            <div class="single_page_content"> <img class="img-center" src="admin/images/<?php echo $newsdata[0]->feature_image; ?>" alt="">
              <p><?php echo $newsdata[0]->short_description; ?></p>
              <blockquote><?php echo $newsdata[0]->description; ?> </blockquote>
             
              
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
              <div>
                <ul>
                  <?php  foreach ($commentlist as $cl) { ?>
                <li><?php echo $cl->comment; ?></li>
              <?php } ?>
              </ul>
              </div>
            </div>
            
              
               <div class="row" >
              <form action="" method="post" class="contact_form">
              <input class="form-control" type="text" placeholder="Name*" name="name">
              <input class="form-control" type="email" placeholder="Email*" name="email">
              <textarea class="form-control" cols="30" rows="10" placeholder="comment*" name="comment"></textarea>
              <input type="submit" name="btnComment" value="Comment">
            </form>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                <?php foreach ($cnews as $cns) { ?>
                  
                
                <li>
                  <div class="media"> <a class="media-left" href="news.php?id=<?php echo $cns->id; ?>&&category_id=<?php echo $cns->category_id; ?>"> <img src="admin/images/<?php echo $cns->feature_image; ?>" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="news.php?id=<?php echo $cns->id; ?>&&category_id=<?php echo $cns->category_id; ?>"> <?php echo $cns->title; ?></a> </div>
                  </div>
                </li>
              <?php } ?>
                <!-- <li>
                  <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img2.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.html"> <img src="../images/post_img1.jpg" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html"> Aliquam malesuada diam eget turpis varius</a> </div>
                  </div>
                </li> -->
              </ul>
            </div>
          </div>
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

<?php
require_once "footer.php"
?>