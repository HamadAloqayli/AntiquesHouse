<?php


if(isset($_COOKIE["connEmail"]))
{
echo "Thank you,<br> your email (".$_COOKIE["connEmail"].") has been confirmed.<br>";

echo "To Home page <a href='Home.php'>click here</a>";
}
else
{
echo "sorry babby, Try again <br>";

echo "To Home page <a href='Home.php'>click here</a>";
}

?>