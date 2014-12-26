<?php
function authenticate($user, $password) {
    // Active Directory server
    $ldaphost = "ldap://192.168.0.5";
    $ldapport = 389; 

$ldap = ldap_connect($ldaphost, $ldapport)
or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
//ldap_set_option($ds, LDAP_OPT_DEBUG_LEVEL, 7);

    // Active Directory DN
    $ldap_dn = "ou=people,dc=sahyadrischool,dc=org";
 
    // Active Directory user group
    $ldap_user_group = "teachers";
 
    // Active Directory manager group
    $ldap_manager_group = "manager";
 
    // Domain, for purposes of constructing $user
    //$ldap_usr_dom = "@college.school.edu";
 
    // verify user and password
    if($bind = @ldap_bind($ldap, $user, $password)) {
        // valid
        // check presence in groups
        $filter = "(sAMAccountName=" . $user . ")";
        $attr = array("memberof");
        $result = ldap_search($ldap, $ldap_dn, $filter, $attr) or exit("Unable to search LDAP server");
        $entries = ldap_get_entries($ldap, $result);
        ldap_unbind($ldap);
 
        // check groups
        foreach($entries[0]['memberof'] as $grps) {
            // is manager, break loop
            if (strpos($grps, $ldap_manager_group)) { $access = 2; break; }
 
            // is user
            if (strpos($grps, $ldap_user_group)) $access = 1;
        }
 
        if ($access != 0) {
            // establish session variables
            $_SESSION['user'] = $user;
            $_SESSION['access'] = $access;
            return true;
        } else {
            // user has no rights
            return false;
        }
 
    } else {
        // invalid name or password
        return false;
    }
}
?>
