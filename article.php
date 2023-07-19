<?php

$con = mysqli_connect("localhost:3325", "root", "", "thewebsite");
if(isset($_POST['upload'])){
    $TITLE =  $_POST['TITLE'];
    $file = $_FILES['image']['name'];
    $DETAILS =  $_POST['DETAILS'];
    $query  = "INSERT INTO article(TITLE, image,DETAILS) VALUES('$TITLE','$file', '$DETAILS')";
    


    $res = mysqli_query($con,$query);

    if($res){
        move_uploaded_file($_FILES['image']['tmp_name'],"$file");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- /TO PUT CSS IN PHP -->
    <?php
        	$url = "style.css";
        	echo "<link rel='stylesheet' href='path_to_css_file'>";
         ?> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="css/phone.css">
    <title>Display Page</title>
</head>
<body>
<div>
        <!-- <h1>enter the details(FLAT_BUY)</h1>
        <form action = "FLAT_BUY.php"  class="text-center" method="post" enctype="multipart/form-data">
            <input type="file" name = "image" class="form-control">
            <input type="submit" name="upload" value="UPLOAD" class="btnbtn-success">
            <div class="form-group">
                <label for="details">DETAILS: </label>
                <textarea name="DETAILS" id="details" cols="99" rows="30"></textarea>
            </div>
        </form>
        <a href="displaypage.html" target="_blank">next</a>
    </div> -->
    <div class="heading">
    <h1>ARTICLES</h1>
    </div>
    <div class="btn">
    <button ><a href="article_form.html">Submit your articles</a></button> 
    </div>
   
    
    <!-- <section class="container">
        <form action="">
            <i class = "fas fa-search"> </i>
            <input type="text" name ="" id="search-item" placeholder = "Search Places" onkeyup = "search()">
        </form>
    </section> -->
    <?php
    $sel = "SELECT * FROM article";
    $que = mysqli_query($con,$sel);
    


    $output = "";
    if(mysqli_num_rows($que) < 1){
        $output .= " <h3 class='text-center'>no image uploaded</h3>";
    }
    $output .= "<div style= 'display:flex;align-items:center;justify-content:center;flex-direction:column'>" ;
    while($row = mysqli_fetch_array($que)){
        $output .=  "<h2 class='title' 
        style = ' display: flex;
        align-items: center;
        justify-content: center;
        padding: 0rem;
        padding-block-start:0rem';
         >".$row['TITLE']."</h2>" ;

        $output .= "<img src='".$row['IMAGE']."' class = 'photos'
        style = 'width:400px;height:329px; align-items: center;
        display: flex;
        justify-content: center;
        border-radius: 30px;
        display: block;
        padding: 0px;
       
        
       '>";
        $output .=  "<h2 class='details' 
        style = ' display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem;
        padding-block-start:0rem';
         >".$row['DETAILS']."</h2>" ;
    }
    $output .= "</div>";
    echo $output;
    ?>
 
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
    
</body>
</html>

