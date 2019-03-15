 <?php

?>
<div class="container">
    <div class="info">
        <p>To access the page, please put in the password.</p>
    </div>
    <!-- action sends the form information to the page specified-->
    <form action="index.php?page=<?php echo $wanted_page; ?>" method="POST">
        <div class="field">
            <label class="label">Please enter a password:</label>
            <!-- the input interacts with the action form above by default, password means the text is masked--> 
            <input type="password" name="password" class="input">
            <br>
            <button class="button is-primary">Submit</button>
        </div>
    </form>
</div>
