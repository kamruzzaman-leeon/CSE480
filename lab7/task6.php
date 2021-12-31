<?php
class Account
{
    private $accountID, $accountBalance;
    static public $count = 0;
    public function __construct($id, $balance)
    {
        $this->accountID = $id;
        $this->accountBalance = $balance;
        self::$count++;
    }

    public function showInformation()
    {
        echo "Account ID is : " . $this->accountID . " </br> Account Balance is: " . $this->accountBalance . "</br>";
    }

    public function deposit($amount)
    {
        $this->accountBalance += $amount;
    }

    public function withdraw($amount)
    {
        if ($this->accountBalance >= $amount) {
            $this->accountBalance -= $amount;
        } else {
            echo 'insufficent balance to withdraw.</br>';
        }
    }

    public function showAccountInfo()
    {
        
    }
    public function transferMoney($bankAccount, $amount)
    {

        if ($this->accountBalance >= $amount) {
            $this->accountBalance -= $amount;
        } else {
            echo 'insufficent balance to transfermoney.</br>';
        }
    }
}

echo "<b>Person 1 info</b> <br>";
$obj1 = new Account('111', 1000);
echo $obj1->showInformation();
$de = 500;
echo "deposite : " . $de . "</br>";
echo $obj1->deposit($de);
echo $obj1->showInformation();



echo "<b>Person 2 info</b> <br>";
$obj2 = new Account('222', 3000);
echo $obj2->showInformation();
$de = 1000;
echo "deposite : " . $de . "</br>";
echo $obj2->deposit($de);
echo $obj2->showInformation();


$transfer=6000;
echo $obj1->transferMoney($obj2,$transfer);


echo "<b>After transaction from Person 1 to Person 2 :</b></br>";
echo $obj1->showInformation();
echo $obj2->showInformation();

$transfer=1000;
echo $obj2->transferMoney($obj1,$transfer);


echo "<b>After transaction from Person 2 to Person 1 :</b></br>";
echo $obj1->showInformation();
echo $obj2->showInformation();

echo "<br>" . "Number of Account is: " . Account::$count;
