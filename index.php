<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];

}


?>

<div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>
            <li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $i; ?>" <?php if($i==0) {echo 'class="active"';} ?>></li>
            <?php
            $i++;
        }
        ?>
    </ol>

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>
            <div class="item <?php if($i==0) {echo 'active';} ?>" style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>); background-repeat: no-repeat;background-size: 100% 500px;">
                <div class="bs-slider-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="slide-text <?php if($row['position'] == 'Left') {echo 'slide_style_left';} elseif($row['position'] == 'Center') {echo 'slide_style_center';} elseif($row['position'] == 'Right') {echo 'slide_style_right';} ?>">
                            <h1 data-animation="animated <?php if($row['position'] == 'Left') {echo 'zoomInLeft';} elseif($row['position'] == 'Center') {echo 'flipInX';} elseif($row['position'] == 'Right') {echo 'zoomInRight';} ?>"><?php echo $row['heading']; ?></h1>
                            <p data-animation="animated <?php if($row['position'] == 'Left') {echo 'fadeInLeft';} elseif($row['position'] == 'Center') {echo 'fadeInDown';} elseif($row['position'] == 'Right') {echo 'fadeInRight';} ?>"><?php echo nl2br($row['content']); ?></p>
                            <a href="<?php echo $row['button_url']; ?>" target="_blank"  class="btn btn-primary" data-animation="animated <?php if($row['position'] == 'Left') {echo 'fadeInLeft';} elseif($row['position'] == 'Center') {echo 'fadeInDown';} elseif($row['position'] == 'Right') {echo 'fadeInRight';} ?>"><?php echo $row['button_text']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>

    <!-- Slider Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <!-- Slider Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
<div class="product pt_50 pb_50">
    <div class="container">

                <nav1 class="row">
      <a class="icon" href="product-category.php?id=7&type=top-category"><img height="80" src="assets/img/cat_2.jpg" alt=""></a>
      <a class="icon" href="product-category.php?id=8&type=top-category"><img height="80" src="assets/img/cat_1.jpg" alt=""></a>
      <a class="icon" href="product-category.php?id=9&type=top-category"><img height="80" src="assets/img/cat_3.jpg" alt=""></a>
      <a class="icon" href="product-category.php?id=10&type=top-category"><img height="80" src="assets/img/cat_4.jpg" alt=""></a>
      <a class="icon" href="product-category.php?id=11&type=top-category"><img height="80" src="assets/img/cat_5.jpg" alt=""></a>
      <a class="icon" href="product-category.php?id=12&type=top-category"><img height="80" src="assets/img/cat_6.jpg" alt=""></a>
   </nav1>
   
</div>
</div>

<?php if($home_service_on_off == 1): ?>
<div class="service bg-gray">
    <div class="container">
        <div class="row">
            <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_service");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    ?>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="photo"><img src="assets/uploads/<?php echo $row['photo']; ?>" width="150px" alt="<?php echo $row['title']; ?>"></div>
                            <h3><?php echo $row['title']; ?></h3>
                            <p>
                                <?php echo nl2br($row['content']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>

            </div>
<?php if($home_featured_product_on_off == 1): ?>
<div class="product pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2><?php echo $featured_product_title; ?></h2>
                    <h3><?php echo $featured_product_subtitle; ?></h3>
                </div>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">
                    
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product INNER JOIN tbl_end_category ON tbl_product.ecat_id=tbl_end_category.ecat_id WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>

        <div class="product-card">
	    	<div class="badge">Featured</div>
		    <a href="product.php?id=<?php echo $row['p_id']; ?>"><div class="product-tumb">
		    	<img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="">
		    </div>
		    <div class="product-details">
			<span class="product-catagory"><?php echo $row['ecat_name']; ?></span>
			<h4><?php echo $row['p_name']; ?></a></h4>
			<div class="product-bottom-details">
				<div class="product-price"><?php if($row['p_old_price'] != ''): ?>
                                    <small>
                                        Rs.<?php echo $row['p_old_price']; ?>
                </small>
                                    <?php endif; ?>Rs.<?php echo $row['p_current_price']; ?></div>
			
			</div>
		    </div>
	</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($home_latest_product_on_off == 1): ?>
<div class="product bg-gray pt_70 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2><?php echo $latest_product_title; ?></h2>
                    <h3><?php echo $latest_product_subtitle; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">

                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product INNER JOIN tbl_end_category ON tbl_product.ecat_id=tbl_end_category.ecat_id WHERE p_is_active=? ORDER BY p_id DESC LIMIT ".$total_latest_product_home);
                    $statement->execute(array(1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                    
                        <div class="product-card">
	                        	<div class="badge">Latest</div>
		                      <a href="product.php?id=<?php echo $row['p_id']; ?>"><div class="product-tumb">
		                	<img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="">
		    </div>
		    <div class="product-details">
			<span class="product-catagory"><?php echo $row['ecat_name']; ?></span>
			<h4><?php echo $row['p_name']; ?></a></h4>
			<div class="product-bottom-details">
				<div class="product-price"><?php if($row['p_old_price'] != ''): ?>
                                    <small>
                                        Rs.<?php echo $row['p_old_price']; ?>
                </small>
                                    <?php endif; ?>Rs.<?php echo $row['p_current_price']; ?></div>
			
			</div>
		    </div>
	</div>

                        <?php
                    }
                    ?>

                </div>


            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($home_popular_product_on_off == 1): ?>
<div class="product pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2><?php echo $popular_product_title; ?></h2>
                    <h3><?php echo $popular_product_subtitle; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">

                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product INNER JOIN tbl_end_category ON tbl_product.ecat_id=tbl_end_category.ecat_id WHERE p_is_active=? ORDER BY p_total_view DESC LIMIT ".$total_popular_product_home);
                    $statement->execute(array(1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
                        
        <div class="product-card">
	    	<div class="badge">Popular</div>
		    <a href="product.php?id=<?php echo $row['p_id']; ?>"><div class="product-tumb">
		    	<img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="">
		    </div>
		    <div class="product-details">
			<span class="product-catagory"><?php echo $row['ecat_name']; ?></span>
			<h4><?php echo $row['p_name']; ?></a></h4>
			<div class="product-bottom-details">
				<div class="product-price"><?php if($row['p_old_price'] != ''): ?>
                                    <small>
                                        Rs.<?php echo $row['p_old_price']; ?>
                </small>
                                    <?php endif; ?>Rs.<?php echo $row['p_current_price']; ?></div>
			
			</div>
		    </div>
	</div>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>




<?php require_once('footer.php'); ?>

<style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700');


.product-card {
  font-family: 'Roboto', sans-serif;
    width: 300px;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin: 50px auto;
    background: #fafafa;
}

.badge {
    position: absolute;
    left: 0;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    padding: 50px;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 30px;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #1c9ad5;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #1c9ad5;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #1c9ad5;
}
        </style>