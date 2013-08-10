<script type="text/javascript">
function passvalidate(){
var npass = document.forms["myForm"]["newpass"].value;
var cpass = document.forms["myForm"]["confpass"].value;
	if(npass == '' || cpass == '')
	{
		alert('Please enter all fields');
		return false;
	}else if(npass != cpass){
		alert('sorry, Not matched. try again.');
		return false;
	}else{
		return true;
	}
}
</script>
<div class="title-bar">Reset Password</div>
<?php if($key_status == 0){ ?>

<div style="color:red"><h4>This link has been expired. Please try with new link.</h4></div>

<?php }else{ ?>
<form action="<?php echo Yii::app()->createUrl('user/changepassword');?>" method="POST" name="myForm" onsubmit="return passvalidate();">
<table width="100%">
<tr>
<td style="width:30%">New Password </td><td><input type="password" name="newpass" id="npass" class="span8"/></td>
</tr>
<tr>
<td style="width:30%">Confirm password</td> <td><input type="password" name="confpass" id="cpass" class="span8"/></td>
</tr>
<input type="hidden" name="key" value="<?php echo $key; ?>"/>
<tr>
<td>&nbsp;</td><td><input type="submit" name="chngepass" value="Change Password" class="btn"/></td>
</tr>
</table>
</form>
<?php } ?>