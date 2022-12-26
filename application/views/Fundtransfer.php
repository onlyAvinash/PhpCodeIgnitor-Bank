<div class="cont">
    <?php
    include('Navbar.php');
    ?>

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
                        Enter Account number to tansfer
                        <input type="text" name="act" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        Enter Amount to Tranfer
                        <input type="text" name="am" class="form-control">
                    </div>
                </div>


                <br><br>
                <div class="row">
                    <div class="col">
                        <input type="button" name="submit" class="btn btn-info" value="Transfer" onclick="fundtransfer(this.form)">
                    </div>
                </div>

            </form>
            <br><br>

        </div>

    </div>