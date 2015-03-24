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
 * Url
 */
class Url
{

    /**
     * @var string
     */
    protected $scheme;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $port;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $fragment;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * scheme://host:port/path?query_string#fragment
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $parsed = parse_url($url);
        if (!$parsed) {
            return new \InvalidArgumentException($url . ' is not a valid url');
        }

        foreach (array('scheme', 'host', 'port', 'path', 'fragment') as $element) {
            if (isset($parsed[$element])) {
                $this->$element = $parsed[$element];
            } else {
                $this->$element = null;
            }
        }
        if (isset($parsed['query'])) {
            $items = explode('&', $parsed['query']);
            foreach ($items as $item) {
                $value = explode('=', $item);
                $this->parameters[(string)$value[0]] = (string)$value[1];
            }
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $parameter
     *
     * @return string
     */
    public function getParameter($parameter)
    {
        return $this->parameters[(string)$parameter];
    }

    /**
     * @param string $parameter
     * @param string $value
     */
    public function setParameter($parameter, $value)
    {
        $this->parameters[(string)$parameter] = (string)$value;
    }

    /**
     *
     */
    public function resetParameters()
    {
        $this->parameters = array();
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->resetParameters();
        foreach ($parameters as $parameter => $value) {
            $this->setParameter($parameter, $value);
        }
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        $query = '';
        foreach ($this->parameters as $parameter => $value) {
            $query .= '&' . $parameter . '=' . $value;
        }

        return substr($query, 1);
    }

    /**
     * @return string
     */
    public function getFullHost()
    {
        return
            ($this->getScheme() ? $this->getScheme() . '://' : '') .
            ($this->getHost() ? $this->getHost() : '') .
            ($this->getPort() ? ':' . $this->getPort() : '');
    }

    public function getFullPath()
    {
        return
            ($this->getPath() ? $this->getPath() : '') .
            ($this->getQuery() ? '?' . $this->getQuery() : '') .
            ($this->getFragment() ? '#' . $this->getFragment() : '');
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->getFullHost() . $this->getFullPath();
    }
}