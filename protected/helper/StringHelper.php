<?php

class StringHelper extends CComponent {
	
	public static $_helper;
	
	public static function helper($isNew = false)
	{
		if(!is_null(self::$_helper) && !$isNew)
			return self::$_helper;
		else
		{
			$className=__CLASS__;
			$helper=self::$_helper=new $className();			
			return $helper;
		}
	}
	
	public function subwords($str, $word_number, $strAppend = '...'){		
		$array1 = explode(" ",$str);		
		$c = count($array1);        
        $new_str='';
       
        if($c>$word_number){
            
            $i=0;
            while($i<sizeof($array1)){
                if($i<$word_number){
                    $new_str.=$array1[$i].' ';
                }
                $i++;
            }
            return trim($new_str).$strAppend;
        }
        else{
            return $str;   
        }
	}
	
	public function formatUrlKey($str) {
		$str = $this->stripUnicode($str);
        $urlKey = preg_replace('#[^0-9a-z]+#i', '-',$str);
        $urlKey = strtolower($urlKey);
        $urlKey = trim($urlKey, '-');

        return $urlKey;
	}
	
	public function stripUnicode($str) {
		if(!$str) return false;
		$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
		"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
		,"ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
		,"ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
		,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
		,"Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ");

		$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
		,"a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o"
		,"o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d",
		"A","A","A","A","A","A","A","A","A","A","A","A"
		,"A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O"
		,"O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D");

		$str = str_replace($marTViet,$marKoDau,$str);
		return $str;
	}
	
	
	function cutText($str,$leng){
		$text = $str;
		$subText = mb_substr($str, 0, $leng,'UTF-8');				
		if($subText != $str){					
			$arrWord = explode(" ",$subText);						
			$countWord = count($arrWord);
			$charAfter = mb_substr($str,$leng, 1,'UTF-8');			
			if($charAfter != ' '){				
                            $countWord--;
			}
			$text = $this->subwords($str, $countWord);	
		}
						
		return 	$text;	
	}

        function catchu($value, $length)
        {
            if($value!=''){
            if(is_array($value)) list($string, $match_to) = $value;
            else { $string = $value; $match_to = $value{0}; }

            $match_start = stristr($string, $match_to);
            $match_compute = strlen($string) - strlen($match_start);

            if (strlen($string) > $length)
            {
                if ($match_compute < ($length - strlen($match_to)))
                {
                    $pre_string = mb_substr($string, 0, $length,'UTF-8');
                    $pos_end = strrpos($pre_string, " ");
                    if($pos_end === false) $string = $pre_string."...";
                    else $string = mb_substr($pre_string, 0, $pos_end,'UTF-8')."...";
                }
                else if ($match_compute > (strlen($string) - ($length - strlen($match_to))))
                {
                    $pre_string = mb_substr($string, (strlen($string) - ($length - strlen($match_to))),'UTF-8');
                    $pos_start = strpos($pre_string, " ");
                    $string = "...".mb_substr($pre_string, $pos_start,'UTF-8');
                    if($pos_start === false) $string = "...".$pre_string;
                    else $string = "...".mb_substr($pre_string, $pos_start,'UTF-8');
                }
                else
                {
                    $pre_string = mb_substr($string, ($match_compute - round(($length / 3))), $length,'UTF-8');
                    $pos_start = strpos($pre_string, " "); $pos_end = strrpos($pre_string, " ");
                    $string = "...".mb_substr($pre_string, $pos_start, $pos_end,'UTF-8')."...";
                    if($pos_start === false && $pos_end === false) $string = "...".$pre_string."...";
                    else $string = "...".mb_substr($pre_string, $pos_start, $pos_end,'UTF-8')."...";
                }

                $match_start = stristr($string, $match_to);
                $match_compute = strlen($string) - strlen($match_start);
            }

            return $string;
            }else{
                return $string ='';
            }
        }
}

?>
