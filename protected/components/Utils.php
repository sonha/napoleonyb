<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 10/25/12
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Utils
{

    public static function ip_first($ips)
    {
        if (($pos = strpos($ips, ',')) != false) {
            return substr($ips, 0, $pos);
        } else {
            return $ips;
        }
    }

    public static function simpleSlug($str)
    {
        $toLower = false;
        $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $str);
        if (true === $toLower) {
            $slug = mb_strtolower($slug, Yii::app()->charset);
        }
        $slug = trim($slug, '-');
        return $slug;
    }

    public static function ip_valid($ips)
    {
        if (isset($ips)) {
            $ip = self::ip_first($ips);
            $ipnum = ip2long($ip);
            if ($ipnum !== -1 && $ipnum !== false && (long2ip($ipnum) === $ip)) { // PHP 4 and PHP 5
                if (($ipnum < 167772160 || $ipnum > 184549375) && // Not in 10.0.0.0/8
                    ($ipnum < -1408237568 || $ipnum > -1407188993) && // Not in 172.16.0.0/12
                    ($ipnum < -1062731776 || $ipnum > -1062666241)
                ) // Not in 192.168.0.0/16
                    return true;
            }
        }
        return false;
    }

    public static function userIP()
    {
        $check = array('HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED',
            'HTTP_VIA', 'HTTP_X_COMING_FROM', 'HTTP_COMING_FROM');
        foreach ($check as $c) {
            //if (self::ip_valid(&$_SERVER[$c])) {
            if (isset($_SERVER[$c]) && self::ip_valid($_SERVER[$c])) {
                return self::ip_first($_SERVER[$c]);
            }
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    public static function getTitleForUrl($title, $romanize = false)
    {
        if ($romanize) {
            $title = utf8_romanize(utf8_deaccent($title));
        }

        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = @ereg_replace($value, $key, $title);
        }

        $title = strtr(
            $title,
            '`!"$%^&*()-+={}[]<>;:@#~,./?|' . "\r\n\t\\",
            '                             ' . '    '
        );
        $title = strtr($title, array('"' => '', "'" => ''));

        if ($romanize) {
            $title = preg_replace('/[^a-zA-Z0-9_ -]/', '', $title);
        }

        $title = preg_replace('/[ ]+/', '-', trim($title));
        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = preg_replace('/' . $value . '/i', $key, $title);
        }
        return strtr($title, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
    }


    public static function word_limiter($str, $limit = 100, $end_char = '&#8230;')
    {
        if (trim($str) == '') {
            return $str;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,' . (int)$limit . '}/', $str, $matches);

        if (strlen($str) == strlen($matches[0])) {
            $end_char = '';
        }

        return rtrim($matches[0]) . $end_char;
    }

    public static function addClass($title)
    {
        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = @ereg_replace($value, $key, $title);
        }

        $title = strtr(
            $title,
            '`!"$%^&*()-+={}[]<>;:@#~,./?|' . "\r\n\t\\",
            '                             ' . '    '
        );
        $title = strtr($title, array('"' => '', "'" => ''));
        $title = preg_replace('/[ ]+/', '', trim($title));
        $aPattern = array(
            "a" => "á|à|ạ|ả|ã|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ậ|ẩ|ẫ|Á|À|Ạ|Ả|Ã|Ă|Ắ|Ằ |Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ",
            "o" => "ó|ò|ọ|ỏ|õ|ô|ố|ồ|ộ|ổ|ỗ|ơ|ớ|ờ|ợ|ở|ỡ|Ó|Ò|Ọ|Ỏ|Õ|Ô|Ố|Ồ |Ộ|Ổ|Ỗ|Ơ|Ớ|Ờ|Ợ|Ở|Ỡ",
            "e" => "é|è|ẹ|ẻ|ẽ|ê|ế|ề|ệ|ể|ễ|É|È|Ẹ|Ẻ|Ẽ|Ê|Ế|Ề|Ệ|Ể|Ễ",
            "u" => "ú|ù|ụ|ủ|ũ|ư|ứ|ừ|ự|ử|ữ|Ú|Ù|Ụ|Ủ|Ũ|Ư|Ứ|Ừ|Ự|Ử|Ữ",
            "i" => "í|ì|ị|ỉ|ĩ|Í|Ì|Ị|Ỉ|Ĩ",
            "y" => "ý|ỳ|ỵ|ỷ|ỹ|Ý|Ỳ|Ỵ|Ỷ|Ỹ",
            "d" => "đ|Đ",
        );
        while (list($key, $value) = each($aPattern)) {
            $title = preg_replace('/' . $value . '/i', $key, $title);
        }
        return strtr($title, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
    }


    /**
     * parse ini string to array
     *
     * @param $string
     */
    public static function parse_ini_string($string)
    {
        $array = Array();

        $lines = explode("\n", $string);

        foreach ($lines as $line) {
            $statement = preg_match("/^(?!;)(?P<key>[\w+\.\-]+?)\s*=\s*(?P<value>.+?)\s*$/", $line, $match);

            if ($statement) {
                $key = $match['key'];
                $value = $match['value'];
                if ('on' == $value) {
                    $value = '1';
                } else if ('off' == $value) {
                    $value = '0';
                }

                //                $value = str_replace(array('&quot;', '"', "'"), '', $value);
                // Remove quote
                if (preg_match("/^\".*\"$/", $value) || preg_match("/^'.*'$/", $value)) {
                    $value = mb_substr($value, 1, mb_strlen($value) - 2);
                }

                if (0 !== strpos(';')) {
                    $array[$key] = $value;
                }
            }
        }
        return $array;
    }


    /**
     * shorten text (full word)
     *
     * @param string    source $text
     * @param integer    $max_length
     * @param string    (optional) append text $append
     *
     * @return string
     */
    public static function shorten_text($text, $max_length, $append = '...')
    {

        $text = trim($text);
        $len = mb_strlen($text, 'UTF-8');
        if ($len > $max_length) {
            $text = mb_substr($text, 0, $max_length);
            $lastBlankPos = mb_strrpos($text, ' ');
            if (false === $lastBlankPos) {
                return $text . $append;
            }

            $text = mb_substr($text, 0, $lastBlankPos + 1) . $append;
        }

        return $text;
    }

    /**
     * trims text to a space then adds ellipses if desired
     * @param string $input text to trim
     * @param int $length in characters to trim to
     * @param bool $ellipses if ellipses (...) are to be added
     * @param bool $strip_html if html tags are to be stripped
     * @return string
     */
    public static function trim_text($input, $length, $ellipses = true, $strip_html = true)
    {
        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }

        return $trimmed_text;
    }

    /**
     * trim text
     *
     * @param string    $text source text
     * @param int        $max_length    max result text length
     * @param string    $append string apped
     *
     * @return string
     */
    public static function trim_text_by_length($text, $max_length, $append = '...')
    {
        if ($max_length >= mb_strlen($text, 'UTF-8')) {
            return $text;
        }

        return mb_substr($text, 0, $max_length, 'UTF-8') . $append;
    }


    /**
     * shorten text, html string
     *
     * @param string    source $text
     * @param integer    $length
     * @param string    append text $append
     * @param boolean     if true, shorten exactly by lengt, if false, shorten by space (full word) $exact
     * @param boolean    if source text may have html-tag, considerHtml = true $considerHtml
     *
     * @return string
     */
    public static function shortenHtml($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false)
    {
        $_is_html = false;
        $_pos = 0;
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }
            // splits all html-tags to scanable lines
            preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
            $total_length = strlen($ending);
            $open_tags = array();
            $truncate = '';
            foreach ($lines as $line_matchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($line_matchings[1])) {
                    $_is_html = true;
                    //$exact = true;
                    // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                        // do nothing
                        // if tag is a closing tag (f.e. </b>)
                    } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                        // delete tag from $open_tags list
                        $pos = array_search($tag_matchings[1], $open_tags);
                        if ($pos !== false) {
                            unset($open_tags[$pos]);
                        }
                        // if tag is an opening tag (f.e. <b>)
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }
                // calculate the length of the plain text part of the line; handle entities as one character
                $content_length = strlen(trim(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2])));
                if ($total_length + $content_length > $length) {
                    // the number of characters which are left
                    $left = $length - $total_length;
                    $entities_length = 0;
                    // search for html entities
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($entity[1] + 1 - $entities_length <= $left) {
                                $left--;
                                $entities_length += strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }

                    $truncate .= substr($line_matchings[2], 0, $left + $entities_length);
                    $_pos = strrpos(trim($line_matchings[2]), ' ');
                    // maximum lenght is reached, so get off the loop
                    break;
                } else {
                    $truncate .= $line_matchings[2];
                    $_pos = strrpos(trim($line_matchings[2]), ' ');
                    $total_length += $content_length;
                }
                // if the maximum length is reached, get off the loop
                if ($total_length >= $length) {
                    break;
                }
            }
        } else {
            if (strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = substr($text, 0, $length - strlen($ending));
                //$_pos = strrpos($line_matchings[2], ' ');
            }
        }
        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            // ...search the last occurance of a space...
            $spacepos = strrpos($truncate, ' ');

            if (isset($spacepos) && $spacepos != null) {
                //echo '$_is_html: '.$_is_html.'; $_pos: '.$_pos.'; $length: '.$length.'; $truncate:'.$truncate.'<br/>';
                if ($_is_html && $_pos) {
                    // ...and cut the text in this position
                    $truncate = substr($truncate, 0, $spacepos);
                } elseif (!$_is_html) {
                    $truncate = substr($truncate, 0, $spacepos);
                }
            }
        }
        // add the defined ending to the text
        $truncate .= $ending;
        if ($considerHtml) {
            // close all unclosed html-tags
            foreach ($open_tags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }
        return $truncate;
    }

    /**
     * Get whole words from string...
     *
     * @param string $str String of words
     * @param integer $int Maximum string length
     * @param string $strApend Apend string if string will be cutted
     */
    public static function subwords($str, $int, $strAppend = '...')
    {
        $arr = explode(" ", $str);
        if (sizeof($arr) > $int) {
            $strsub = '';
            $arr = explode(" ", $str);
            for ($i = 0; $i < $int; $i++) {
                $strsub .= $arr[$i] . ' ';
            }
            return $strsub . $strAppend;
        }
        return $str;
    }

    /**
     * Get whole words from string...
     *
     * @param string $str String of words
     * @param integer $int Maximum string length
     * @param string $strApend Apend string if string will be cutted
     */
    public static function subwordsContent($str, $int, $strAppend = '...')
    {
        $arr = explode(" ", $str);
        if (sizeof($arr) > $int) {
            $strsub = '';
            //$str = preg_replace('<br />','',$str);
            $arr = explode(" ", $str);
            if (strpos($arr[$int - 1], "&lt;br") !== false) {
                $arr[$int - 1] = "";
            }
            for ($i = 0; $i < $int; $i++) {
                $strsub .= $arr[$i] . ' ';
            }
            return $strsub . $strAppend;
        }
        return $str;
    }

    public static function countLetters($str)
    {
        $str = Ming_Inflector::vi2en($str);
        return strlen($str);
    }

    public static function getTextEditor($str)
    {
        $str = html_entity_decode($str);
        $str = strip_tags($str, '<b><strong><br><br/><em><a><p>');
        //$str = stripArgumentFromTags($str);
        $str = htmlspecialchars($str, ENT_QUOTES);
        return $str;
    }

    public static function stripArgumentFromTags($htmlString)
    {
        $regEx = '/([^<]*<\s*[a-z](?:[0-9]|[a-z]{0,9}))(?:(?:\s*[a-z\-]{2,14}\s*=\s*(?:"[^"]*"|\'[^\']*\'))*)(\s*\/?>[^<]*)/i'; // match any start tag

        $chunks = preg_split($regEx, $htmlString, -1, PREG_SPLIT_DELIM_CAPTURE);
        $chunkCount = count($chunks);

        $strippedString = '';
        for ($n = 1; $n < $chunkCount; $n++) {
            $strippedString .= $chunks[$n];
        }

        return $strippedString;
    }

    public static function getImageUrl($icon, $width = 100)
    {
        if (isset($icon) && $icon != '') {
            if (is_array($icon)) {
                return Yii::app()->params['STORAGE_FILE_DOMAIN'] . 'thumb_w/' . $width . '/s/' . $icon[1] . $icon[0];
            } else {
                $icon_old = json_decode($icon);
                if (!$icon_old) {
                    return Yii::app()->params['NEW_STORAGE_FILE_DOMAIN'] . 'thumb_w/' . $width . '/' . $icon;
                } else {
                    return Yii::app()->params['STORAGE_FILE_DOMAIN'] . 'thumb_w/' . $width . '/s/' . $icon_old[1] . $icon_old[0];
                }
            }
        } else {
            return Yii::app()->baseUrl . '/images/no-images.jpg';
        }
    }

    public static function getIconUrl($icon, $width = 100)
    {
        if (empty($icon)) {
            return Yii::app()->baseUrl . '/images/no-images.jpg';
        } else {
            return Yii::app()->params['NEW_STORAGE_FILE_DOMAIN'] . 'thumb_w/' . $width . '/' . $icon;
        }
    }

    public static function getDownloadLink($link)
    {
        if (isset($link) && $link != '') {
            $link_old = json_decode($link);
            if (!$link_old) {
                return Yii::app()->params['NEW_STORAGE_FILE_DOMAIN'] . $link;
            } else {
                return Yii::app()->params['STORAGE_DOMAIN'] . $link_old[0] . $link_old[1];
            }
        } else {
            return '';
        }
    }

    public static function getSecureDownload($link, $callback='')
    {
        if (isset($link) && $link != '') {
            $link_old = json_decode($link);
            if (!$link_old) {
                if(Yii::app()->params['USE_SECURE_URL']) {
                    //$callback = Yii::app()->createAbsoluteUrl("ajax/realLog",array("id"=>$version_id));
                    $url = "http://sohastore.vcmedia.vn/get_secure_url";

                    $fields = array(
                        'secret_key'	=> Yii::app()->params['STORAGE_SECURITY_KEY'],
                        'filename'		=> $link,
                        'version' 		=> 3,
                        'callback_url' 	=> $callback
                    );

                    $fields_string = '';
                    foreach ($fields as $key => $value) {
                        $fields_string .= $key . '=' . $value . '&';
                    }
                    rtrim($fields_string, '&');
                    $url = $url."?".$fields_string;

                    $result = CURL::geturl($url);

                    return $result;
                } else {
                    return Yii::app()->params['NEW_STORAGE_FILE_DOMAIN'] . $link;
                }
            } else {
                return Yii::app()->params['STORAGE_DOMAIN'] . $link_old[0] . $link_old[1];
            }
        } else {
            return '';
        }
    }

    public static function getStatusVersion($status, $active, $id)
    {
        if (($status == 0 && $active == 0) || $active == 1 && $status == 0) {
            $html = "Chưa duyệt ";
        } else if ($active == 1 && $status == 1) {
            $html = 'Đang kích hoạt';
        } else if ($active == 0 && $status == 1) {
            $html = CHtml::link("Kích hoạt", Yii::app()->createAbsoluteUrl("developer/AppVersion/active", array("id" => $id)));
        }
        return $html;
    }

    public static function create_uuid($namespace = '')
    {
        static $uuid = '';
        $uid = uniqid("", true);
        $data = $namespace;
        $data .= $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $data .= $_SERVER['REMOTE_ADDR'];
        $data .= $_SERVER['REMOTE_PORT'];
        $hash = strtoupper(hash('ripemd128', $uid . $uuid . md5($data)));
        $uuid = substr($hash, 0, 8) .
            '-' .
            substr($hash, 8, 4) .
            '-' .
            substr($hash, 12, 4) .
            '-' .
            substr($hash, 16, 4) .
            '-' .
            substr($hash, 20, 12);
        return $uuid;
    }

    public static function randomcode($len = 8)
    {
        $code = $lchar = NULL;
        for ($i = 0; $i < $len; $i++) {
            $char = chr(rand(48, 122));
            while (!preg_match('/^[0-9]+$/', $char)) {
                if ($char == $lchar) continue;
                $char = chr(rand(48, 90));
            }
            $code .= $char;
            $lchar = $char;
        }
        return $code;
    }

    public static function top_threads_tabs()
    {
        $data = array();
        $data[0] = array('type' => '1', 'label' => 'Mới nhất', 'alias' => 'new');
        $data[1] = array('type' => '2', 'label' => 'Đang hot', 'alias' => 'hot');
        $data[2] = array('type' => '3', 'label' => 'Tải nhiều', 'alias' => 'popular');
        return $data;
    }

    /*
     * Clear all sitemap cached
     */
    public static function clearSitemapCache()
    {
        $map_names = array('sitemap-category', 'sitemap-ungdung', 'sitemap-game');
        foreach ($map_names as $map_name) {
            Yii::app()->cache->set('sitemap_generator_file-' . $map_name, null);
        }
    }

    public static function getUrlContent($catID = "", $subCatId = "", $device_id = "", $filter = "")
    {
        $alias = "";
        if (!empty($device_id)) {
            if ($device_id == 1) {
                $alias_device = "ios";
            } else if ($device_id == 2) {
                $alias_device = "android";
            }
        }
        if (!empty($filter)) {
            if ($filter == 1) {
                $alias_filter = "moi-nhat";
            } else if ($filter == 2) {
                $alias_filter = "dang-hot";
            } else if ($filter == 3) {
                $alias_filter = "tai-nhieu";
            }
        }
        if (!empty($catID) && empty($subCatId) && empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID);
            $alias = $cat['alias'] . '-c' . $catID;
        }
        if (!empty($catID) && !empty($subCatId) && empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId);
            $alias = $cat['alias'] . '-c' . $catID . '-s' . $subCatId;
        }
        if (!empty($catID) && empty($subCatId) && !empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID);
            $alias = $cat['alias'] . '-' . $alias_device . '-c' . $catID . '-d' . $device_id;
        }
        if (!empty($catID) && empty($subCatId) && empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID);
            $alias = $cat['alias'] . '-' . $alias_filter . '-c' . $catID . '-p' . $filter;
        }
        if (!empty($catID) && !empty($subCatId) && !empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId);
            $alias = $cat['alias'] . '-' . $alias_device . '-c' . $catID . '-s' . $subCatId . '-d' . $device_id;
        }
        if (!empty($catID) && !empty($subCatId) && empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId);
            $alias = $cat['alias'] . '-' . $alias_filter . '-c' . $catID . '-s' . $subCatId . '-p' . $filter;
        }
        if (!empty($catID) && empty($subCatId) && !empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID);
            $alias = $cat['alias'] . '-' . $alias_device . '-' . $alias_filter . '-c' . $catID . '-d' . $device_id . '-p' . $filter;
        }
        if (!empty($catID) && !empty($subCatId) && !empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId);
            $alias = $cat['alias'] . '-' . $alias_device . '-' . $alias_filter . '-c' . $catID . '-s' . $subCatId . '-d' . $device_id . '-p' . $filter;
        }
        return Yii::app()->createAbsoluteUrl('/') . '/chuyen-muc/' . $alias . '.html';
    }

    public static function getLabelContent($catID = "", $subCatId = "", $device_id = "", $filter = "", $separator = ' ')
    {
        $name = "";
        if (!empty($device_id)) {
            if ($device_id == 1) {
                $alias_device = "IOS";
            } else if ($device_id == 2) {
                $alias_device = "Android";
            }
        }
        if (!empty($filter)) {
            if ($filter == 1) {
                $alias_filter = "Mới Nhất";
            } else if ($filter == 2) {
                $alias_filter = "Đang Hot";
            } else if ($filter == 3) {
                $alias_filter = "Tải Nhiều";
            }
        }
        if (!empty($catID) && empty($subCatId) && empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'];
        }
        if (!empty($catID) && !empty($subCatId) && empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'];
        }
        if (!empty($catID) && empty($subCatId) && !empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_device;
        }
        if (!empty($catID) && empty($subCatId) && empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_filter;
        }
        if (!empty($catID) && !empty($subCatId) && !empty($device_id) && empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_device;
        }
        if (!empty($catID) && !empty($subCatId) && empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_filter;
        }
        if (!empty($catID) && empty($subCatId) && !empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_device . $separator . $alias_filter;
        }
        if (!empty($catID) && !empty($subCatId) && !empty($device_id) && !empty($filter)) {
            $cat = self::getSlugCat($catID, $subCatId, $separator);
            $name .= $cat['name'] . $separator . $alias_device . $separator . $alias_filter;
        }
        return $name;
    }

    public static function getSlugCat($catId, $subCatId = "", $separator = ' ')
    {
        $category = Category::getAllCats();
        $data = array();
        if (!empty($catId)) {

            $data['alias'] = $category[$catId]->slug;
            $data['name'] = $category[$catId]->name;
        }
        if (!empty($catId) && !empty($subCatId)) {
            $data['alias'] = $category[$catId]->slug . '-' . $category[$catId]->_childrens[$subCatId]->slug;
            $data['name'] = $category[$catId]->name . $separator . $category[$catId]->_childrens[$subCatId]->name;
        }
        return $data;
    }

    //fix loi khi get param theo dang base64
    public static function getBase64($str)
    {
        $str = str_replace(" ", "+", $str);
        return $str;
    }

    public static function getCurrentUrl()
    {
        return Yii::app()->getBaseUrl(true) . '/' . Yii::app()->request->pathInfo;
    }

    public static function getPegaDownload()
    {
        $url = 'http://sohaflip.todo.vn/api/index.php?client_id=45b0df533c61683a71cf0b48c365819e&cmd=get_total';
        $data = json_decode(file_get_contents($url), true);
        return $data['results']['total'];
    }

    /**
     * Ham lay Ngay dau tien cua tuan Sunday = 0; Monday = 1 ....
     * @param $iYear
     * @param $iWeekNumber
     * @return int
     */
    public static function getFirstDayOfWeek($iYear, $iWeekNumber)
    {
        if (is_null($iYear)) $iYear = date('Y');
        if ($iWeekNumber < 10) $iWeekNumber = '0' . $iWeekNumber;

        $iTime = strtotime($iYear . 'W' . $iWeekNumber);

        return $iTime;
    }
    public static function is_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function is_mobile($value){
        $pattern = '#^[0-9]{10,11}$#';
        if(preg_match($pattern, $value)!=1){
            return false;
        }
        return true;
    }

    public static function getRemainingTime($endTime=null,$type){
        $currentTime = strtotime(date('d-m-Y'));
        if($type==1){
            if($currentTime>$endTime){
                return  'Ngày '.date('d-m-Y',$endTime);
            }else {
                $hour = (int)((time()-$endTime)/3600);
                return  ($hour)?$hour:1 .' giờ';
            }
        }else {
            if($currentTime>$endTime){
                return  date('H:m:s | d-m-Y',$endTime);
            }else {
                return  date('H:m:s',$endTime).' | Hôm nay';
            }
        }
    }
}

