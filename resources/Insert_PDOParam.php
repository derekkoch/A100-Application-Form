<?php

	function GetPDOParam ($Type){
		if(strpos($Type, "char") !==FALSE){return PDO::PARAM_STR;}
		else if(strpos($Type, "text")!== FALSE){return PDO::PARAM_STR;}
		else if (strpos($Type, "int")!== FALSE){ return PDO::PARAM_INT;}
		else if (strpos($Type, "bit")!== FALSE){ return PDO::PARAM_BOOL;}
		else throw new Exception("Unknown Data Type: ".$Type);
	}

?>