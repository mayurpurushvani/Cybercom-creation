<?php

namespace Block\Core;

class Template
{
    protected $controller;
    protected $template = null;
    protected $tableRow = null;
    protected $children = [];
    protected $url = null;
    protected $request = null;
    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct()
    {
        $this->setUrl();
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTabs(array $tabs = [])
    {
        $this->tabs = $tabs;
        return $this;
    }
    public function getTabs()
    {
        return $this->tabs;
    }
    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }
    public function removeTab($key)
    {
        if (array_key_exists($key, $this->tabs)) {
            unset($this->tabs[$key]);
        }
    }

    public function setRequest($request = null)
    {
        $request = \Mage::getModel('Model\Core\Request');
        $this->request = $request;
        return $this;
    }
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function setController(\Controller\Core\Admin $controller)
    {
        $this->controller = $controller;
        return $this;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function setUrl($url = null)
    {
        if (!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;
    }
    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    public function toHtml()
    {
        ob_start();
        require_once $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function setChildren(array $children = [])
    {
        $this->children = $children;
        return $this;
    }
    public function getChildren()
    {
        return $this->children;
    }
    public function addChild(\Block\Core\Template $child, $key = null)
    {
        if (!$key) {
            $key = get_class($child);
        }
        $this->children[$key] = $child;
        return $this;
    }

    public function getChild($key)
    {
        if (!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }
    public function removeChild($key)
    {
        if (array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }
    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }
    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');  
    }
    public function baseUrl($subUrl = null)
    {
        return $this->getUrl()->baseUrl($subUrl);
    }
}
