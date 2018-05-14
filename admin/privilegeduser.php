<?php
class PrivilegedUser extends User
{
    private $roles;

    public function __construct() {
        parent::__construct();
    }

    // override User method
    //public static function getByUsername($email)
	public static function getUserByEmail($email){
        $sql = "SELECT * FROM tb_user WHERE email = :email";
        $sth = $GLOBALS["DB"]->prepare($sql);
        $sth->execute(array(":email" => $email));
        $result = $sth->fetchAll();

        if (!empty($result)) {
            $privUser = new PrivilegedUser();
            $privUser->id = $result[0]["id"];
            $privUser->email = $email;
            $privUser->password = $result[0]["password"];
            //$privUser->email_addr = $result[0]["email_addr"];
            $privUser->initRoles();
            return $privUser;
        } else {
            return false;
        }
    }

    // populate roles with their associated permissions
    protected function initRoles() {
        $this->roles = array();
        $sql = "SELECT t1.role_id, t2.role_name FROM user_role as t1
                JOIN roles as t2 ON t1.role_id = t2.role_id
                WHERE t1.id = :id";
        $sth = $GLOBALS["DB"]->prepare($sql);
        $sth->execute(array(":id" => $this->id));

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $this->roles[$row["role_name"]] = Role::getRolePerms($row["role_id"]);
        }
    }

    // check if user has a specific privilege
    public function hasPrivilege($perm) {
        foreach ($this->roles as $role) {
            if ($role->hasPerm($perm)) {
                return true;
            }
        }
        return false;
    }
}