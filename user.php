<?php

require_once('object.php');

class Client implements Obj {
    private $id;
    private $dbInfo;

    public function __construct($id) {
        $dbInfo = array(
            'name'=>'Matthew Sanders',
            'username'=>'matt',
            'password'=>'###',
            'addr1'=>'address line 1',
            'addr2'=>'address line 2',
            'city'=>'Minneapolis',
            'state'=>'MN',
            'zip'=>'55417',
        );
    }

    public function getTitle() {
        return $this->getName();
    }

    public function getName() {
        return $this->dbInfo['name'];
    }

    public function setName($name) {
        $this->dbInfo['name'] = $name;
    }

    public function getUsername() {
        return $this->dbInfo['username'];
    }

    public function setUsername($username) {
        $this->dbInfo['username'] = $username;
    }

    public static function checkPassword($user,$pass) {
        return false;
    }

    public function setPassword($pass) {
        /* TODO */
    }

    public function getAddress1() {
        return $this->dbInfo['addr1'];
    }

    public function setAddress1($addr) {
        $this->dbInfo['addr1'] = $addr;
    }

    public function getAddress2() {
        return $this->dbInfo['addr2'];
    }

    public function setAddress2($addr) {
        $this->dbInfo['addr2'] = $addr;
    }

    public function getCity() {
        return $this->dbInfo['city'];
    }

    public function setCity($city) {
        $this->dbInfo['city'] = $city;
    }

    public function getState() {
        return $this->dbInfo['state'];
    }

    public function setState($state) {
        $this->dbInfo['state'] = $state;
    }

    public function getZip() {
        return $this->dbInfo['zip'];
    }

    public function setZip($zip) {
        $this->dbInfo['zip'] = $zip;
    }






    public function getPreview() {
        return '';
    }

    public function getInfoPage() {
        $html = '<form method="POST" action="'.getLink(array('form'=>'user')).'">'.
                '<label>Full Name: <input type="text" name="user[name]" value="'.$this->getName().'" /></label>'.
                '<br />'.
                '<label>Username: <input type="text" name="user[username]" value="'.$this->getUsername().'" /></label>'.
                '<br />'.
                '<label>Password: <input type="password" name="user[password]" value="" /></label>'.
                '<br />'.
                '<label>Address Line 1: <input type="text" name="user[addr1]" value="'.$this->getAddress1().'" /></label>'.
                '<br />'.
                '<label>Address Line 2: <input type="text" name="user[addr2]" value="'.$this->getAddress2().'" /></label>'.
                '<br />'.
                '<label>City: <input type="text" name="user[city]" value="'.$this->getCity().'" /></label>'.
                '<br />'.
                '<label>State: <input type="text" name="user[state]" value="'.$this->getState().'" /></label>'.
                '<br />'.
                '<label>Zipcode: <input type="text" name="user[zip]" value="'.$this->getZip().'" /></label>'.
                '<br />'.
                '<button type="submit">Save Changes</button>'.
            '</form>';
        return $html;
    }


    public static function handleForm($data) {
        $c = new Client(null);
        $c->dbInfo = $data;
        return $c;
    }

}

?>
