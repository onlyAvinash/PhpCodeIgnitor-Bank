<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    * {
      cursor: pointer;
    }
  </style>
  <script>
    function loadNav(str)

    {
      // alert("jdfsdj");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          //alert(this.responseText);

          document.getElementById("data").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", str, true);

      xmlhttp.send();


    }
    //  this is for create acocount

    function InsertData(str) {

      var pin = str.p.value;
      var name = str.n.value;
      var fname = str.f.value;
      var phone = str.ph.value;
      var email = str.e.value;
      var country = str.c.value;
      var state = str.s.value;
      var city = str.ct.value;
      var gender = str.g.value;
      var amount = str.a.value;
      var dt = [pin, name, fname, phone, email, country, state, city, gender, amount]

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          alert("account created");
          //alert(this.responseText);

          //   document.getElementById("data").innerHTML = this.responseText;
          loadNav("http://localhost/bank/index.php/Bankcont/withdraw");
        }
      };
      // alert(dt);
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/insert?data=" + dt, true);

      xmlhttp.send();


    }

    //this is to withdraw
    function withdraw(str)

    {
      //alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;
      var amount = str.a.value;
      var dt = [account, pin, amount];

      // alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          //  alert("acnt created");

          document.getElementById("error").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/withdrawMoney?data=" + dt, true);

      xmlhttp.send();


    }

    //this is to deopite the money

    function deposite(str)

    {
      //alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;
      var amount = str.a.value;
      var dt = [account, pin, amount];

      // alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          //  alert("acnt created");

          document.getElementById("error").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/depositeMoney?data=" + dt, true);

      xmlhttp.send();


    }

    //this is to transfer the funds from one to another 

    function fundtransfer(str)

    {
      // alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;
      var accountTwo = str.act.value;
      var amount = str.am.value;
      var dt = [account, pin, accountTwo, amount];

      // alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          // alert("acnt created");

          document.getElementById("error").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/transferMoney?data=" + dt, true);

      xmlhttp.send();


    }
    //this is to enquire thw balance

    function enquiry(str)

    {
      // alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;

      var dt = [account, pin];

      // alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          // alert("acnt created");

          document.getElementById("error").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/balanceEq?data=" + dt, true);

      xmlhttp.send();


    }
    //this is to change the password

    function passchange(str)

    {
      alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;
      var newpin = str.np.value;

      var dt = [account, pin, newpin];

      alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          alert("acnt created");

          document.getElementById("error").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/passwordChange?data=" + dt, true);

      xmlhttp.send();


    }

    //this is to check the account summary

    function summary(str)

    {
      alert("jdfsdj");
      var account = str.ac.value;
      var pin = str.p.value;

      var dt = [account, pin];

      alert(dt);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          // alert(this.responseText);
          var data = JSON.parse(this.responseText);
          var s = `<table class='table table-striped table-hover table-bordered table-primary '>`;
          s = s + "<tr><td>Account</td> <td>Amount</td> <td>Date</td> <td>Ds</td></tr>";
          data.forEach(row => {
            s = s + ` <tr><td>${row.acno}</td><td>${row.amount}</td><td>${row.date}</td><td>${row.ds}</td></tr>`;
          })


          document.getElementById("error").innerHTML = s;

        }
      };
      xmlhttp.open("GET", " http://localhost/bank/index.php/Bankcont/acntSummary?data=" + dt, true);

      xmlhttp.send();


    }
  </script>

</head>

<body>
  <div class="container">
    <div class="row" id="data">
      <div class="col-md-2 p-5">


        <img src="<?php echo base_url() . "images//logo.png"; ?>" height="100%" "/>
                </div>
                <div class=" col-md-8 mt-5">
        <center>
          <h1>My Personal Bank Bank At Your Door Step</h1>
        </center>
        <center>
          <h1></h1>
        </center>
      </div>


      <!-- </div><hr> -->
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light fs-5" style="background-color:#458;">
            <div class="container">
              <a class="navbar-brand fs-4 " href="./home.php" style="color:white;"> <img src="<?php echo base_url() . "images//logo.png"; ?>" height="50%" "/></a>
    <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" onclick="loadNav('http://localhost/bank/index.php/Bankcont/home')">Home</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/createaccount')">Create Account<i class="fa-sharp fa-solid fa-user-plus"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/withdraw')">Withdraw</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/Deposite')">Deposit</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/fundtransfer')">Fund Transfer</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/balance')">Balance Enquiry</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/passchange')">Password Change</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" onclick="loadNav('http://localhost/bank/index.php/Bankcont/summary')">Account Summary</a>
                    </li>
                  </ul>
                </div>
            </div>
          </nav><br>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" id="error"></div>
      <div class="col-md-4"></div>
    </div>
    <!-- <div class="container" id="summary"></div> -->

</body>

</html>