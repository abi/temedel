<?php
/* SVN FILE: $Id: translated_item_fixture.php 5811 2007-10-20 06:39:14Z phpnut $ */
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
 * @subpackage		cake.tests.fixtures
 * @since			CakePHP(tm) v 1.2.0.5669
 * @version			$Revision: 5811 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-10-20 01:39:14 -0500 (Sat, 20 Oct 2007) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package		cake.tests
 * @subpackage	cake.tests.fixtures
 */
class TranslatedItemFixture extends CakeTestFixture {
	var $name = 'TranslatedItem';
	var $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
			'slug' => array('type' => 'string', 'null' => false));
	var $records = array(
			array('id' => 1, 'slug' => 'first_translated'),
			array('id' => 2, 'slug' => 'second_translated'),
			array('id' => 3, 'slug' => 'third_translated'));
}
?>