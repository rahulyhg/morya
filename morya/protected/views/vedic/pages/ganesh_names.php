<?php
$this->menu=array(
	array(
        'label'=>'Aarti',
        'url'=>array('vedic','vedicType'=>VedicType::Aarti),
        'itemOptions'=>array(
            'class'=>'aarti_sidemenu selected_menu',
            'style'=>'height:220px;'
        ),
    ),
	array(
        'label'=>'Mantra Pushpanjali',
        'url'=>array('vedic','vedicType'=>VedicType::Mantra),
        'itemOptions'=>array('class'=>'mantrapushpanjali_menu'),
    ),
	array(
        'label'=>'Atharva shirsha',
		'url'=>$this->createAbsoluteUrl('page', array('view' => 'atharva')),
        //'url'=>array('vedic','vedicType'=>VedicType::Atharva),
        'itemOptions'=>array('class'=>'atharvashirsha_menu'),
    ),
	array(
		'label'=>'Uttar Pooja', 
		'url'=>$this->createAbsoluteUrl('page', array('view' => 'pooja')),
		//'url'=>array('vedic','vedicType'=>VedicType::Pooja),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
    ),
	array(
		'label'=>'Ganesh Names', 
		'url'=>$this->createAbsoluteUrl('page', array('view' => 'ganesh_names')),
		//'url'=>array('vedic','vedicType'=>VedicType::Pooja),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
    )
);
?>
<div class="mid-region">
    <div class="tab">Ganesh Names</div>
    <div style="float:right;font:14px;"><?php echo CHtml::link("Ganesh Names", '#');?></div>
    <div class="cont-disp">
        <h1>Ganesh Names</h1>
		<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="ganesh_names" bordercolor="#000000" height="302">
			<tbody>
				<tr>
				  <td width="27%" height="19" align="center"><b>
				  <font size="2" face="Verdana" color="#800000">Name
				  </font></b></td>
				  <td width="73%" height="19" align="center"><b>
				  <font size="2" face="Verdana" color="#800000">Meaning</font></b></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with A 
				  Alphabet</font></b></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Akhurath</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">One who has Mouse as His 
				  Charioteer </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Alampata</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Ever Eternal Lord </font>
				  </td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Amit</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Incomparable Lord</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Anantachidrupamayam</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Infinite and 
				  Consciousness Personified</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Avaneesh</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Lord of the whole World</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Avighna</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Remover of Obstacles</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with B 
				  Alphabet</font></b></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Balaganapati</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Beloved and Lovable 
				  Child</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Bhalchandra</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Moon-Crested Lord </font>
				  </td>
				</tr>
				<tr>
				  <td width="27%" height="1" align="center">
				  <font size="2" face="Verdana">Bheema</font></td>
				  <td width="73%" height="1" align="center">
				  <font size="2" face="Verdana">Huge and Gigantic</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Bhupati</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Lord of the Gods</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Bhuvanpati </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">God of the Gods</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Buddhinath </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">God of Wisdom</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font size="2" face="Verdana">Buddhipriya</font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Knowledge </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Buddhividhata </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">God of Knowledge</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with C 
				  Alphabet</font></b></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Chaturbhuj </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">One who has Four Arms</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with D 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Devadeva </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Lord of All Lords</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Devantakanashakarin </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">Destroyer of Evils and 
				  Asuras</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Devavrata </font></td>
				  <td width="73%" height="19" align="center">
				  <font size="2" face="Verdana">One who accepts all 
				  Penances</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Devendrashika </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Protector of All Gods</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Dharmik </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who gives Charity</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Dhoomravarna </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Smoke-Hued Lord</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Durja </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Invincible Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Dvaimatura </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has two Mothers</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with E 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ekaakshara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">He of the Single 
				  Syllable</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ekadanta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Single-Tusked Lord</font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ekadrishta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Single-Tusked Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Eshanputra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord Shiva's Son</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with G 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gadadhara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has The Mace as 
				  His Weapon&nbsp; </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gajakarna </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has Eyes like an 
				  Elephant </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gajanana </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Elephant-Faced Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gajananeti </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Elephant-Faced Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gajavakra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Trunk of The Elephant
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gajavaktra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has Mouth like 
				  an Elephant </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ganadhakshya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Ganas (Gods)
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ganadhyakshina </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Leader of All The 
				  Celestial Bodies </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Ganapati </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Ganas (Gods)
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gaurisuta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Son of Gauri (Parvati)
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Gunina </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who is The Master of 
				  All Virtues</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with H 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Haridra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who is Golden 
				  Coloured </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Heramba </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Mother's Beloved Son
				  </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with K 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Kapila </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Yellowish-Brown Coloured
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Kaveesha </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Master of Poets </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Krti </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of Music </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Kripalu </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Merciful Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Krishapingaksha </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Yellowish-Brown Eyed
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Kshamakaram </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Place of Forgiveness
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Kshipra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who is easy to 
				  Appease </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with L 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Lambakarna </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Large-Eared Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Lambodara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Huge Bellied Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with M 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Mahabala </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Enormously Strong Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Mahaganapati </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Omnipotent and Supreme 
				  Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Maheshwaram </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of The Universe
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Mangalamurti </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">All Auspicious Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Manomay </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Winner of Hearts </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Mrityuanjaya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Conqueror of Death
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Mundakarama </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Abode of Happiness
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Muktidaya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Eternal 
				  Bliss </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Musikvahana </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has mouse as 
				  charioteer </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with N 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Nadapratithishta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who Appreciates and 
				  Loves Music </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Namasthetu </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Vanquisher of All Evils 
				  &amp; Vices &amp; Sins </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Nandana </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord Shiva's Son </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Nideeshwaram </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Giver of Wealth and 
				  Treasures </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with O 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Omkara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has the Form Of 
				  OM</font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with P 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Pitambara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has 
				  Yellow-Colored Body </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Pramoda </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Abodes
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Prathameshwara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">First Among All </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Purush </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Omnipotent 
				  Personality </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with R 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Rakta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has Red-Colored 
				  Body </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Rudrapriya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Beloved Of Lord Shiva
				  </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with S 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Sarvadevatman </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Acceptor of All 
				  Celestial Offerings </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Sarvasiddhanta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Skills and 
				  Wisdom </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Sarvatman </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Protector of The 
				  Universe </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shambhavi </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Son of Parvati
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shashivarnam </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who has a Moon like 
				  Complexion </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shoorpakarna </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Large-Eared Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shuban </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">All Auspicious Lord
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shubhagunakanan </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who is The Master of 
				  All Virtues </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Shweta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">One who is as Pure as 
				  the White Color </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Siddhidhata </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Success &amp; 
				  Accomplishments </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Siddhipriya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Wishes and 
				  Boons </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Siddhivinayaka </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Success
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Skandapurvaja </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Elder Brother of Skand 
				  (Lord Kartik) </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Sumukha </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Auspicious Face </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Sureshwaram </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Lords </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Swaroop </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lover of Beauty </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with T 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Tarun</font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Ageless </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with U 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Uddanda </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Nemesis of Evils and 
				  Vices </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Umaputra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Son of Goddess Uma (Parvati)
				  </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with V 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vakratunda </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Curved Trunk Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Varaganapati </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Boons </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Varaprada </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Granter of Wishes and 
				  Boons </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Varadavinayaka </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Success
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Veeraganapati </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Heroic Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vidyavaridhi </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">God of Wisdom </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vighnahara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Remover of Obstacles
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vignaharta </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Demolisher of Obstacles
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vighnaraja </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Hindrances
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vighnarajendra </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Obstacles
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vighnavinashanaya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Destroyer of All 
				  Obstacles &amp; Impediments </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vigneshwara </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All Obstacles
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vikat </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Huge and Gigantic </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vinayaka </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Lord of All </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vishwamukha </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Master of The Universe
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Vishwaraja </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">King of The World </font></td>
				</tr>
				<tr>
				  <td width="100%" height="19" align="center" colspan="2">
				  <b><font face="Verdana" size="2">Starting with Y 
				  Alphabet</font></b></td>
				  </tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Yagnakaya </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Acceptor of All Sacred &amp; 
				  Sacrficial Offerings </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Yashaskaram </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Bestower of Fame and 
				  Fortune </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Yashvasin </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">Beloved and Ever Popular 
				  Lord </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  <font face="Verdana" size="2">Yogadhipa </font></td>
				  <td width="73%" height="19" align="center">
				  <font face="Verdana" size="2">The Lord of Meditation
				  </font></td>
				</tr>
				<tr>
				  <td width="27%" height="19" align="center">
				  &nbsp;</td>
				  <td width="73%" height="19" align="center">
				  &nbsp;</td>
				</tr>
			</tbody>
		</table>
    </div>
</div>