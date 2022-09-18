<?php 

if(!permission('index', 'show')){
  permission_page();
}

require view('index');