<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class InformaChic extends Module
  {
  public function __construct()
    {
    $this->name = 'informachic';
    $this->tab = 'test';
    $this->version = 1.0;
    $this->author = 'Informa Chic';
    $this->need_instance = 0;
 
    parent::__construct();
 
    $this->displayName = $this->l('InformaChic');
    $this->description = $this->l('Module return.');
    }
 

public function install()
  {
  if (parent::install() == false OR !$this->registerHook('leftColumn'))
    return false;
  return true;
  }
 
  public function uninstall()
	{
	  if (!parent::uninstall())
		Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'informachic`');
	  parent::uninstall();
	}
 public function hookLeftColumn($params)
  {
  global $smarty;
  return $this->display(__FILE__, 'informachic.tpl');
  }
 
public function hookRightColumn($params)
  {
  return $this->hookLeftColumn($params);
  }
  }
?>