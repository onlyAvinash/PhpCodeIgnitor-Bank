<script>
    
</script>

  <div class="cont">
    <?php
    include('Navbar.php');
    ?>
<center><h1>Withdraw Account Page</h1></center><hr>
<br><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

<form>
<div class="row">
        <div class="col">
    Enter Account number
    <input type="text" name="ac" class="form-control">
</div>
</div>
<br>
    
<div class="row">
        <div class="col">
    Enter Pin number
    <input type="text" name="p" class="form-control">
</div>
</div>
<br>
<div class="row">
        <div class="col">
    Enter Amount to Withdraw
    <input type="text" name="a" class="form-control">
</div>
</div>


<br><br>
<div class="row">
        <div class="col">
    <input type="button" name="submit" class="btn btn-info" value="Withdarw" onclick="withdraw(this.form)">
</div>
</div>

</form>
<br><br>
</div>
    
</div>


 