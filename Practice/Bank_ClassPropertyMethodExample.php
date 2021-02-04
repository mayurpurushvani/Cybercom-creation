<?php


class BankAccount
{
    public $balance = 10.5;

    public function DisplayBalance() {
        return 'Balance : '.$this->balance;
    }
    public function Withdraw($amount) {
        if(($this->balance) < $amount) {
            echo 'Not enought Money!';
        } else {
            $this->balance = $this->balance - $amount;
        }
    }
}

$mayur = new BankAccount;
echo $mayur->DisplayBalance()."<br>";
$mayur->Withdraw(16);
echo $mayur->DisplayBalance();

?>