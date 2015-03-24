<?php
/**
 * This file is part of the Url package.
 *
 * (c) Daniel González <daniel@desarrolla2.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FastFeed\Url;

/**
 * UrlTest
 */
class UrlTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function dataProviderForTestGetScheme()
    {
        return array(
            array('https://google.com', 'https'),
            array('http://google.com', 'http'),
            array('ftp://google.com', 'ftp')
        );
    }

    /**
     * @param $url
     * @param $expectedScheme
     *
     * @dataProvider dataProviderForTestGetScheme
     */
    public function testGetScheme($url, $expectedScheme)
    {
        $url = new Url($url);
        $this->assertEquals($expectedScheme, $url->getScheme());
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetHost()
    {
        return array(
            array('https://google.com', 'google.com'),
            array('http://google.com:8080', 'google.com'),
            array('http://127.0.0.1:8080', '127.0.0.1'),
            array('http://localhost:8080', 'localhost'),
        );
    }

    /**
     * @param $url
     * @param $expectedHost
     *
     * @dataProvider dataProviderForTestGetHost
     */
    public function testGetHost($url, $expectedHost)
    {
        $url = new Url($url);
        $this->assertEquals($expectedHost, $url->getHost());
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetPort()
    {
        return array(
            array('https://google.com', null),
            array('http://google.com:8080', '8080'),
        );
    }

    /**
     * @param $url
     * @param $expectedPort
     *
     * @dataProvider dataProviderForTestGetPort
     */
    public function testGetPort($url, $expectedPort)
    {
        $url = new Url($url);
        $this->assertEquals($expectedPort, $url->getPort());
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetPath()
    {
        return array(
            array('https://google.com', ''),
            array('https://google.com/1', '/1'),
        );
    }

    /**
     * @param $url
     * @param $expectedPath
     *
     * @dataProvider dataProviderForTestGetPath
     */
    public function testGetPath($url, $expectedPath)
    {
        $url = new Url($url);
        $this->assertEquals($expectedPath, $url->getPath());
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetFragment()
    {
        return array(
            array('https://google.com', ''),
            array('https://google.com/1#1', '1'),
        );
    }

    /**
     * @param $url
     * @param $expectedFragment
     *
     * @dataProvider dataProviderForTestGetFragment
     */
    public function testGetFragment($url, $expectedFragment)
    {
        $url = new Url($url);
        $this->assertEquals($expectedFragment, $url->getFragment());
    }

}