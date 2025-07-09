<?php	 

		function execute_query($query)
		{
			// estabelecer uma conexão com o banco de dadods
			$mysqli = new mysqli( HOST_DB, USER_DB, PASS_DB, DATABASE);
					
						if (mysqli_connect_error())
						{
							echo "falha";
						}
						
						else
						{
							return $mysqli -> query($query);
							echo "ftete";
						}
		}
		
			
						
						
						?>