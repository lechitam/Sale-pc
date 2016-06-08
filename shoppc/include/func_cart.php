<?php
function store($action=null, $id=null)
{
	$cart = $_SESSION['Cart'];
	switch ($action) {
		case 'add':
			if ($cart) {
				$cart .= ",'".$id."',";
			} else {
				$cart = "'".$id."',";
			}
			break;
		case 'delete':
			if ($cart) {
				$items = explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				$cart = $newcart;
			}
			break;
		case 'update':
		if ($cart) {
			$newcart = '';
			foreach ($_POST as $key=>$value) {
				if (stristr($key,'qty')) {
					$id = str_replace('qty','',$key);
					$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
					$newcart = '';
					foreach ($items as $item) {
						if ($id != $item) {
							if ($newcart != '') {
								$newcart .= ','.$item;
							} else {
								$newcart = $item;
							}
						}
					}
					for ($i=1;$i<=$value;$i++) {
						if ($newcart != '') {
							$newcart .= ','.$id;
						} else {
							$newcart = $id;
						}
					}
				}
			}
		}
		$cart = $newcart;
		break;
	}
	
	$_SESSION['Cart'] = $cart;
} 

//Lấy các sản phẩm trong giỏ hàng:
function getContents()
    {
        $contents = array();
        $cart = $_SESSION['Cart'];
        
        if($cart)
        {
            $items = explode(',',$cart);
            $contents = array();
            foreach ($items as $item) 
            {
                $contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
            }
        }
        
        return $contents;
    } 
?>