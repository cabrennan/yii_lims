<?php

/**
 * 13Nov14 - CB
 * UserIdentity represents the data needed to authenticate a user.
 * Authenticate = valid uniqename & leve-1 password (does not give access)
 * User must still be authorized (have PEERS & XuHong assign permissions)
 * this is gotten from user table. 
 * Based on example found at: https://www.exchangecore.com/blog/yii-active-directory-useridentity-login-authentication/ 
 */
class UserIdentity extends CUserIdentity {

    const ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE = 1001; // could not bind anonymously to any domain controllers
    const ERROR_INVALID_CREDENTIALS = 1002; // could not bind with user's credentials
    const ERROR_NOT_PERMITTED = 1003; //user was not found in search criteria
    /// MCTP defined internal error codes
    const ERROR_NOT_MCTP = 114;
    const ERROR_INVALID_STATUS = 111;
    const ERROR_NO_PEERRS = 112;
    const ERROR_PEERRS_EXPIRED = 113;

    private $_options;
    // private $_domain;
    private $_email;
    private $_name;
    private $_firstName;
    private $_lastName;
    //private $_securityGroups;
    private $_loginEmail = false;
    private $_uniquename;

    public function __construct($uniquename = null, $password = null) {
        $this->_options = Yii::app()->params['ldap'];

        $this->username = $uniquename;
        $this->password = $password;

        if (strpos($uniquename, '@') !== false) {
            $this->_loginEmail = $uniquename;
            $exploded = explode('@', $uniquename);
            $this->user = $exploded[0];
        }
    }

    public function authenticate() {

        $this->errorCode = self::ERROR_NONE;
        if ($this->username != '' && $this->password != '') {
            $bind = false;
            $connected = false;
            $ldap = false;

            //connect to the first available domain controller in our list
            foreach ($this->_options['servers'] AS $server) {
                $ldap = ldap_connect($server);
                if ($ldap !== false) {
                    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
                    ldap_start_tls($ldap);  // UMICH required, talk on port 389

                    $connected = @ldap_bind($ldap); //test if we can connect to ldap using anonymous bind
                    if ($connected) {

                        $binddn = "uid=" . $this->username . ",ou=People,dc=umich,dc=edu";
                        $bind = @ldap_bind($ldap, $binddn, $this->password);
                        break; //we connected to one successfully
                    }
                }
            }

            //were we able to connect to any domain controller?
            if (!$connected) {
                $this->errorCode = self::ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE;
            } else {
                //were we able to authenticate to a domain controller as our user?
                if ($bind) {
                    $filter = '(uid=' . $this->username . ')';  // UID = UMICH Uniquename

                    $conn = array();
                    for ($i = 0; $i < count($this->_options['search']); $i++) {
                        $conn[] = $ldap;
                    }
                    $results = ldap_search($conn, $this->_options['search'], $filter);
                    $foundInSearch = false;
                    foreach ($results AS $result) {
                        $info = ldap_get_entries($ldap, $result);
                        if ($info['count'] > 0) {
                            $this->_firstName = (isset($info['0']['givenname']['0'])) ? ($info['0']['givenname']['0']) : ('');
                            $this->_lastName = (isset($info['0']['sn']['0'])) ? ($info['0']['sn']['0']) : ('');
                            $this->_email = (isset($info['0']['mail']['0'])) ? ($info['0']['mail']['0']) : ('');
                            $this->_uniquename = (isset($info['0']['uid']['0'])) ? ($info['0']['uid']['0']) : ('');
                            $this->_name = $this->_firstName . " " . $this->_lastName;
                            $foundInSearch = true;

                            // At this point login has been authenticated with uniquname & level-1 
                            // Now Check for local (MCTP) permissions in the user & role tables

                            $user = User::model()->findBySql("select * from user where uniquename = '" . $this->_uniquename . "'");
                            $count = count($user);
                            if ($count !== 1) {
                                // User is not in our tables - see Xuhong
                                $this->errorCode = self::ERROR_NOT_MCTP;
                                break;
                            }
                            if ($user->status !== "Active User") { // Not an 'A(ctive)' user - see Xuhong
                                $this->errorCode = self::ERROR_INVALID_STATUS;
                                break;
                            }
                            if ($user->peerrs !== "Exists") {
                                // User missing peerrs - see christine Betts
                                $this->errorCode = self::ERROR_NO_PEERRS;
                                break;
                            }
                            $select = "select datediff(peerrs_expire,curdate()) as days " .
                                    "from user where uniquename = '" . $this->_uniquename . "'";
                            $peerrsValid = Yii::app()->db->createCommand($select)->queryRow();
                            if ($peerrsValid['days'] < 1) {
                                // peerrs out of date - see Christine Betts
                                $this->errorCode = self::ERROR_PEERRS_EXPIRED;
                                break;
                            }
                            break;
                        }
                    }

                    if (!$foundInSearch) {
                        $this->errorCode = self::ERROR_NOT_PERMITTED;
                    }
                } else {
                    //if we can't bind to active directory it means that the username / password was invalid
                    $this->errorCode = self::ERROR_INVALID_CREDENTIALS;
                }
            }
        } else {
            //if username or password is blank don't even try to authenticate
            $this->errorCode = self::ERROR_INVALID_CREDENTIALS;
        }

        switch ($this->errorCode) {
            case self::ERROR_INVALID_CREDENTIALS :
                $this->errorMessage = 'Incorrect login information, please re-enter uniquename and Level-1 password.';
                break;
            case self::ERROR_NO_DOMAIN_CONTROLLER_AVAILABLE :
                $this->errorMessage = 'No domain controller available.';
                break;
            case self::ERROR_NOT_PERMITTED:
                $this->errorMessage = 'Not permitted in application.';
                break;
            case self::ERROR_NOT_MCTP:
                $this->errorMessage = 'MCTP_LIMS Internal: Not a user - see Xuhong Cao.';
                break;
            case self::ERROR_INVALID_STATUS:
                $this->errorMessage = 'MCTP_LIMS Internal: User status is not Active - see Xuhong Cao.';
                break;
            case self::ERROR_NO_PEERRS:
                $this->errorMessage = 'MCTP_LIMS Internal: No PEERS found - see Christine Betts.';
                break;
            case self::ERROR_PEERRS_EXPIRED:
                $this->errorMessage = 'MCTP_LIMS Internal: PEERRS Expired - see Christine Betts.';
                break;
            case self::ERROR_NONE :
                $this->setState('name', $this->_name);
                $this->setState('firstName', $this->_firstName);
                $this->setState('lastName', $this->_lastName);
                $this->setState('email', $this->_email);
                $this->setState('uniquename', $this->_uniquename);

                break;
            default : $this->errorMessage = 'Unable to Authenticate Uniquename';
        }


        return !$this->errorCode;
    }

    public function getName() {
        return $this->_name;
    }

}
