<?php
class RecipeType{
 const Prasad = 0;
 const Naivaidya = 1;
 const Diabetic = 2;
 
 public static $heading = array(
         self::Prasad => 'Prasad',
         self::Naivaidya => 'Naivaidyam',
		 self::Diabetic => 'Diabetic Patients'
     );
	 
}
?>