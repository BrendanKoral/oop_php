<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>

        <?php

        $custom_query = "SELECT * FROM users";

        $result = $database->query($custom_query);

        $user_found = mysqli_fetch_array($result);

        echo $user_found['username'];

        $user = new User();

        $result_set = $user->find_all_users();

        while ( $row = mysqli_fetch_array($result_set) ) {

            echo $row['username'] . "<br>";

        }


        ?>


        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->