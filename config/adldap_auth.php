<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Connection
    |--------------------------------------------------------------------------
    |
    | The LDAP connection to use for laravel authentication.
    |
    | You must specify connections in your `config/adldap.php` configuration file.
    |
    | This must be a string.
    |
    */

    'connection' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Provider
    |--------------------------------------------------------------------------
    |
    | The LDAP authentication provider to use depending
    | if you require database synchronization.
    |
    | For synchronizing LDAP users to your local applications database, use the provider:
    |
    | Adldap\Laravel\Auth\DatabaseUserProvider::class
    |
    | Otherwise, if you just require LDAP authentication, use the provider:
    |
    | Adldap\Laravel\Auth\NoDatabaseUserProvider::class
    |
    */

    'provider' => Adldap\Laravel\Auth\DatabaseUserProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Username Attribute
    |--------------------------------------------------------------------------
    |
    | The username attribute is an array of the html input name and the LDAP
    | attribute to discover the user by. The reason for this is to hide
    | the attribute that you're using to login users.
    |
    | For example, if your HTML input name is `email` and you'd like users to login
    | by their LDAP `mail` attribute, then keep the configuration below. However,
    | if you'd like to login users by their usernames, then change `mail`
    | to `samaccountname`. and `email` to `username`.
    |
    | This must be an array with a key - value pair.
    |
    */

    'username_attribute' => ['username' => env('LDAP_USERNAME_ATTRIBUTE')],

    /*
    |--------------------------------------------------------------------------
    | Limitation Filter
    |--------------------------------------------------------------------------
    |
    | The limitation filter allows you to enter a raw filter to only allow
    | specific users / groups / ous to authenticate.
    |
    | For an example, to only allow users inside of a group
    | named 'Accounting', you would insert the Accounting
    | groups full distinguished name inside the filter:
    |
    | '(memberof=cn=Accounting,dc=corp,dc=acme,dc=org)'
    |
    | This value must be a standard LDAP filter.
    |
    */

    'limitation_filter' => env('LDAP_LIMITATION_FILTER', ''),

    /*
    |--------------------------------------------------------------------------
    | Login Fallback
    |--------------------------------------------------------------------------
    |
    | The login fallback option allows you to login as a user located on the
    | local database if active directory authentication fails.
    |
    | Set this to true if you would like to enable it.
    |
    | This option must be true or false.
    |
    */

    'login_fallback' => env('LDAP_LOGIN_FALLBACK', false),

    /*
    |--------------------------------------------------------------------------
    | Password Key
    |--------------------------------------------------------------------------
    |
    | The password key is the name of the input array key located inside
    | the user input array given to the auth driver.
    |
    | Change this if you change your password fields input name.
    |
    | This option must be a string.
    |
    */

    'password_key' => env('LDAP_PASSWORD_KEY', 'password'),

    /*
    |--------------------------------------------------------------------------
    | Password Sync
    |--------------------------------------------------------------------------
    |
    | The password sync option allows you to automatically synchronize
    | users AD passwords to your local database. These passwords are
    | hashed natively by laravel using the bcrypt() method.
    |
    | Enabling this option would also allow users to login to their
    | accounts using the password last used when an AD connection
    | was present.
    |
    | If this option is disabled, the local user account is applied
    | a random 16 character hashed password, and will lose access
    | to this account upon loss of AD connectivity.
    |
    | This option must be true or false.
    |
    */

    'password_sync' => env('LDAP_PASSWORD_SYNC', false),

    /*
    |--------------------------------------------------------------------------
    | Login Attribute
    |--------------------------------------------------------------------------
    |
    | The login attribute is the name of the active directory user property
    | that you use to log users in. For example, if your company uses
    | email, then insert `mail`.
    |
    | This option must be a string.
    |
    */

    'login_attribute' => env('LDAP_LOGIN_ATTRIBUTE', 'samaccountname'),

    /*
    |--------------------------------------------------------------------------
    | Bind User to Model
    |--------------------------------------------------------------------------
    |
    | The 'bind user to model' option allows you to access the authenticated
    | Adldap user model instance on your laravel User model.
    |
    | If this option is true, you must insert the trait:
    |
    |   `Adldap\Laravel\Traits\AdldapUserModelTrait`
    |
    | Onto your User model that is configured in `config/auth.php`.
    |
    | Then use `Auth::user()->adldapUser` to access.
    |
    | This option must be true or false.
    |
    */

    'bind_user_to_model' => true,

    /*
    |--------------------------------------------------------------------------
    | Sync Attributes
    |--------------------------------------------------------------------------
    |
    | Attributes specified here will be added / replaced on the user model
    | upon login, automatically synchronizing and keeping the attributes
    | up to date.
    |
    | The array key represents the Laravel model key, and the value
    | represents the Active Directory attribute to set it to.
    |
    | Your login attribute (configured above) is already synchronized
    | and does not need to be added to this array.
    |
    */

    'sync_attributes' => [

        'name' => env('LDAP_USER_NAME'),
        'mail' => env('LDAP_USER_EMAIL')

    ],

    /*
    |--------------------------------------------------------------------------
    | Select Attributes
    |--------------------------------------------------------------------------
    |
    | Attributes to select upon the user on authentication and binding.
    |
    | If no attributes are given inside the array, all attributes on the
    | user are selected.
    |
    | This is configurable to allow for faster LDAP queries, rather
    | than retrieving all attributes on every login.
    |
    | ** Note ** : Keep in mind you must include attributes that you would
    | like to synchronize, as well as your login attribute.
    |
    */

    'select_attributes' => [

        //

    ],

];
