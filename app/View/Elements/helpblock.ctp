<?php

/**
 * helpblock.ctp is used to display the help index link as well as page specific help link
 */

	if(isset($this->viewVars['previousURL'])) echo $this->Html->link(__('Previous'),'/'.$this->viewVars['previousURL'],array('title'=>$this->viewVars['previousFormName'])).'<br>';
	echo $this->Html->link(__('Help Index'),'/',array('target'=>'none'));
	if(isset($this->viewVars['formhelp'])) echo '<br>'.$this->Html->link(__($this->viewVars['formName'].' Help'),$this->viewVars['formhelp'],array('target'=>'none'));
?>