<?php
session_name('bumpr');
session_start();
session_destroy();
header('Location: ./');

