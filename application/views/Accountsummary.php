<div class="cont">
    <?php
    include('Navbar.php');
    ?>
    <center>
        <h1>Show Account summery</h1>
    </center>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">

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
                        <input type="button" name="submit" class="btn btn-info" value="Balance" onclick="summary(this.form)">
                    </div>
                </div>

            </form>

        </div>


    </div>

</div>

</div>