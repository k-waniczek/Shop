<?php

    echo $this->Html->css("form");
    echo $this->Html->script("login");
    echo $this->Html->css("registerAndLogin");

?>
<div id="main">
    <h1><?=__("login_form")?></h1>
    <div id="loginForm">
        <?php
            echo $this->Form->create("loginUserForm", array("url" => "/login-customer"));
            echo $this->Form->input("email", array("type" => "email", "label" => "", "placeholder" => __("email")));
            echo $this->Form->input("password", array("type" => "password", "label" => "", "placeholder" => __("password")));
            echo "<a href='forgot-password-page'>Forgot password</a>";
            echo $this->Form->end(__("login"));
        ?>
    </div>
</div>
<?php
    if ($this->Session->read("forgotPasswordEmailSent")) {
        echo "<script>Swal.fire({icon: \"success\",text: \"Email with reset password link has been sent.\",showConfirmButton: true,timer: 5000,timerProgressBar: true});</script>";
        $_SESSION["forgotPasswordEmailSent"] = false;
    }
?>

