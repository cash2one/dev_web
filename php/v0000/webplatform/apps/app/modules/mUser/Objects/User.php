<?php

namespace mUser\Objects;

class User extends \C\Model
{
    protected $db;

    protected $logined;

    public function __construct()
    {
        $this->db = services('database');
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM {{users}} WHERE username=:username";

        $sth = $this->db->query($sql, [
            ':username' => $username,
        ]);

        if ($row = $sth->fetch()) {
            if (md5($password) == $row['password']) {
                $this->logined = true;
                return $row['uid'];
            }
        }

        return false;
    }
    
    public function getUid($uid)
    {
        $sql = "SELECT * FROM {{users}} WHERE uid=:uid";

        $sth = $this->db->query($sql, [':uid' => $uid]);

        if ($row = $sth->fetch()) {
            return $row['username'];
        }

        return '匿名用户';
    }    
}