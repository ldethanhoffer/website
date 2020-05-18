<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- define the character encoding -->
        <meta charset="utf-8">
        <!-- Include title-->
        <title>Louis de Thanhoffer de Volcsey</title>
        <!--Include Bulma CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.4/css/bulma.css">
        <!-- Include custom CSS  -->
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
        <link rel="stylesheet" href="assets/styles/theorems.css" type="text/css">
        <!-- include Font Awesome icons -->
        <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css"> 
        <!-- include Researchgate icon separately -->
        <link rel="stylesheet" href="assets/fonts/academicons/css/academicons.min.css"> 
        <!-- include MathJax -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-MML-AM_CHTML%2CSafe.js&amp;ver=4.8"></script> 
        <!--include Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- make text expandable-->
        <script src="assets/scripts/toggle.js"></script> 
        <!--make sidebar expandable-->
        <script src="assets/scripts/toggle-menu.js"></script> 
        <!-- Include Google Analytics -->
        <?php include_once("analyticstracking.php") ?>
    </head>
    <body>
        <!--include the navigation bar -->
        <?php include('snippets/navigation.html') ?>
        <!-- include the content -->
        <div class="frame"> <!--name the div "frame" since "container" and "box" are already used by Bulma-->
            <?php
            /* extract GET requests from URL and set them to index.php variables*/
            extract($_GET);
            /* if no get request is made: display main*/
            $page = (is_null($page)) ? 'main' : $page;
            /* else */
            $include_path = 'pages/';
            if (isset($node_1)) {
              $include_path .= $node_1 . '/';
            }
            if (isset($node_2)) {
              $include_path .= $node_2 . '/';
            }
            $include_path .= $page . '.php';
            include($include_path);
            ?>
        </div>
        <!-- include footer-->
        <?php include('snippets/footer.html') ?>
    </body>
</html>
