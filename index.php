<?php
/**
 * ����ļ�
 */

//Ӧ�ø�Ŀ¼
define('SERVER_ROOT', dirname(__FILE__));

//����������
define('SITE_ROOT', 'http://mvc.com');

//����������ʾ
ini_set('display_errors', 1);
//���ñ�����
error_reporting(E_ALL);


//����·��
require_once(SERVER_ROOT . '/libs/' . 'router.php');