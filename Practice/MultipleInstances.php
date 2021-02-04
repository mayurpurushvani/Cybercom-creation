<?php


class BankAccount
{
    public $balance = 0;

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
    public function deposit($amount) {
        $this->balance = $this->balance + $amount;
    }

}

$mayur = new BankAccount;
echo 'Mayur<br>';
$mayur->deposit(1000);
echo $mayur->DisplayBalance()."<br>";
$mayur->Withdraw(16);
echo $mayur->DisplayBalance()."<br>";


$max = new BankAccount;
echo 'Max<br>';
$max->deposit(100);
echo $max->DisplayBalance()."<br>";
$max->Withdraw(16);
echo $max->DisplayBalance();

?>