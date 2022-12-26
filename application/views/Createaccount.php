<script>
          


</script>

<?php
  include('Navbar.php');
  ?>

  <center><h1 class="display-6">Create Your Account</h1></center><hr><br>
  <div class="container">
    <div class="row">
            <form>
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                Enter Pin
                <input type="text" name="p" class="form-control">
                </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2"></div>
                <div class="col-md-4">
                Enter Name
                <input type="text" name="n" class="form-control">
                </div>
                <div class="col-md-4">
                Enter Father Name
                <input type="text" name="f" class="form-control">
                </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2"></div>
                <div class="col-md-4">
                Enter E-mail
                <input type="text" name="e" class="form-control">
                </div>
                <div class="col-md-4">
                Enter Phone No.
                <input type="text" name="ph" class="form-control" placeholder="+91">
                </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        Enter Gender: <br><br>
                        <input type="radio" name="g" value="Male">Male &emsp;
                        <input type="radio" name="g" value="Female">Women &emsp;
                        <input type="radio" name="g" value="Other">Other &emsp;
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        Enter Country
                        <input type="text" name="c" class="form-control">
                    </div>
                    <div class="col-md-3">
                        Enter State
                        <input type="text" name="s" class="form-control">
                    </div>
                    <div class="col-md-3">
                        Enter City
                        <input type="text" name="ct" class="form-control">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        Enter Amount
                        <input type="text" name="a" class="form-control">
                    </div>
                </div><br>
                <div class="row">
                    <center><button class="btn btn-success" type="button"  onclick="InsertData(this.form)">Create</button></center>
                </div>
            </form>
        </div>
    </div>
    <br><br>
