<!DOCTYPE html>
<html lang="en">
    

    <head>
        <!-- Define character encoding -->
        <meta charset="utf-8">
        <!-- Define title-->
        <title>Louis de Thanhoffer de Volcsey</title>
        <!--Import Bulma CSS Framework-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.4/css/bulma.css">
        <!-- Import custom CSS  -->
        <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
        <link rel="stylesheet" href="assets/styles/theorems.css" type="text/css">
        <!-- Import Font Awesome icons -->
        <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css"> 
        <!-- Import Researchgate icon separately -->
        <link rel="stylesheet" href="assets/fonts/academicons/css/academicons.min.css"> 
        <!-- Import MathJax -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-MML-AM_CHTML%2CSafe.js&amp;ver=4.8"></script> 
        <!--Import JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- make text expandable-->
        <script src="assets/scripts/toggle.js"></script> 
        <!--make sidebar expandable-->
        <script src="assets/scripts/toggle-menu.js"></script> 
        <!-- Import Google Analytics -->
        <?php include_once("analyticstracking.php") ?>
    </head>
   

    <body>
        <!--include navigation bar -->
        <?php include('snippets/navigation.html') ?>

        <!-- include the content -->
        <div class="frame"> <!--name the div "frame" since "container" and "box" are already used by Bulma-->
            <?php
                // extract GET request from URL and construct php associative array (ie key-value pairs):
                $query_parameters = $_GET;
                
                // extract the php page as a variable
                // if the query parameters do not contain a php page, set it as main.php
                if (!isset($query_parameters['page'])) { 
                    $page = "main";
                }
                else {
                    $page = $query_parameters["page"];
                    // undeclare it in order to remove it from the directory path
                    unset($query_parameters["page"]);
                }

                // use the query parameters to obtain the path within our directory to point to the desired page:
                // declare the root of the path:
                $path = "pages";
                $path_parameters = $query_parameters;
                // loop through each key-value pair in the path parameters to get the values and form the path
                foreach($path_parameters as $key => $query_parameter) {
                    $path = $path . '/' . $query_parameter;
                }

                // finally, include the page: 
                include($path . '/' . $page . '.php');
            ?>
        </div>
        
        <!-- include footer-->
        <?php include('snippets/footer.html') ?>
    </body>


</html>
