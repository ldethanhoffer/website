<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--Include the Bulma CSS framework-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.4/css/bulma.css">
        <!-- Include the CSS styling  -->
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
        <link rel="stylesheet" href="assets/styles/theorems.css" type="text/css">
        <!-- include icons -->
        <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css"> 
        <!-- include the Researchgate icon separately -->
        <link rel="stylesheet" href="assets/fonts/academicons/css/academicons.min.css"> 
        <!-- include mathjax -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-MML-AM_CHTML%2CSafe.js&amp;ver=4.8"></script> 
        <!--include Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- make text expandable-->
        <script src="assets/scripts/toggle.js"></script> 
        <!--make sidebar expandable-->
        <script src="assets/scripts/toggle-menu.js"></script> 
        <!-- Include Google Analytics -->
        <?php include_once("analyticstracking.php") ?>
        <!-- Give the website a title-->
        <title>Louis de Thanhoffer de Volcsey</title>
    </head>
    <body>
        <?php 
            include('snippets/navigation.html');
        ?>
        <div class="frame"> <!--name the class frame since container and box are already used by Bulma-->
            <?php
            extract($_GET); /* get all GET variables from url and set them to index.php variables*/
            
            $page = (is_null($page)) ? 'main' : $page; /* if no get request is made: display main*/

            // check the page is protected and the password wasnt entered correctly:
            if (!$_SESSION['allowed'] && strpos($page, 'protected-') === 0) {
                $wanted_page = $page;
                $page = 'password_form';
            }

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
        <?php
            include('snippets/footer.html');
        ?>
    </body>
</html>
