<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <!-- <th>Date</th> -->
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            // $select_categories = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_categories)) {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];

            //     echo "<td>{$cat_title}</td>";
            // }

            echo "<td>$user_lastname</td>";

            echo "<td>$user_email</td>";

            // // In Response to

            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            // $select_query_post_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_query_post_id)) {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            echo "<td>$user_role</td>";

            echo "<td><a href='comments.php?approve='</a>Approve</td>";
            echo "<td><a href='comments.php?unapprove='</a>UnApprove</td>";
            echo "<td><a href='comments.php?delete='</a>Delete</td>";
            echo "<tr>";
        }



        ?>

    </tbody>
</table>

<?php

if (isset($_GET['approve'])) {
    $the_comment_approve = $_GET['approve'];
    $query = "UPDATE comments set comment_status = 'approve' WHERE comment_id = $the_comment_approve ";
    $approve_query = mysqli_query($connection, $query);
    header("location: comments.php"); //After clicking delete| reload the same page
}

if (isset($_GET['unapprove'])) {
    $the_comment_unapporve = $_GET['unapprove'];
    $query = "UPDATE comments set comment_status = 'unapprove' WHERE comment_id= $the_comment_unapporve ";
    $unapprove_query = mysqli_query($connection, $query);
    header("location: comments.php"); //After clicking delete| reload the same page
}

// delete post from admin
if (isset($_GET['delete'])) {
    $the_comment_delete = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_delete} ";
    $delete_query = mysqli_query($connection, $query);
    header("location: comments.php"); //After clicking delete| reload the same page
}

?>