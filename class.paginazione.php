<?php
class Paginazione
{
	private $max_pagina;
	private $pagina;
	private $redirectTo;
	public function __construct($max_pagina,$redirectTo = 'index.php?')
	{
		$this->max_pagina=$max_pagina;
		$this->_redirectTo = $redirectTo;
		(isset($_GET['pagina']))?$this->pagina=$_GET['pagina']:$this->pagina=1;
	}
	//ritona il numero delle pagine
	public function getNumPagine($num_rows)
	{
		return ceil($num_rows/$this->max_pagina);
	}
	//start paginazione per pagina
	public function getStart()
	{
		$start=($this->pagina-1)*$this->max_pagina;
		return $start;
	}
	public function getLink($num_pagine)
	{
		$link='';
		
		if(($this->pagina>1)&&($this->pagina<=$num_pagine))
		{
			$pag=$this->pagina-1;
			$link.="<a href='".$this->_redirectTo."pagina=$pag'>Indietro</a> ";
		}
		$p=0;
		if($this->pagina>=1&&$this->pagina < 4)
		{
			$p=1;
		}
		else{
			$p=$this->pagina-2;
			if($this->pagina>4)
			{
				$link.="<a href='".$this->_redirectTo."&pagina=1'style='text-decoration:none'>1</a> ... ";
			}
			if($p<0)$p=0;
		}
		if($this->pagina<$num_pagine-4)
		{
			$a=$this->pagina+4;
		}
		else{
			$a=$num_pagine;
		}
		
		for($i=$p;$i<=$a;$i++)
		{
			if($this->pagina==$i)
			{
				$link.="<a href='".$this->_redirectTo."&pagina=$i'style='text-decoration:none'>[$i]</a> ";
			}
			else {
				$link.="<a href='".$this->_redirectTo."&pagina=$i'style='text-decoration:none'>$i</a> ";
			}
		}
		if($this->pagina<$num_pagine-4)
		{
			$link.="... <a href='".$this->_redirectTo."&pagina=$num_pagine'style='text-decoration:none'>$num_pagine</a>";
		}
		
		if(($this->pagina>0)&&($this->pagina<$num_pagine))
		{
			$pag=$this->pagina+1;
			$link.="<a href='".$this->_redirectTo."pagina=$pag'>Avanti</a> ";
		}
		return $link;
	}
	
}

?>