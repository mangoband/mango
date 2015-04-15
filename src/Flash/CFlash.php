<?php
namespace Mango\Flash;

/**
 *  Flash message
 */
class CFlash implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
    
    
    /**
     *  set
     *  @param string $message  Your description
     *  @param string $type     Kind of message ( notice || error || warning || Success )
     */  
    public function set( $message = '', $type = 'notice' ){
        $type = strtolower( $type );
        
        switch( $type ){
            
            case 'notice':
                
                $this->session->set('flash_notice', $message);
                break;
            
            case 'error':
                
                $this->session->set('flash_error', $message);
                break;
            
            case 'warning':
                
                $this->session->set('flash_warning', $message);
                break;
            
            case 'success':
                
                $this->session->set('flash_success', $message);
                break;
            
            case 'hello':
                
                $this->session->set('flash_hello', $message);
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
                
                
                $c = 'flash_notice';
                $m = $now.": For notice ".$this->session->get('flash_notice');
                unset( $_SESSION['flash_notice']);
                break;
            
            
            case 'error':
                
                
                $c = 'flash_error';
                $m = $now.": Error ".$this->session->get('flash_error');
                unset( $_SESSION['flash_error']);
                break;
            
            
            case 'warning':
                
                
                $c = 'flash_warning';
                $m = $now.": Warning!!! ".$this->session->get('flash_warning');
                unset( $_SESSION['flash_warning']);
                break;
            
            case 'success':
                
                
                $c = 'flash_success';
                $m = $now.": Success! ".$this->session->get('flash_success');
                unset( $_SESSION['flash_success']);
                break;
            
            case 'hello':
                
                
                $c = 'flash_notice';
                $m = "Hello ".$this->session->get('flash_hello');
                unset( $_SESSION['flash_hello']);
                break;
            
            
        }
     
        return "\n\t<p class='{$c}'>{$m}</p>";
    }
   
    
    
}