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

            echo "<td><a href='users.php?change_to_admin={$user_id}'</a>Admin</td>";
            echo "<td><a href='users.php?change_to_sub={$user_id}'</a>Subcriber</td>";
            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'</a>Edit</td>";
            echo "<td><a href='users.php?delete={$user_id}'</a>Delete</td>";
            echo "<tr>";
        }



        ?>

    </tbody>
</table>

<?php

if (isset($_GET['change_to_admin'])) {
    $the_user_admin = $_GET['change_to_admin'];
    $query = "UPDATE users set user_role = 'Admin' WHERE user_id = $the_user_admin ";
    $change_to_admin_query = mysqli_query($connection, $query);
    header("location: users.php"); //After clicking delete| reload the same page
}

if (isset($_GET['change_to_sub'])) {
    $the_user_sub = $_GET['change_to_sub'];
    $query = "UPDATE users set user_role = 'Subcriber' WHERE user_id= $the_user_sub ";
    $change_to_sub_query = mysqli_query($connection, $query);
    header("location: users.php"); //After clicking delete| reload the same page
}

// delete post from admin
if (isset($_GET['delete'])) {
    $the_user_delete = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_delete} ";
    $delete_query = mysqli_query($connection, $query);
    header("location: users.php"); //After clicking delete| reload the same page
}

?>