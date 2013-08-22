<script type="text/javascript">
function validatechange()
{
var oldpass = document.getElementById('oldpass').value;
var newpass = document.getElementById('newcpass').value;
var confpass = document.getElementById('newconfpass').value;
	if(oldpass == '' || newpass == ''  || confpass == ''){
		alert('Please enter all the fields');
		return false;
	}
	if(newpass != confpass){
		alert('Your new password and confirm password should be same');
		return false;
	}
}
</script>

<div class="title-bar">Change your password</div>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
if(isset($_REQUEST['error']) && $_REQUEST['error'] == 'wp')
{
echo "<p style='color:red'>Your old password is wrong.Please try again</p>";
}

?>
<form action="<?php echo Yii::app()->createUrl('user/chngoldpass')?>" method="POST" onsubmit="return validatechange();">
	<table width="100%">
	<tr>
	<td>Old Password</td><td><input type="password" name="oldpass" class="span8" id="oldpass"/></td>
	</tr>
	<tr>
	<td>New Password</td><td><input type="password" name="newpass" class="span8" id="newcpass"/></td>
	</tr>
	<tr>
	<td>Confirm New Password</td><td><input type="password" name="confpass" class="span8" id="newconfpass"/></td>
	</tr>
	<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Change" class="btn btn-primary"/></td>
	</tr>
	</table>
</form>