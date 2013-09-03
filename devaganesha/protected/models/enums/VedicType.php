<?php
class VedicType{
 const Aarti = 0;
 const Mantra = 1;
 const Atharva = 2;
 const Pooja = 3;

    public static $heading = array(
         self::Aarti => 'Aarti',
         self::Mantra => 'Mantra Pushpanjali',
         self::Atharva => 'Atharva shirsha',
         self::Pooja => 'Uttar Pooja',
     );
	 
	 public static $godnames = array('ganesh'=>'Shree ganesh',
									 'Shiva'=>'Shiv Shankar',
									 'vitthal'=>'Shree Vitthal',
									 'krishna'=>'Shree krishna',
									 'vishnu'=>'Shree Vishu',
									 'devi'=>'Devi',
									 'saibaba'=>'Saibaba',
									 'datta'=>'Shree Dutta',
									 'saibaba'=>'Saibaba',
									 'satyanarayan'=>'Satyanarayan',
									 'hanumaan'=>'Hanumaan',
									 'gyaneshwar'=>'Saint Gyaneshwar',
									 'tukaram'=>'Saint Tukaram',
									 'ramdas'=>'Saint Ramdas',
									 'swami'=>'Swami samarth'
									 
							);
}
?>