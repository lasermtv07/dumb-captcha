<h1>CAPTCHA</h1>
<?php
//(c) lasermtv07, 2024
//under MIT license
session_start();
class Color {
	public $name;
	public $rgb;
	public $dev;
	function __construct($name,$rgb,$dev){
		$this->name=$name;
		$this->rgb=$rgb;
		$this->dev=$dev;
	}
	function writePlain(){
		return "rgb(".$this->rgb[0].",".$this->rgb[1].",".$this->rgb[2].");";
	}
	//basically slightly randomizes the color so its harder for bots to circumvent
	function writeDeviated(){
		$t=[$this->rgb[0],$this->rgb[1],$this->rgb[2]];
		$d=[$this->dev[0],$this->dev[1],$this->dev[2]];
		if($t[0]==0) $t[0]=1; if($t[1]==0) $t[1]=1; if($t[2]==0) $t[2]=1;
		$t[0]=rand(abs($t[0]-$d[0]),(($t[0]+$d[0])<255)?($t[0]+$d[0]):255);
		$t[1]=rand(abs($t[1]-$d[1]),(($t[1]+$d[1])<255)?($t[1]+$d[1]):255);
		$t[2]=rand(abs($t[2]-$d[2]),(($t[2]+$d[2])<255)?($t[2]+$d[2]):255);
		return "rgb(".$t[0].",".$t[1].",".$t[2].");";
	}
}
//hypixel bedwars colors
//not really ;(
$colors=[
new Color("Blue",[0,0,255],[25,25,125]),
new Color("Aqua",[72, 133, 242],[30,30,10]),
new Color("Red",[230, 55, 39],[30,30,10]),
new Color("Green",[19, 186, 49],[30,10,30]),
new Color("Yellow",[250, 246, 15],[10,10,10]),
new Color("Gray",[156, 156, 156],[10,10,10]),
new Color("Pink",[250, 187, 229],[10,10,10]),
new Color("Lime",[131, 255, 110],[10,10,10]),
new Color("Brown",[138, 88, 34],[10,10,10]),
new Color("Purple",[142, 18, 199],[10,10,10]),
new Color("Orange",[255, 123, 0],[10,10,10])
];
//echo '<div style="width:50px;height:50px;background-color:'.$colors[4]->writeDeviated().'"> </div>';
//okay, this algo is fucked up, however its a way how to generate a shuffled subarray from $colors
shuffle($colors);
$p=rand(0,sizeof($colors)-10);
$v=array_slice($colors,$p,9);
$c=$v[0];
shuffle($v);
//generate table
echo "<h3>Click on ".$c->name."</h3>";
echo "<table><tr>";
foreach($v as $k=>$i){
	if(($k)%3==0) echo "</tr><tr>";
	echo "<td>";
	echo '<a href='.$_SERVER['SCRIPT_NAME']."?num=$k >".'<div style="width:50px;height:50px;background-color:'.$i->writeDeviated().'"> </div></a>';
	echo "</td>";

}
//correct captcha
if(isset($_SESSION["capt"]) && isset($_GET["num"])){
	if($_SESSION["capt"]==$_GET["num"]) header('location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
	else echo "<b>Wrong CAPTCHA!</b>";
}
$_SESSION["capt"]=array_search($c,$v);

?>
