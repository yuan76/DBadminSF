<?php
if(isset($_POST['submit'])){//to run PHP script on submit
	if(!empty($_POST['check_list'])){
		// Loop to store and display values of individual checked checkbox.
		foreach($_POST['check_list'] as $selected){
		echo $selected."</br>";
		}
	}
}
?>