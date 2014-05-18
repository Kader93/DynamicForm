<?php

namespace DynamicFormTest\Model;

use DynamicForm\Model\FormConfigManager\File;
use PHPUnit_Framework_TestCase;

class FileTest extends PHPUnit_Framework_TestCase
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
        $this->assertTrue(is_array(self::$filetest->getArrayConfig(self::$strContentsfile)));
    }

    public static function tearDownAfterClass()
    {
        self::$filepath = NULL;
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
     * @expectedExceptionMessage parsing échoué
     */
    public function testEchecParsing()
    {
        $str= "blabla";
        $filepath = \DynamicForm\Module::$ModuleLocation . "/ressources/Json/membreForm.config.json";
        $filetest = new File($filepath);
        $filetest->getArrayConfig($str);

    }
}