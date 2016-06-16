<?php

namespace  App\user;

require '\framework\BaseDataObj.php';

class UserObj extends \core\BaseDataObj {
    
    public $userId;
    public $userName;
    public $loginAccount;
    public function __construct()
    {        
        $this->userId = 1000;
        echo "userId ".$this->userId."<br>";
    }
}
