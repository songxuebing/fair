<?php
    if (!empty($this->Param['option'])) {
        $this->LoadHelper('auth/LoginHelper');
        $LoginHelper = new LoginHelper();
        $LoginHelper->Front($this->Param['username'], $this->Param['password'], $this->Param['is_admin']);
    }else{
        echo $this->GetView('login.php');
    }