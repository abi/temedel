<?php
/* SVN FILE: $Id: session.test.php 5811 2007-10-20 06:39:14Z phpnut $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package			cake.tests
 * @subpackage		cake.tests.cases.libs.view.helpers
 * @since			CakePHP(tm) v 1.2.0.4206
 * @version			$Revision: 5811 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-10-20 01:39:14 -0500 (Sat, 20 Oct 2007) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
if (!defined('CAKEPHP_UNIT_TEST_EXECUTION')) {
	define('CAKEPHP_UNIT_TEST_EXECUTION', 1);
}

require_once CAKE.'app_helper.php';
uses('controller'.DS.'controller', 'model'.DS.'model', 'view'.DS.'helper', 'view'.DS.'helpers'.DS.'session');

/**
 * Short description for class.
 *
 * @package		cake.tests
 * @subpackage	cake.tests.cases.libs.view.helpers
 */
class SessionHelperTest extends UnitTestCase {

	function skip() {
		$this->skipif (true, 'SessionHelper test not implemented');
	}

	function setUp() {
		$this->Session = new SessionHelper();
	}

	function tearDown() {
		unset($this->Session);
	}
}

?>