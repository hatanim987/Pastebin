<?php
session_start();

if(!isset($_SESSION['success'])){
  header('location: login.php');
  die();
}

require_once('functions.php');


if(isset($_POST['paste'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $pid = $_POST['pid'];



     
    $update = mysqli_query($connection,"UPDATE paste SET title='$title',content='$content' WHERE id='$pid'");

    if($update === TRUE){
        echo '
            <script>
                alert("You Updated Data");
                window.open("index.php","_self");
            </script>
        ';
    }
    else{
        echo '<script>
                alert("Something Went Wrong");
        </script>';
    }
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>PasteBin </title>

        <?php require_once('header.php');   ?>
            <!-- include libraries(jQuery, bootstrap) -->
            <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
            <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

            <!-- include summernote css/js -->
            <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
            <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();
                });
            </script>

    </head>

    <body>
        <?php   require_once('menu.php');  ?>

            <div class="py-5">

                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">

                        <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                            }

                        ?>
                        <?php 
                            $sid = $_SESSION['id'];  
                            $data = mysqli_query($connection,
                                "SELECT p.title,p.content,p.id AS pid FROM users u,paste p WHERE u.id='$sid' AND p.user_id='$sid' AND p.id='$id'");

                                while($result = $data->fetch_assoc()):?>
                      
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required="required" value="<?php echo $result['title'];  ?>">
                            <input type="hidden" name="pid" value="<?php  echo $result['pid']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">New Paste</label>
                            <textarea name="content" class="form-control" id="summernote" rows="10" required="required"><?php echo $result['content'];  ?></textarea>
                        </div>
                    <?php  endwhile;  ?>
                        <div class="form-group">
                            <input type="submit" value="update" class="btn btn-primary" name="paste">
                        </div>
                    </form>
                </div>
            </div>

        
            <!-- FOOTER -->
            <footer class="container">
                <p class="float-right"><a href="#">Back to top</a></p>

            </footer>

    </body>

    </html>