<?php
if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValuId) {
        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValuId} ";
                $update_to_publish_status = mysqli_query($connection, $query);
                confirmQuery($update_to_publish_status);
                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValuId} ";
                $update_to_draft_status = mysqli_query($connection, $query);
                confirmQuery($update_to_draft_status);
                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$postValuId} ";
                $update_to_delete_status = mysqli_query($connection, $query);
                confirmQuery($update_to_delete_status);
                break;
        }
    }
}

?>
<form action="" method="POST">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>

        <thead>
            <tr>
                <th><input id="CheckAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Content</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = "SELECT * FROM posts";
            $select_post = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];

                echo "<tr>";
            ?>

                <td><input class='CheckBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>

            <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $select_categories = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<td>{$cat_title}</td>";
                }

                echo "<td>$post_status</td>";
                echo "<td><img width= '100' src = '../images/$post_image'></td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_content</td>";
                echo "<td>$post_comment_count</td>";
                echo "<td>$post_date</td>";
                echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'</a>Show</td>";
                echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'</a>Edit</td>";
                echo "<td><a class='btn btn-danger' href='posts.php?delete={$post_id}'</a>Delete</td>";
                echo "<tr>";
            }



            ?>

        </tbody>
    </table>
</form>

<?php // delete post from admin
if (isset($_GET['delete'])) {
    $the_post_delete = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_delete} ";
    $delete_query = mysqli_query($connection, $query);
    header("location: posts.php"); //After clicking delete| reload the same page
}

?>