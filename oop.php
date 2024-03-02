<?php
// in this code i will recape the OOP wiht all cases and consepts .
//Hi this is ali ali.
#what is the class  with simple explanation.
//the class simply is a container (blueprint) that define new type of varibales into programming language.
//the class is the main idea of the OOP which is the next step of programming after the procedure programming
//OOP is to define code one time and reuse it.DRY(don't repeat yourself)
//the object is the instance of class
//inside the class we define two main things 1-attributes(properites),2-functions which present actions(methods).
//all this info above is just to clarify simply what the class and object.

//fist task define class and create object from this class.

#define class Person
class Person
{
    //define Attributes
    public $id;
    public $name;
    public $gender;
    public $age;
    //define the methods
    public function say_hello($name)
    {

        echo "hi this is " . $name . "\n";
    }
    public function talk_about_me($name, $id, $age)
    {
        echo "hi this is " . $name . "and this is my id " . $id . "and this is my age " . $age . "\n";
    }
}
#define object and set a value for propertry and call function
// $person1 =new Person();
// $person1->name="ali";
// echo $person1->name;
// echo "\n";
// $person1->say_hello($person1->name);


#TODO
//this 
class Car
{
    public $type;
    public $model;
    public $direction;
    public function move_forward($direction)
    {

        $this->direction = $direction;
    }
}

// $car1=new Car();
// $car1->type="bmw";
// $car1->move_forward("forward");

// echo "the diretion of the ".$car1->type." is ".$car1->direction;



#TODO
//constructor
class Flower
{
    public $name;
    public $price;
    //define constructor wihtout parameters
    public function __construct()
    {
        $this->name = "rose";
        $this->price = 15;
    }
}


// $flower1=new Flower ();
// echo "the flower1 is  ".$flower1->name." and it's price is ".$flower1->price;


//define constructor with argument
class Plan
{

    public $type;
    public $speed;
    public $high;
    public function __construct($type, $speed)
    {
        $this->type = $type;
        $this->speed = $speed;
    }
}

// $plan1=new Plan("emarites_19",200000);
// echo "the speed of the ".$plan1->type." plan is ".$plan1->speed;



#TODO
//set,get normal methods
class Cat
{

    public $name;
    public $age;
    public $sound;

    public function __construct($name, $age)
    {

        $this->name = $name;
        $this->age = $age;
    }


    public function make_meow($name, $sound)
    {

        echo "i am " . $name . " i am a cat " . "and this is my sound " . $sound;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_sound($sound)
    {

        $this->sound = $sound;
    }
    public function get_name()
    {

        return $this->name;
    }

    public function get_sound()
    {

        return $this->sound;
    }
    public function get_age()
    {
        return $this->age;
    }
}

// $cat1=new Cat("meky",3);
// $cat1->set_sound("MEOOOO");
// $cat1->make_meow($cat1->name,$cat1->sound);
// echo " and this is my age ".$cat1->age." months .";


#TODO
//destructor
// the constructor in useless until now ... in my openion
class Fly
{

    public $time;
    public $speed;


    public function __construct($time, $speed)
    {
        $this->time = $time;
        $this->speed = $speed;
    }
    public function __destruct()
    {
        echo "this the fly to germeny and its time is  " . $this->time . " and its speed is " . $this->speed;
    }
}



// $germeny_flight=new Fly("12:00",2000);
// the construct when i click run and the program exits.

#TODO
//inheritance
// class Fruit{

// public $name;
// public $price;

// public function __construct($name,$price){

// $this->name=$name;
// $this->price=$price; 

// }


// public function buy_fruit($name){
// echo "this ".$name." is a good fruit"." it's price is ".$this->price;
// }
// }

// class Apple extends Fruit{

// }

// $apple1=new Apple("apple",1);
// $apple1->buy_fruit($apple1->name);



#TODO
//overriding which is a form of polymorphsim
class Fruit
{

    public $name;
    public $price;
    public $colour;

    public function __construct($name, $price)
    {

        $this->name = $name;
        $this->price = $price;
    }


    public function buy_fruit($name)
    {
        echo "this " . $name . " is a good fruit" . " it's price is " . $this->price;
    }
}

class Apple extends Fruit
{

