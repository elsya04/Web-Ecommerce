<?php 

    $active='Details';

    include("includes/header.php");

?>

    <div id="content">
        <!-- content Begin -->
        <div class="container">
            <!-- container Begin -->
            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <ul class="breadcrumb">
                    <!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
                    </li>
                    <li> <?php echo $pro_title; ?> </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->
            <div class="col-md-3">
                <!-- col-md-3 Begin -->
                <?php include("includes/sidebar.php");  ?>
            </div><!-- col-md-3 Finish -->

            <div class="col-md-9">
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                    </div>
                                </div>

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon ghlyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a><!-- left carousel-control Finish -->

                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon ghlyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a><!-- right carousel-control Finish -->

                            </div><!-- carousel slide Finish -->
                        </div><!-- mainImage Finish -->
                    </div><!-- col-sm-6 Finish -->

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"> <?php $pro_title; ?> </h1>

                            <?php add_cart(); ?>

                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>

                                    <div class="col-md-7">
                                        <select name="product_qty" id="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div><!-- col-md-7 Finish -->

                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->
                                    <label class="col-md-5 control-label">Product Size</label>

                                    <div class="col-md-7">

                                        <select name="product_size" id="" class="form-control" required oninput="setCustomValidity('')"
                                        oninvalid="setCustomValidity('Must pick 1 size for the product')" >

                                            <option disabled selected>Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>

                                        </select><!-- fform-control Finish -->

                                    </div><!-- col-md-7 Finish -->
                                </div><!-- form-group Finish -->

                                <p class="price"> <?php echo "$".$pro_price; ?> </p>

                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart">Add to cart</button></p>

                            </form><!-- form-horizontal Finish -->

                        </div><!-- box Finish -->

                        <div class="row" id="thumbs">

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->

                        </div><!-- #thumbs Finish -->

                    </div><!-- col-sm-6 Finish -->

                </div><!-- row Finish -->

                <div class="box" id="details">

                    <h4>Product Details</h4>

                    <p>
                        <?php $pro_desc; ?> 
                    </p>

                    <h4>Size</h4>

                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>

                    <hr>

                </div><!-- box Finish -->

                <div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">Products You Maybe Like</h3>
                        </div><!-- box same-height headline Finish -->
                    </div><!-- col-md-3 col-sm-6 Finish -->

                    <?php 
                    
                    $get_products = "select * from products order by rand() LIMIT 0,3";

                    $run_products = mysqli_query($con,$get_products);

                    while($row_products=mysqli_fetch_array($run_products)){

                        $pro_id = $row_products['product_id'];

                        $pro_title = $row_products['product_title'];

                        $pro_img1 = $row_products['product_img1'];

                        $pro_price = $row_products['product_price'];

                        echo "
                        
                            <div class='col-md-3 col-sm-6 center-responsive'>
                            
                                <div class='product same-height'>
                                
                                    <a href='details.php?pro_id=$pro_id'>
                                    
                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                    
                                    </a>

                                    <div class='text'>
                                    
                                        <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                    
                                        <p class='price'> $ $pro_price </p>

                                    </div>
                                
                                </div>
                            
                            </div>
                        
                        ";

                    }
                    
                    ?>

                </div><!-- row same-height-row Finish -->

            </div><!-- col-md-9 Finish -->

        </div><!-- container Finish -->
    </div><!-- content Finish -->

    <?php include("includes/footer.php");  ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>

</html>