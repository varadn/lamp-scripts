<!DOCTYPE HTML>
<html>

<head>
<title>Varad's Web Server -- Quadratic Formula</title>
</head>

<body>

<?php
$a = $b = $c = 0;
if ($_SERVER["REQUEST_METHOD"] =="POST") {
	$a = test($_POST["a"]);
	$b = test($_POST["b"]);
	$c = test($_POST["c"]);
}

function test($d) {
	$d = trim($d);
	$d = stripslashes($d);
	$d = htmlspecialchars($d);
	return $d;
}

?>

<h1> Quadratic Formula </h1>
<br>
<p>This a calculator that lets you get the zeroes of a quadratic function (x) quickly.</p>
<p> the notation used is: <br><br>	 ax^2 + bx + c = 0</p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	a = <input type="number" step="any" name="a" />
	<br><br>
	b = <input type="number" step="any" name="b" />
	<br><br>
	c = <input type="number" step="any" name="c" />
	<br<br>
	<input type="submit" name="submit" value="Submit" />
	<br><br>
</form>

<?php
$discr = pow($b,2);
$discr = $discr - ( 4 * $a * $c );

if ($discr < 0) {
	$ans1 = $ans2 = "n/a";
}else {
	$ans1 = $ans2 = 0;
//	$discr = sqrt($discr);
	$b *= -1;
	$ans1 = $discr;
	$ans2 = -$discr;

	$ans1 += $b;
	$ans2 += $b;

	$a *= 2;

	$ans1 = $ans1 / $a;
	$ans2 = $ans2 / $a;
//
//	$newb = b * -1;
//
//	$ans1 = $newb - $discr;
//	$ans1 = $ans1 / (2*a);
//
//	$ans2 = $newb + $discr;
//	$ans2 = $ans2 / (2*a);
}
if (is_float($ans1)) {
	$ans1 = sprintf("%.3f", $ans1);
}
if (is_float($ans2)) {
	$ans2 = sprintf("%.3f", $ans2);
}
echo "<h2>Answers:<h2>";
echo "<p1>discriminant = </p1>";
echo "$discr";
echo "<br><br>";
echo "<p1>x = </p1>";
echo "$ans1";
echo "<br>";
echo "<p1>x = </p1>";
echo "$ans2";
echo "<br>";
?>

</body>

</html>
