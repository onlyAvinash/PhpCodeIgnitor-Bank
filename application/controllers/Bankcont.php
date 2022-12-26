<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bankcont extends CI_Controller
{



	public function index()
	{
		$this->load->view('Navbar');
	}
	public function home()
	{
		$this->load->view('Home');
	}
	public function withdraw()
	{
		$this->load->view('Withdraw');
	}
	public function createaccount()
	{
		$this->load->view('Createaccount');
	}
	public function balance()
	{
		$this->load->view('Balanceenquiry');
	}
	public function fundtransfer()
	{
		$this->load->view('Fundtransfer');
	}
	public function passchange()
	{
		$this->load->view('Passwordchange');
	}
	public function deposite()
	{
		$this->load->view('Deposite');
	}
	public function summary()
	{
		$this->load->view('Accountsummary');
	}


	// public function insert()
	// {
	// 	$data = $_REQUEST['data'];
	// 	$ar = explode(",", $data);


	// 	$q = array("pin" => $ar[0], "name" => $ar[1], "fname" => $ar[2], "phone" => $ar[3], "email" => $ar[4], "country" => $ar[5], "state" => $ar[6], "city" => $ar[7], "gender" => $ar[8], "amount" => $ar[9]);
	// 	$this->load->model("BankModel");
	// 	$this->BankModel->Createaccount($q);
	// }
	public function insert()
	{
		$this->load->model("BankModel");
		$data = $_REQUEST['data'];
		$ar = explode(",", $data);
		$a = "SBI";
		$rs = $this->BankModel->Check();
		print_r($rs);
		if ($rs > 0) {
			$rs = $rs + 101;
			$pin = $a . $rs;
		} else
			$pin = "SBI101";
		$q = array("id" => $pin, "pin" => $ar[0], "name" => $ar[1], "fname" => $ar[2], "phone" => $ar[3], "email" => $ar[4], "country" => $ar[5], "state" => $ar[6], "city" => $ar[7], "gender" => $ar[8], "amount" => $ar[9]);

		// $q = array("id" => $pin, "pin" => $ar[0], "name" => $ar[1], "fname" => $ar[2], "phone" => $ar[3], "email" => $ar[4], "country" => $ar[5], "state" => $ar[6], "city" => $ar[7], "gender" => $ar[8], "amount" => $ar[9]);
		$this->BankModel->Createaccount($q);
	}

	public function withdrawMoney()
	{
		$data = $_REQUEST['data'];

		$ar = explode(",", $data);


		$q = array("id" => $ar[0], "pin" => $ar[1]);
		$this->load->model("BankModel");
		$rs = $this->BankModel->TakeMoney($q);
		$size = sizeof($rs);

		if ($size > 0) {
			$amnt = $rs[0]["amount"];
			if ($amnt >= $ar[2]) {
				$left = $amnt - $ar[2];

				// $cn= array("id"=> $ar[0]);	
				$val = array("amount" => $left);
				$this->BankModel->MoneyLeft($val, $q);
				date_default_timezone_set('asia/calcutta');
				$d = date('D-M-Y');
				$t = date('h:i:s');
				$date = $d . " " . $t;
				$summary = array("acno" => $ar[0], "amount" => $ar[2], "date" => $date, "ds" => 'withdraw');
				$rs = $this->BankModel->accSummary($summary);
				echo "<h3> balance left $left <h3>";
			} else {
				echo "<h3> insufficient balance <h3>";
			}
		} else {
			echo "invalid account or pin";
		}
	}

	public function depositeMoney()
	{
		$data = $_REQUEST['data'];
		$ar = explode(",", $data);
		$q = array("id" => $ar[0], "pin" => $ar[1]);
		$this->load->model("BankModel");
		$rs = $this->BankModel->TakeMoney($q);
		$size = sizeof($rs);

		if ($size > 0) {
			$amnt = $rs[0]["amount"];

			$add = $amnt + $ar[2];

			// $cn= array("id"=> $ar[0]);	
			$val = array("amount" => $add);
			$this->BankModel->MoneyLeft($val, $q);
			date_default_timezone_set('asia/calcutta');
			$d = date('D-M-Y');
			$t = date('h:i:s');
			$date = $d . " " . $t;
			$summary = array("acno" => $ar[0], "amount" => $ar[2], "date" => $date, "ds" => 'deposite');
			$rs = $this->BankModel->accSummary($summary);

			echo "<h3> money has deposited $add <h3>";
		} else {
			echo "invalid account or pin";
		}
	}


	public function transferMoney()
	{

		$data = $_REQUEST['data'];

		$ar = explode(",", $data);


		$q = array("id" => $ar[0], "pin" => $ar[1]);
		$newq = array("id" => $ar[2]);
		$this->load->model("BankModel");
		$rs = $this->BankModel->TakeMoney($q);
		$newrs = $this->BankModel->TakeMoney($newq);

		$size = sizeof($rs);
		$newsize = sizeof($newrs);
		if ($size > 0 && $newsize > 0) {
			$amnt = $rs[0]["amount"];
			$newAmnt = $newrs[0]["amount"];
			if ($amnt >= $ar[2]) {

				$left = $amnt - $ar[3];
				$add =   $newAmnt + $ar[3];
				// $cn= array("id"=> $ar[0]);

				$val = array("amount" => $left);

				$newVal = array("amount" => $add);

				$this->BankModel->MoneyLeft($val, $q);
				$this->BankModel->MoneyLeft($newVal, $newq);
				date_default_timezone_set('asia/calcutta');
				$d = date('D-M-Y');
				$t = date('h:i:s');
				$date = $d . " " . $t;
				$summary = array("acno" => $ar[0], "amount" => $ar[3], "date" => $date, "ds" => 'transfer');
				$newsummary = array("acno" => $ar[2], "amount" => $ar[3], "date" => $date, "ds" => 'credit');
				$this->BankModel->accSummary($summary);
				$this->BankModel->accSummary($newsummary);


				echo "<h3> balance left $left <h3>";
			} else {
				echo "<h3> insufficient balance <h3>";
			}
		} else {
			echo "invalid account or pin";
		}
	}

	public function balanceEq()
	{
		$data = $_REQUEST['data'];
		$ar = explode(",", $data);
		$q = array("id" => $ar[0], "pin" => $ar[1]);
		$this->load->model("BankModel");
		$rs = $this->BankModel->TakeMoney($q);
		$size = sizeof($rs);

		if ($size > 0) {
			$amnt = $rs[0]["amount"];

			echo "<h3> your current balance is  $amnt <h3>";
		} else {
			echo "invalid account or pin";
		}
	}
	public function passwordChange()
	{
		$data = $_REQUEST['data'];
		$ar = explode(",", $data);
		$q = array("id" => $ar[0], "pin" => $ar[1]);
		$this->load->model("BankModel");
		$rs = $this->BankModel->TakeMoney($q);
		$size = sizeof($rs);

		if ($size > 0) {

			$newpin = array("pin" => $ar[2]);

			$this->BankModel->MoneyLeft($newpin, $q);

			echo "<h3> your password has changed<h3>";
		} else {

			echo "<h3>invalid account or pin </h3>";
		}
	}

	public function acntSummary()
	{
		$data = $_REQUEST['data'];
		$ar = explode(",", $data);
		$cn = array("id" => $ar[0], "pin" => $ar[1]);
		$this->load->model('BankModel');
		$rs = $this->BankModel->TakeMoney($cn);
		$size = sizeof($rs);
		if ($size > 0) {
			$cnTwo = array("acno" => $ar[0]);
			$q = $this->BankModel->getSummary($cnTwo);
			echo json_encode($q);
		} else {
			echo "<h3>invalid account or pin </h3>";
		}
	}
}
