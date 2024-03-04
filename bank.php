<?php

interface BankAccountInterface
{



    public function deposite($amount): float;
    public function withdrow($amount): float;
    public function getbalance(): float;

}


abstract class BankAccount implements BankAccountInterface
{

    public $account_ID;

    public $customer_name;
    public $balance;
    public function __construct($account_ID, $customer_name, $balance)
    {
        $this->account_ID = $account_ID;

        $this->customer_name = $customer_name;

        $this->balance = $balance;

    }

    public function deposite($amount): float
    {
        $this->balance = $this->balance + $amount;

        return $amount;



    }




    public function getbalance(): float
    {
        return $this->balance;



    }
    abstract public function withdrow($amount): float;


    static public function logTransection($transction_type, $account_id, $amount)
    {

        echo "this is the type of tis transction {" . $transction_type . "} and this is the account id {" . $account_id . "} and this is the amount {" . $amount . "} and this is the time of transection {" . time() . "} please confirme \n";

    }



    public function perfromTransctions(BankAccountInterface $banktransction, $transction_type, $amount)
    {

        if ($transction_type == "withdrow") {

            $withdorw_amount = $banktransction->withdrow($amount);
            echo $withdorw_amount;

        }


        if ("deposite" == $transction_type) {

            $deposite_amount = $banktransction->deposite($amount);
            echo $deposite_amount;

        }

    }



}

class SavingsAccount extends BankAccount
{

    public function withdrow($amount): float
    {
        if ($this->balance > 0) {
            if (($this->balance - $amount) > 50) {

                echo "this is the amout u want to withdorw :" . $amount;
                $this->balance = $this->balance - $amount;


            }



        } else
            echo "the balance is insufficient." . "\n";

        parent::logTransection($this->customer_name, $this->account_ID, $amount);

        return $amount;


    }




}



class CheckingAccount extends BankAccount
{

    public function withdrow($amount): float
    {
        //https://www.php.net/manual/en/function.mt-rand.php
//Returns the maximum random value returned by a call to mt_rand() without arguments,
// which is the maximum value that can be used for its max parameter
// without the result being scaled up (and therefore less random).

        #this method will will generate random number between 0 and 1;

        $randomnum = mt_rand() / mt_getrandmax();


        echo "this is the fee charged each time u make withdrow" . $this->balance = $this->balance * $randomnum;

        $this->balance = $this->balance - $amount;




        return $amount;
    }








}


class AccountManager
{



    public function transferTotransfer(BankAccount $bankAccount1, BankAccount $bankAccount2, $amount)
    {

        echo " will transfer money from " . $bankAccount1->account_ID . " into " . $bankAccount2->account_ID;


        if ($bankAccount1->balance == 0) {
            echo "you couldn't transfer money there is no money in thiss account .....pls check your balance " . $bankAccount1->balance;


        } else {

            echo "\n" . "trasfering from account1 into account2.....";
            echo "\n";
            BankAccount::logTransection("transfering", $bankAccount1->account_ID, $amount);
            BankAccount::logTransection("reciving", $bankAccount2->account_ID, $amount);
            $withdrow_amount = $bankAccount1->withdrow($amount);
            echo $withdrow_amount;
            $deposit_amount = $bankAccount2->deposite($amount);
            echo $deposit_amount;
        }

    }


}




interface PaymentMethodInterface
{
    public function processPayment(float $amount): void;// using the type declartion and define the returned value (PRO-level) 

}
class VisaPayment implements PaymentMethodInterface
{

    public $card_number;
    public $CVV;
    public function __construct($card_number, $CVV)
    {
        $this->card_number = $card_number;
        $this->CVV = $CVV;
    }
    public function test_input_visa($input_CVV, $card_number): array
    {

        $input = trim($input_CVV);
        $card_number = trim($card_number);
        $input = stripslashes($input);
        if (is_numeric($card_number)) {

            return [$input, $card_number];
        } else {
            echo "this is unvalid card number\n";
            return [$input, NUll];
        }
    }

    public function processPayment(float $amount): void
    {
        echo "this is cash payment.......and this the amount " . $amount . "\n";
    }
    public function visa_validation($card_number, $CVV)
    {
        //first of all check if the same data are re-entered 
        if ($this->card_number == $card_number and $this->CVV == $CVV) {
            $data = $this->test_input_visa($card_number, $CVV);
            echo "your information is confermed.....\n";

        } else
            echo "you are entered wrong info pls try again.....\n";

    }
    public function make_payment($amount, $card_number, $CVV)
    {

        $this->visa_validation($card_number, $CVV);

        $this->processPayment($amount);

    }


}

class PayPalPayment implements PaymentMethodInterface
{
    // Include properties for PayPal email.
    // processPayment() should simulate PayPal account validation and payment.
    public $paypalEmail;
    public $password;

    public function processPayment(float $amount): void
    {
        echo "this is paypal payment.......and this the amount " . $amount . "\n";


    }
    function test_input_paypal($paypalEmail, $password): array
    {
        $password = trim($password);
        $password = stripslashes($password);
        $paypalEmail = trim($paypalEmail);
        $paypalEmail = stripslashes($paypalEmail);
        return [$password, $paypalEmail];



    }
    public function paypalValidation($paypalEmail, $password)
    {
        //check if the entered is equal into the orgin.
        if ($this->paypalEmail == $paypalEmail and $this->password == $password) {
            $data = $this->test_input_paypal($paypalEmail, $password);
            echo "your information entered confermed..............\n";


        } else
            echo "you entered wrong information pls try agian.......\n";
    }

    public function make_payment($amount, $paypalEmail, $password)
    {
        $this->paypalValidation($paypalEmail, $password);
        $this->processPayment($amount);

    }


}


class CashPayment implements PaymentMethodInterface
{
    public function processPayment($amount): void
    {
        echo "this is Cash payment.......and this the amount " . $amount . "\n";




    }
    public function make_payment($amount)
    {

        $this->processPayment($amount);

    }




}


class PaymentProcessor
{
    public $payment_type;
    // dependency injection
    public function __construct(PaymentMethodInterface $payment_type)
    {
        $this->payment_type = $payment_type;



    }
    public function executePayment(PaymentMethodInterface $paymentmethod, $amount)
    {

        $paymentmethod->processPayment($amount);


    }





}
//Payment Factory
class PaymentFactory
{

    static public function getPaymentMethod($payment_type, $card_number, $CVV): PaymentMethodInterface
    {
        if ($payment_type == "visa") {
            return new VisaPayment($card_number, $CVV);


        }


        if ($payment_type == "paypal") {

            return new PayPalPayment();


        }


        if ($payment_type == "cash") {

            return new CashPayment();
        } else
            return Null;
    }

}





















$account1 = new SavingsAccount(account_ID: "123", customer_name: "aliali", balance: 10000);
$account2 = new SavingsAccount(account_ID: "124", customer_name: "mohammed", balance: 1000);

$accountmanger = new AccountManager();
$accountmanger->transferTotransfer($account1, $account2, 3000);

echo "\n\n" . $account1->balance;

echo "\n\n" . $account2->balance;

?>