<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<?php

echo $this->Html->script("forgot_password");

echo $this->Form->create("forgotPasswordForm", array("url" => "/send-forgot-password-email"));
echo $this->Form->input("email", array("type" => "email", "label" => "", "placeholder" => "Email"));
echo "<div class='g-recaptcha' data-sitekey='6LfVFXUfAAAAAElmtQKXvt_3HFLJvNE2Mi4UR3IY'></div>";
echo $this->Form->end("submit");

?>