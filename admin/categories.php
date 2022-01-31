 <?php include "includes/header.php" ?>

 <div id="wrapper">

     <?php include "includes/navigation.php" ?>

     <div id="page-wrapper">

         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="row">
                 <div class="col-lg-12">
                     <h1 class="page-header">
                         Welcome to Admin Page
                         <small>Author</small>
                     </h1>

                     <div class="col-xs-6">
                         <form action="">
                             <div class="form-group">
                                 <label for="cat-title">Category Name</label>
                                 <input type="text" class="form-control" name="cat_title">
                             </div>
                             <div class="form-group">
                                 <input type="submit" name = "submit" value="Add Category" class="btn btn-primary">
                             </div>
                         </form>
                     </div> <!-- category form -->
                     <div class="col-xs-6">
                         <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Category</th>
                                 </tr>
                                 
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>baseball category</td>
                                     <td>baskatball category</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>

                 </div>
             </div>
             <!-- /.row -->

         </div>
         <!-- /.container-fluid -->

     </div>
     <!-- /#page-wrapper -->

 </div>

 <?php include "includes/footer.php" ?>