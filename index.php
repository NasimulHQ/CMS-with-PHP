<!-- db connection -->
<?php include ("includes/db.php") ?>

<!-- Header include -->
<?php include ("includes/header.php") ?>

 <!-- Navigation include -->
 <?php include ("includes/navigation.php") ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- post data bringing up here -->
                <?php 
               $query = "SELECT * FROM posts";
               $select_all_posts_query = mysqli_query($connection, $query);
               while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>

                <h1 class="page-header">
                Page Heading
               <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

              <?php } ?>
                

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

    <!-- sidebar include        -->
    <?php include ("includes/sidebar.php") ?>

        </div>
        <!-- /.row -->

        <hr>

   <!-- footer  include     -->
   <?php include ("includes/footer.php") ?>