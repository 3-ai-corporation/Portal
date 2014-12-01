<?php
session_start();
$email=$_POST['email'];

if (isValidEmail($email))
{
 echo "ok";
}
else
{
 echo "nope";
}

//Função de checagem
function isValidEmail($email)
{
//Verifica se o valor é válido
//Caso falhe, não é necessário continuar

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
return false;
}

//Extrai o domínio
list($user, $host) = explode("@", $email);
//Verifica se o domínio esta acessível
if (!checkdnsrr($host, "MX") && !checkdnsrr($host, "A"))
{
return false;
}

return true;
}
?>