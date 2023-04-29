<?php 
    include_once('../views/components/header.php');
?>
<form action="" method="POST">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="subject" placeholder="subject">
    <textarea name="message" placeholder="message"></textarea>
    <button type="submit" name="btnSubmit">Submit</button>
</form>
<?php 
    include_once('../views/components/footer.php');
?>