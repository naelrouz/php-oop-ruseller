
<?php
/*	for($i = 1, $j = 0; $j >= 10 && $i <= 50; $j += $i, print $i, $i++) {
echo "i = ". $i."</br> $j = ".$j;
}
*/
//
//-----------------------------------------------------------------------------------------
// -- Статические поля класса
/*
class Member {

 private $username;
 private $location;
 private $homepage;
 public static $numMember; //static (self::$numMember) - сохраняют значения между вызовами функции

 public function __construct( $username, $location, $homepage ) {
   
   self::$numMember++;
   $this->username = $username;
   $this->location = $location;
   $this->homepage = $homepage;  
 }
 
 public function showProfile() {
   echo "<dl>";
   echo "<dt>numMember:</dt><dd>".Member::$numMember."</dd>";
   echo "<dt>Username:</dt><dd>$this->username</dd>";
   echo "<dt>Location:</dt><dd>$this->location</dd>";
   echo "<dt>Homepage:</dt><dd>$this->homepage</dd>";
   echo "</dl>";
 }
}

$aMember = new Member( "fred", "Chicago", "http://example.com/" );
$aMember->showProfile();
$aMember2 = new Member( "Lyke", "Chicago", "http://example.com/" );
$aMember2->showProfile();
*/
//-------------------------------------------------------------------------------------
//Статические методы
/*
class Member {

 private $username;
 private $location;
 private $homepage;
 public static $numMember; //static (self::$numMember) - сохраняют значения между вызовами функции

 public function __construct( $username, $location, $homepage ) {
   
   self::$numMember++;
   $this->username = $username;
   $this->location = $location;
   $this->homepage = $homepage;  
 }
 public static function  getNum(){
 	return self::$numMember;
 }
 public function showProfile() {
   echo "<dl>";
   echo "<dt>Username:</dt><dd>$this->username</dd>";
   echo "<dt>Location:</dt><dd>$this->location</dd>";
   echo "<dt>Homepage:</dt><dd>$this->homepage</dd>";
   echo "</dl>";
 }
}

$aMember = new Member( "fred", "Chicago", "http://example.com/" );
echo "<dt>numMember:</dt><dd>".Member::getNum()."</dd>";
$aMember->showProfile();
$aMember2 = new Member( "Lyke", "Chicago", "http://example.com/" );
echo "<dt>numMember:</dt><dd>".Member::getNum()."</dd>";
$aMember2->showProfile();
*/
//
//--------------------------------------------------------------------------------------
//Константы класса
/*
class Member {

 const MEMBER = 1;
 const MODERATOR = 2;
 const ADMINISTRATOR = 3;

 private $username;
 private $level;

 public function __construct( $username, $level ) {
   $this->username = $username;
   $this->level = $level;
 }

 public function getUsername() {
   return $this->username;
 }

 public function getLevel() {
   if ($this->level == self::MEMBER) return "member member"; 
   if ( $this->level == self::MODERATOR ) return "a moderator";
   if ( $this->level == self::ADMINISTRATOR ) return "an administrator";
   return "unknown";
 }
}

$aMember = new Member( "fred", Member::MEMBER );
$anotherMember = new Member( "mary", Member::ADMINISTRATOR );
echo $aMember->getUsername() . " is " . $aMember->getLevel() . "<br>";  // отобразит "fred is a member"
echo $anotherMember->getUsername() . " is " . $anotherMember->getLevel() . "<br>";  // отобразит "mary is an administrator"
*/
//----------------------------------------------------------------------------------------------------
//Явное указание типов аргументов функций 
/*

class Member
{
	private $username;
	function __construct($a_username)
	{
		$this->username = $a_username;
	}
	public function getUsername()
	{
		return $this->username;
	}
}

class Wiget
{
	private $color;
	function __construct($a_color)
	{
		$this->color = $a_color;
	}
	 public function getColour() {
	return $this->colour;
 }

}

class Topic
{
	private $member;
	private $content;
	//function __construct($a_member,$a_content)
	function __construct(Member $a_member, $a_content) // явно указать объект какого класса получать
	{
		$this->member = $a_member;
		$this->content = $a_content;
	}
	
	public function getUsernameTopic()
	{
		return $this->member->getUsername();
	}
}
$wig = new Wiget("Blue");
$mem = new Member("Lucas");
$top = new Topic($mem,"text");
echo $top->getUsernameTopic()." ";
*/
//------------------------------------------------------------------------------------------------
//Инициализация и чтение значений полей класса при помощи __get() и __set()
//
class Member
{
	private $username;
	private $data = array();
	public function __get($property)
	{
		if ($property == "username") {
			return $this->username;
		} else {
			if (array_key_exists($property, $this->data)) {
				return $this->data[$property];
			} else {
				return null;
			}
		}
	}
	public function __set($property, $value)
	{
		if ($property == "username") {
			$this->username = $value;
	} else {
		$this->data[$property] = $value;
	}
	}
}
$aMember = new Member();
$aMember->username = "fred";
$aMember->location = "San Francisco";
echo $aMember->username . "<br>";  // отобразит "fred"
echo $aMember->location . "<br>";  // отобразит "San Francisco"
?>