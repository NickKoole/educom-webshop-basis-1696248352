<?php
    
    function storeUser($email, $name, $password){
        include 'file_repository.php';
        registerNewAccount($name, $email, $password);
    }

    function authenticateUser($email, $password) {
        
        $users = fopen("users.txt", "r") or die("Unable to open file!");
        try {
            //Controleer of email en password overeenkomen met een bestaande user
            while(!feof($users)) {            
                $account = explode("|", fgets($users));
                trim($account[2]);
                if ($account[0] == $email && $account[2] == $password) {
                
                    return True;
                }
            }
            return False;
        }
        finally {
            fclose($users);
        }              
    }    
?>