<div id="authentication-wrapper">
    <div id="authentication">
        <div id="register">
            <h1>Register</h1>
            <?php $this->renderPartial('//user/short_register',array('model'=>$register)); ?>
        </div>
        <div id="login">
            <h1>Login</h1>
            <?php $this->renderPartial('//user/login',array('model'=>$login)); ?>
        </div>
    </div>
</div>