    //the normal function should be compitable with the orginal function in th father class    
    public function buy_fruit($name)
    {
        echo "this is an " . $name . " it's price is " . $this->price;
    }
    //while the constructor could be different in it's signiture
    public function __construct($name, $price, $colour)
    {
        $this->name = $name;
        $this->price = $price;
        $this->colour = $colour;
    }
}

// $apple1=new Apple("apple",3,"green");
// $apple1->buy_fruit($apple1->name);
// echo " and my colour is ".$apple1->colour;


#TODO
//self

#the self keyword is used to refer to the current class. 
#It's often used in static contexts where $this (which refers to the current object instance) is not available. 
#self is primarily used to access static properties, static methods, and constants of a class.

#TODO
//constant
// class HowAreU{
// public $name;
// public $good;
// const welcom_message="هايز حبايب " ;
// const byby_message="بيسسس"; 


// }
// accses the constant from outside class 
// echo HowAreU::welcom_message;
// now access the constant inside the class 
class HowAreU
{
    public $name;
    public $good;
    const welcom_message = "هايز حبايب "; // recomend to be upper case. all of it 
    const byby_message = "بيسسس";
    public function __construct($name, $good)
    {
        $this->name = $name;
        $this->good = $good;
        echo self::welcom_message;
    }
    public function say_bye($name)
    {

        echo self::byby_message;
    }
}

// $ali=new HowAreU("ALi",True);
// echo "\n";
// $ali->say_bye($ali->name);



#TODO
//final
// The final keyword can be used to prevent class inheritance or to prevent method overriding.
// final class Dog{
// public $name;
// public $price;
// public $sound;
// public function __construct($name){
// $this->name=$name;
// }

// } 
// // will give error.
// class Boby extends Dog {

// }
// class Butterfly{
// public $name;
// public $colour;
// final function __construct($name,$colour)
// {
//     $this->name=$name;
//     $this->colour=$colour;
// }
// }

// class Smallbutterfly extends Butterfly{

// // the message error is Cannot override final method Butterfly::__construct()
//     public function __construct()
// {

// }
// public function fly(){
//     echo "hi this is ".$this->name;


// }


// }

// $butterfly1=new Smallbutterfly("soso","white");
// $butterfly1->fly();

#TODO 
//access modifiers.
// 1-Public: Public properties or methods can be accessed from anywhere - 
// outside the class, within the class itself, and from child classes.
// 2-Protected: protectected properties can be accessed inside the class itself and and from child of ths class
// but we cann't reach it from outside the class .
//3-private :we can reach it from the class it self just .

#TODO
//SETTER,GETTER magic methods i don't think this is OOP :)
/*1. Purpose of __get() and __set()
The “__get()” and “__set()” methods are primarily used to control access to object properties.
When an attempt is made to “access a property“ that is not accessible
 or does not exist, __get() is triggered.
Similarly, when an attempt is made to “assign a value“ to an inaccessible or 
nonexistent property, __set() is invoked.*/

// implement __set and __get

// first the set method

class ship
{
    public $space;
    private $colour = "blue";
    public function __construct($space)
    {
        $this->space = $space;
    }
    // after this function the  class or even the current object will not  add to the new property into it's properties. 
    public function __set($property_name, $property_value)
    {

        if (!property_exists(__CLASS__, $property_name)) {

            echo "this property " . $property_name . " is  not exsit u are trying to assign value for non exist property" . " and its value now is " . $property_value;
        } else {
            $this->colour = $property_value;
            echo "you are tring to reach inaccecable property but you can change it's value :)\n ";
            echo "the new value of the colour which is private porperty is " . $this->colour;
        }
    }
}

// $ship1=new ship(200);
// $ship1->colour="green"; #assign value for private and break the rule using the  magic __SET cooooollll 

//the get method
class Tree
{
    public $age;
    protected $type = "apple-tree";

    public function __construct($age)
    {

        $this->age = $age;
    }

    public function __get($property_name)
    {

        if (!property_exists(__CLASS__, $property_name)) {
            echo "this property is not exist";
        } else
            echo $this->{$property_name}; //new syntax here {$....}


    }
}

// $tree1=new Tree(2);
// $tree1->type;


#TODO
//static methods
class Bmw
{
    public $model;
    public $speed;
    public function __construct($model)
    {

        $this->model = $model;
    }
    // the main idea for use static to create another construcotr. is we can do more operation before intialize another constructor. 
    public static function create_another_constructor_break_rules($model)
    { // the case that it's kind of weakness the number of argument coudn't change.
        // we can define condiction befor intialization and don't change the main constructor.

        if ($model == "mercedes")
            return new self($model);
        elseif ($model == "toyta")
            return new self($model);

        /* another operatiion we can apply .
            public static function withDifferentOperators($value, $anotherValue) {
                $instance = new self($value);
                $instance->anotherProperty = $value + $anotherValue;
                return $instance;
            }

        */
    }
}


// $bmw1=new Bmw("bmw");
// $bmw2=Bmw::create_another_constructor_break_rules("mercedes");
// echo "the model is ".$bmw2->model;




#TODO
//static properties

#case1 the normal case which is the reach the static property form the outside the class 

class Sproperty
{

