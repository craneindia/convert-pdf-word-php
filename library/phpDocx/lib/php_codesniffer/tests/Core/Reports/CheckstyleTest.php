<?php
/**
 * Tests for the Checkstyle report.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Gabriele Santini <gsantini@sqli.com>
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2009 SQLI <www.sqli.com>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   CVS: $Id: IsCamelCapsTest.php 240585 2007-08-02 00:05:40Z squiz $
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once dirname(__FILE__).'/AbstractTestCase.php';

/**
 * Tests for the Checkstyle report.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Gabriele Santini <gsantini@sqli.com>
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2009 SQLI <www.sqli.com>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   Release: 1.3.0RC1
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Core_Reports_CheckstyleTest extends Core_Reports_AbstractTestCase
{


    /**
     * Tests standard report.
     *
     * @return void
     */
    public function testGenerate()
    {
        $checkstyleReport = new PHP_CodeSniffer_Reports_Checkstyle();
        $generated        = $this->getFixtureReport($checkstyleReport);
        $xmlDocument      = new DOMDocument();

        $xmlDocument->loadXML($generated);
        $result = $xmlDocument->schemaValidate(
            dirname(__FILE__).'/XSD/Checkstyle.xsd'
        );

        $this->assertTrue($result);

    }//end testGenerate()


}//end class

?>
