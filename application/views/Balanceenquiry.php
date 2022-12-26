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

                    <div class="row">
                        <div class="col">
                            <br><br>
                            <input type="button" name="submit" class="btn btn-info" value="Enquire" onclick="enquiry(this.form)">
                        </div>
                    </div>

            </form>
            <br><br>