    public static $name = "aliali";
    public static $weight = 79;
}


// echo Sproperty::$name;
// echo "\n";
// ectho Sproperty::$weight;

#case2: use the static property inside the class using the self keyword. 
class Stapro
{
    public static $property1 = "sea";
    public static $property2 = "sky";
    public $property3;


    public function __construct($p)
    {
        Stapro::$property1 = $p;
    }
}

// $test_pro=new Stapro("ocean");
// echo "".Stapro::$property1."\n";

#case 3 extend form the class and  use static property by using the parent keywords.

class A
{
    public static $pi = 3.14;
    public function __construct($pi)
    {

        A::$pi = $pi;
    }
}
class B extends A
{
    function change_pi($pi)
    {

        parent::$pi = $pi;
    }
}

// $b=new B(3.15);
// echo "the pi value from  A class befor echnaging it's value is ".A::$pi;
// echo "\n";
// $b->change_pi(3.27); 
// echo "the pi va;lue is form B class ".B::$pi;
// echo "\n";
// echo "the pi value from  A class is ".A::$pi;
// echo "\n";




#TODO
//anonyomous class
// which will we use it for mermory and for temporary classes .
//simply we use the same way when we deal with the anonymous class .
//instead of using  the user defined classes we directly use this 

$obj = new class()
{
    //property 
    public $name = "aliRali";
    public function hello_ali()
    {
        echo "hello " . $this->name;
    }
};

// $obj->hello_ali();


//types of polymorphism
#TODO
//interface with some encapsolation 
interface Payment
{
    public function payment_process();
}

class Visa implements Payment
{

    public function loginfirst()
    {

        echo "when us want to use the visa u should to login first";
    }
    public function paynow(): string
    {
        return "this is visa";
    }
    public function payment_process()
    {
        $this->loginfirst();
        $payment_method = $this->paynow();

        echo $payment_method;
    }
}


class Cash implements Payment
{
    public function paynow(): string
    {
        return "this is cash";
    }
    public function payment_process()
    {
        $payment_method = $this->paynow();

        echo $payment_method;
    }
}



class Paypal implements Payment
{
    public function paynow(): string
    {
        return "this is paypal";
    }
    public function payment_process()
    {

        $payment_method = $this->paynow();

        echo $payment_method;
    }
}

class BuyProduct
{
    public function make_payment(Payment $payment)
    {

        $payment->payment_process();
    }
}



// $cash=new Cash();
//new commit
// $buyproduct=new BuyProduct();
// $buyproduct->make_payment($cash);


#TODO
//abstract
abstract class Shape
{
    public $name;
    public function __construct($name)
    {

        $this->name = $name;
    }
    public function setname($name)
    {
        $this->name = $name;
    }
    abstract public function sayname();
}

class Rectangle extends Shape
{
    public function sayname()
    {
        echo "this shape is " . $this->name;
    }
}

class Circle extends Shape
{

    public function sayname()
    {
        echo "this shape is " . $this->name;
    }
}

// $circle =new Circle("CIRCLE");
// $rectangle=new Rectangle("RECTANLGE");
// $circle->sayname();
// echo "\n";
// $rectangle->sayname();
#TODO
//traits
/*
PHP only supports single inheritance: a child class can inherit only from one single parent.

So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem

*/
trait Screen
{
    public $type;
    public $price;
    public function __construct($type, $price)
    {

        $this->type = $type;
        $this->price = $price;
    }

    public function knowtype(): string
    {


        return $this->type;
    }
}


class MobScreen
{
    use Screen;
}

class LabScreen
{
    use Screen;
}

// $mobile = new MobScreen("mobile", 20000);
// $labtop = new LabScreen("labtop", 4000);
// $mobile_type = $mobile->knowtype();
// echo $mobile_type;
// echo "\n";
// $labtop_type = $labtop->knowtype();
// echo $labtop_type;
