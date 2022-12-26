<?php

class BankModel extends CI_Model
{
    public function Createaccount($q)
    {
        $this->db->insert('bankacnt', $q);
    }
    public function Check()
    {
        $rs = $this->db->get('bankacnt');
        return $rs->num_rows();
    }
    public function TakeMoney($cn)
    {
        $rs = $this->db->get_where('bankacnt', $cn);
        return $rs->result_array();
    }
    public function MoneyLeft($val, $cn)
    {
        $this->db->update('bankacnt', $val, $cn);
        // return $rs->result_array();
    }

    public function accSummary($val)
    {
        $this->db->insert('transaction', $val);
        // return $rs->result_array();
    }

    public function getSummary($cn)
    {
        $rs = $this->db->get_where('transaction', $cn);
        return $rs->result_array();
    }
}
