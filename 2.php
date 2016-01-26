
<?php
/**
* 
*/
class Member
{
	const MEMBER = 1;
	const MODERATOR = 2;
	const ADMIN = 3;
	private $level;
	private $username;
	private $location;
	private $homepage;
	//public static $numMembers = 0; // пример 1
	private static $numMembers = 0;

	function __construct($username, $location, $homepage, $level)
	{
		$this->username = $username;
		$this->location = $location;
		$this->homepage = $homepage;
		$this->level = $level;		
		self::$numMembers++;
	}
	private function getLevel()
	{
		if ($this->level == self::MEMBER) return "a member</br>";
		if ($this->level == Member::MODERATOR) return "a moderator</br>";
		if ($this->level == Member::ADMIN) return "a admin</br>";
		return "unknow";
	}
	function showProfile()
	{
		echo "<dl>";
		echo "<dt>Num members:</dt><dd>". $this->getNumMembers(). "</dd>";
		echo "<dt>Username:</dt><dd>$this->username</dd>";
		echo "<dt>Location:</dt><dd>$this->location</dd>";
		echo "<dt>Homepage:</dt><dd>$this->homepage</dd>";
		echo "<dt>Level:</dt><dd>". $this->getLevel() . "</dd>";
		echo "</dl></br>";
	}
        public function getUserName()
        {
            return $this->username;
        }

        public function getNumMembers()
	{
		return self::$numMembers;
	}

	function __destruct()
	{
		//echo "</br> Object is kill";
	}
}
/**
* 
*/
class Topic
{
    private $members;
    private $subject;
    
    public function __construct($members,$subject)
    {
      $this->members = $members;
      $this->subject = $subject;
    }
    public function getUserNaeme()
    {
        return $this->members->getUserName();
    }
}


/* Пример 1
echo Member::numMembers . "</br>";
$mem = new Member ("Fred", "Chicago", "example.com");
$mem->showProfile();
echo Member::$numMembers . "</br>";
$mem = new Member ("Lili", "Chicago", "example.com");
$mem->showProfile();
echo Member::$numMembers . "</br>";
*/
echo " ". Member::getNumMembers() . "</br>";
$mem = new Member ("Fred", "Chicago", "example.com", Member::MEMBER);
$mem->showProfile();

$mem = new Member ("lili", "Chicago", "example.com", Member::MODERATOR);
//$mem->showProfile();

$mem = new Member ("Edy", "Chicago", "example.com", Member::ADMIN);
//$mem->showProfile();

$mem = new Member ("Noel", "Chicago", "example.com",NULL);
//$mem->showProfile();

$topic = new Topic ($mem, "hi hi hi");
echo $topic->getUserNaeme();
?>

1111111111111