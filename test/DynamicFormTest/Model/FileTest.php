<?php

namespace DynamicFormTest\Framework;
use DynamicForm\Model\FormConfigManager\File;
use PHPUnit_Framework_TestCase;

class FormTest extends PHPUnit_Framework_TestCase
{
    protected static $filepath;
    protected static $filetest;
    protected static $strContentsfile;

    public static function setUpBeforeClass()
    {
        self::$filepath = \DynamicForm\Module::$ModuleLocation . "/ressources/Json/membreForm.config.json";
        self::$filetest = new File(self::$filepath);
    }

    public function testgetContentsFile()
    {
        $this->assertTrue(is_string(self::$filetest->getContentsFile()));
    }

    public function testgetArrayConfig()
    {
        self::$strContentsfile = self::$filetest->getContentsFile(self::$strContentsfile);
        $this->assertTrue(is_array(self::$filetest->getArrayConfig(self::$strContentsfile)));
    }

    public static function tearDownAfterClass()
    {
        self::$filepath = NULL;
    }

    public function testNoArray()
    {
        $str= "blabla";
        $strjson1 = include (\DynamicForm\Module::$ModuleLocation . "/ressources/phpConfig/filtersconfig.php");
        $strjson = json_encode($strjson1);
        var_dump($strjson);
        $filepath = \DynamicForm\Module::$ModuleLocation . "/ressources/Json/membreForm.config.json";
        $filetest = new File($filepath);
        $this->assertFalse($filetest->validElement($str));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage file doesn't exist or hasn't the good extension
     */
    public function testExistConfig()
    {
        $filepath= "";
        $filetest = new File($filepath);
        $filetest->getContentsFile();

    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Parsing failed
     */
    public function testEchecParsing()
    {
        $str= "blabla";
        $filepath = \DynamicForm\Module::$ModuleLocation . "/ressources/Json/membreForm.config.json";
        $filetest = new File($filepath);
        $filetest->getArrayConfig($str);
    }
}
