<?php
namespace Mango\Flash;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class CFlash{
    
    
    protected   $notice     = '';
    protected   $warning    = '';
    protected   $error      = '';
    protected   $success    = '';
    
    function __construct( ){
        
        $this->message  = ( isset( $_SESSION['flash_notice'] ) )    ? $_SESSION['flash_notice'] : '';
        $this->error    = ( isset( $_SESSION['flash_error'] ) )     ? $_SESSION['flash_error']  : '';
        $this->notice   = ( isset( $_SESSION['flash_warning'] ) )   ? $_SESSION['flash_warning']: '';
        $this->success  = ( isset( $_SESSION['flash_success'] ) )   ? $_SESSION['flash_success']: '';
        
    }
    
    
    /**
     *  set
     *  @param string $message  Your description
     *  @param string $type     Kind of message ( notice || error || warning )
     */  
    public function set( $message = '', $type = 'notice' ){
        switch( $type ){
            
            case 'notice':
                
                $_SESSION['flash_notice']   = $message;
                break;
            
            case 'error':
                
                $_SESSION['flash_error']    = $message;
                break;
            
            case 'warning':
                $_SESSION['flash_warning']  = $message;
                break;
            
            case 'success':
                $_SESSION['flash_success']  = $message;
                break;
            
        }
        
        
    }
    
    /**
     *  get
     *  @param string $type ( notice || error || warning )
     *  @return $htmlcode
     */
    public function get( $type = 'notice' ){
        $now = date('H:i:s');
        switch( $type ){
            case 'notice':
                
                
                unset( $_SESSION['flash_notice']);
                $c = 'flash_notice';
                $m = $now.": For notice ".$this->notice;
                break;
            
            
            case 'error':
                
                
                unset( $_SESSION['flash_error']);
                $c = 'flash_error';
                $m = $now.": Error ".$this->error;
                break;
            
            
            case 'warning':
                
                
                unset( $_SESSION['flash_warning']);
                $c = 'flash_warning';
                $m = $now.": Warning!!! ".$this->warning;
                break;
            
            case 'success':
                
                
                unset( $_SESSION['flash_success']);
                $c = 'flash_success';
                $m = $now.": ".$this->success;
                break;
            
            
        }
        return "<p class='{$c}'>{$m}</p>";
    }
   
    public function hello(){
        return 'Hello!!!';
    }
    
}