<?php
$user = new App\Models\User();
$user->name = 'WilliamFriend';
$user->email = 'william.friend777@gmail.com';
$user->password = bcrypt('!password');
$user->save();