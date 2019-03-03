<?php

/**
 * @Author: lyuek
 * @Date:   2019-02-22 16:02:44
 * @Last Modified by:   lyk625358@163.com
 * @Last Modified time: 2019-02-22 17:29:10
 */
	//简单加密函数（与php_decrypt函数对应）
	function php_encrypt($str)  {   
	    $encrypt_key = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#_%^&*';
	    $decrypt_key = 'ku%D8FghRrO9KcPmnl*fsLtEp6QTGCY5#Jb1Z3MjBS@az_2x7d^&IyiNoV0WXewA4HvqU!';

	    $len_str = strlen($str);
	    if ($len_str == 0) return false; 

	    $len_encrypt_key = strlen($encrypt_key);
	    $enstr = '';
	    for ($i=0; $i<$len_str; $i++){   
	    	if(strpos($encrypt_key, $str{$i}) === false){
	    		echo "密码只能由字母、数字以及特殊字符（只有!@#_%^&*）组成\n";
	    		return false;
	    	}

	        for ($j=0; $j<$len_encrypt_key; $j++){    
	            if ($str{$i} == $encrypt_key{$j}){   
	                $enstr .= $decrypt_key{$j};      
	                break;   
	            }    
	        }    
	    }   
	    return $enstr; 
	}

	//简单解密函数（与php_encrypt函数对应）
	function php_decrypt($str)  { 
	    $encrypt_key = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#_%^&*';
	    $decrypt_key = 'ku%D8FghRrO9KcPmnl*fsLtEp6QTGCY5#Jb1Z3MjBS@az_2x7d^&IyiNoV0WXewA4HvqU!';

	    $len_str = strlen($str);
	    if ($len_str == 0) return false;

	    $len_decrypt_key = strlen($decrypt_key);
	    $destr = '';
	    for ($i=0; $i<$len_str; $i++){ 
	        for ($j=0; $j<$len_decrypt_key; $j++){ 
	            if ($str{$i} == $decrypt_key{$j}){ 
	                $destr .= $encrypt_key{$j}; 
	                break; 
	            } 
	        } 
	    } 
	    return $destr; 
	}

	$origin = 'helloword';
	$passed = php_encrypt($origin);
	$unpassed = php_decrypt($passed);
	var_dump($origin, $passed, $unpassed);

	// var_dump(strlen('!'), strlen('@'), strlen('#'), strlen('_'), strlen('^'), strlen('&'), strlen('*'));
	// var_dump(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#_%^&*'));
