<?php
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	$paginate = '';
	if($lastpage > 1){	
		$paginate .= "<ul class='pagination'>";
		// Previous
		if ($page > 1){
			$paginate.= "<li class='previous'><a href='$targetpage?h=$prev' cyine-ajax><i class='ti-arrow-left'></i> Prev</a></li>";
		}else{
			$paginate.= "<li class='previous'><a href='javascript:void(0);'><i class='ti-arrow-left'></i> Prev</a></li>";	}
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<li class='active'><a href='javascript:void(0);'>$counter</a></li>";
				}else{
					$paginate.= "<li><a href='$targetpage?h=$counter' cyine-ajax>$counter</a></li>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='javascript:void(0); class='active'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?h=$counter' cyine-ajax>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$targetpage?h=$LastPagem1' cyine-ajax>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage?h=$lastpage' cyine-ajax>$lastpage</a></li>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<li><a href='$targetpage?h=1' cyine-ajax>1</a></li>";
				$paginate.= "<li><a href='$targetpage?h=2' cyine-ajax>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='javascript:void(0); class='active'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?page=$counter' cyine-ajax>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$targetpage?h=$LastPagem1' cyine-ajax>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage?h=$lastpage' cyine-ajax>$lastpage</a></li>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<li><a href='$targetpage?h=1' cyine-ajax>1</a></li>";
				$paginate.= "<li><a href='$targetpage?h=2' cyine-ajax>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='javascript:void(0); class='active'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?h=$counter' cyine-ajax>$counter</a></li>";}					
				}
			}
		}
		if ($page < $counter - 1){ 
			$paginate.= "<li class='next'><a href='$targetpage?h=$next' cyine-ajax>Next <i class='ti-arrow-right'></i></a></li>";
		}else{
			$paginate.= "<li class='next'><a href='javascript:void(0);'>Next <i class='ti-arrow-right'></i></a></li>";
		}
		$paginate.= "</ul>";			
}
 echo $paginate;
?>