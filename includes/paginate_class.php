<?php
	include ("connection.php");
	
	class Paginate extends Connection {
		//database connection infos
		private $dbhost = 'localhost';
		private $dbuser = 'username';
		private $dbpass = 'password';
		private $db = 'database';
		private $connect_db = FALSE;
		
		//pagination setup info
		private $current_page = 1;
		private $last_page = 0;
		
		function Paginate($page_number, $page_rows = 10, $query_count, $query_data)
		{
			//try to connect to database
			$this->connectdb("db_recordings");
			
			//page number getter. default is 1
			if ((!isset($page_number)) || (!is_numeric($page_number)) || ($page_number < 1)) {
				$page_number = 1;
			}
			
			//set class var $current_page
			$this->current_page = $page_number;
			
			//total result counter
			$result = mssql_query($query_count) or die(mssql_error());
			$rows = mssql_num_rows($result);
			
			//compute last page
			$last = ceil($rows / $page_rows);
			
			//set class var $last_page
			$this->last_page = $last;
			
			//test if we're on the last page
			if (($page_number > $last) && ($last > 0)) {
				$page_number = $last;
			}
			
			//get result based on page rows and range
			$result2 = mssql_query("$query_data") or die(mssql_error());
					
			//Show results
			echo $this->generate_result($result2);
		}

		private function generate_result($result)
		{
			//html container
			$html = NULL;
			
			//get fields
			$header = NULL;
			for ($i = 0; $i < mssql_num_fields($result); ++$i) {
			    // Fetch the field information
			    $field = mssql_fetch_field($result, $i);
				
				$header .= '<td>' . $field->name . '</td>';
			}
			
			//generate HTML table
			$html = "
				<table width=900 border=0 align=center cellspacing=1 bgcolor=#AFC7C7>
					<tr>
						$header
					</tr>
			";
			
			$j = 0;
			while ($info = mssql_fetch_array($result)) {
				$value = NULL;
				
				$color = $j % 2 == 0 ? "bgcolor='#C6DEFF'" : "bgcolor='#FFF5EE'";
				$j ++;
				
				//value getter
				for ($i = 0; $i < mssql_num_fields($result); ++$i) {
				    // Fetch the field information
				    $field = mssql_fetch_field($result, $i);
					
					$value .= '<td>' . $info[$field->name] . '</td>';
				}
				
				$html .= "<tr $color>$value</tr>";
				
			}
			
			$html .= "</table>";
			
			return $html;
		}
		
		public function generate_links()
		{
			//init
			$page_number = 1;
			
			//class var getter
			$page_number = $this->current_page;
			$last = $this->last_page;
			
			$page_number = $page_number >= $last ? $last : $page_number;
			$l_first = $page_number > 1 ? "<a href='{$_SERVER['PHP_SELF']}?page=1'>First</a>" : "";
			$l_next = $page_number < $last ? "<a href = '{$_SERVER['PHP_SELF']}?page=".($page_number + 1)."'>Next</a> " : "";
			$l_prev = $page_number > 1 ? "<a href = '{$_SERVER['PHP_SELF']}?page=".($page_number - 1)."'>Previous</a> " : "";
			$l_last = $page_number != $last ? "<a href = '{$_SERVER['PHP_SELF']}?page=".($last)."'>Last</a>" : "Last";
			//html container
			
			//generate number links
			$n_links = NULL;
			
			if($page_number >= 10 AND $page_number < ($last - 4)) {
				$n_first = $page_number - 5;
				$n_last = $page_number + 4;
				
			} elseif($page_number < 10) {
				$n_first = 1;
				$n_last = 10;
			} else {
				$n_first = $last - 9;
				$n_last = $last;
			}
			
			for ($i=$n_first; $i <= $n_last; $i++) { 
				$n_links .= $i != $page_number ? "<a href = '{$_SERVER['PHP_SELF']}?page=".($i)."'>$i</a> " : $i.' ';
			}
			
			
			$html = NULL;
			
			$html = "<div>";
				$html .= "<span>Page $page_number of $last</span> | <span>$l_first&nbsp;&nbsp;$l_prev&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$n_links&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$l_next&nbsp;&nbsp;$l_last</span>";
			$html .= "</div>";
			
			echo $html;
			
			return 1;
		}
		
	}
	
?>
