<?php


class BankAccount
{
    public $balance = 0;

    public function DisplayBalance()
    {
        return 'Balance : ' . $this->balance;
    }
    public function Withdraw($amount)
    {
        if (($this->balance) < $amount) {
            echo 'Not enought Money!';
        } else {
            $this->balance = $this->balance - $amount;
        }
    }
    public function deposit($amount)
    {
        $this->balance = $this->balance + $amount;
    }
    public function settype($input)
    {
        $this->type = $input;
    }
}

class SavingAccount extends BankAccount
{
}

$mayur = new BankAccount;
$mayur->setType('18-25 Current');
$mayur->deposit(100);
$mayur->Withdraw(20);
echo $mayur->DisplayBalance() . "<br>";

$mayur_saving = new SavingAccount;
$mayur_saving->settype('Super Saving');
$mayur_saving->deposit(3000);

echo $mayur->type . ' has ' . $mayur->DisplayBalance() . "<br>";
echo $mayur_saving->type . ' has ' . $mayur_saving->DisplayBalance() . "<br>";
?>