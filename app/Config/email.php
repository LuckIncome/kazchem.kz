<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {
	
	public $default = array(
		'transport' => 'Mail',
		'from' => 'no-reply@kazchem.kz',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	//kazchemtrading@yandex.kz
	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('info@kazchem.kz' => 'My Site'),
		'host' => 'SMTP.Office365.com',
		'port' => 587,
		'timeout' => 30,
		'username' => 'info@kazchem.kz',
		'password' => 'Joz04589',
		'client' => null,
		'log' => false,
		'charset' => 'utf-8',
		'SMTPSecure' => 'starttls',
    'tls' => true,
    'context'=>array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )), 
		'headerCharset' => 'utf-8',
	);
	// public $smtp = array(
	//  	'transport' => 'Smtp',
	//  	'from' => array('no-reply@kazchem.kz' => 'no-reply@kazchem.kz'),
	//  	'host' => 'mail.kazchem.kz',
	//  	'port' => 25,
	//  	'timeout' => 30,
	//  	'username' => 'no-reply@kazchem.kz',
	//  	'password' => '890r&dCd',
	//  	'client' => null,
	// 	'log' => false,
 // 	    'charset' => 'utf-8',
	//  	'headerCharset' => 'utf-8',
	//  );

}
