<?php
//Presented work is my quriosity about popular languages.
//I think that for every programmer it is interesting - 
//what languages are popular in different organisations all about the world.
//Stackoverflow in this case is best provider of such information.

$url = "http://careers.stackoverflow.com/jobs/feed?";
$USA = $url."location=USA";

//this class demonstrates a possibility to parse data about 
//programming languages trends from a well-known website stackoverflow.com
//actual rss feed can be achived via $url
//you simply need to add as much url parameters as you want
//all parsed data will be stored in private $rating
class prograte {
	
	private $rating;
	
	//simple constructor function, nothing special
	public function __construct(){
		$this->rating = array();
	}
	
	//this function parses data form $str url 
	//with help of simplexml base php extension
	public function getdata($str){
		$simple = simplexml_load_file($str);
		foreach ($simple->channel->item as $item){
			foreach($item->category as $category){
				@$this->rating[(string)$category] ++;
			}
		}
	}
	
	//this function returns ordered data about popular languages
	public function getrate(){
		arsort($this->rating);
		return $this->rating;
	}
	
	//this function shows data in a simple table
	public function showdata(){
		echo "<table>";
		echo "<tr>";
			echo "<td>Name</td>";
			echo "<td>Rate</td>";
		echo "</tr>";
		foreach($this->getrate() as $key => $value){
			echo "<tr><td>$key</td><td>$value</td></tr>";
		}
		echo "</table>";
	}
}

$data = new prograte();
$data->getdata($USA);
$data->showdata();
