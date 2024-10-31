<?php
unset($_SESSION['ses_mail']);
unset($_SESSION['ses_pass']);
session_destroy();
header("Location: /");
