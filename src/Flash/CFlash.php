<?php
namespace Mango\Flash;

/**
 *  Flash message
 */
class CFlash  implements \Anax\DI\IInjectionAware
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
                
                $this->setSession('flash_notice', $message);
                break;
            
            case 'error':
                
                $this->setSession('flash_error', $message);
                break;
            
            case 'warning':
                
                $this->setSession('flash_warning', $message);
                break;
            
            case 'success':
                
                $this->setSession('flash_success', $message);
                break;
            
            case 'hello':
                
                $this->setSession('flash_hello', $message);
                break;
            
        }
        
        
    }
    
    /**
     *  get
     *  @param string $type ( notice || error || warning )
     *  @return string $htmlcode
     */
    public function get( $type = 'notice' ){
        $now = date('H:i:s');
        switch( $type ){
            case 'notice':
                
                
                $c = 'flash_notice';
                $m = $now.": For notice ".$this->getSession('flash_notice');
                $this->unsetSession( 'flash_notice');
                break;
            
            
            case 'error':
                
                
                $c = 'flash_error';
                $m = $now.": Error ".$this->getSession('flash_error');
                $this->unsetSession( 'flash_error');
                break;
            
            
            case 'warning':
                
                
                $c = 'flash_warning';
                $m = $now.": Warning!!! ".$this->getSession('flash_warning');
                $this->unsetSession( 'flash_warning');
                break;
            
            case 'success':
                
                
                $c = 'flash_success';
                $m = $now.": Success! ".$this->getSession('flash_success');
                $this->unsetSession( 'flash_success');
                break;
            
            case 'hello':
                
                
                $c = 'flash_notice';
                $m = "Hello ".$this->getSession('flash_hello');
                $this->unsetSession( 'flash_hello');
                break;
            default: $m = null; $c = null;
            
        }
        if ( ! is_null( $m ) && ! is_null( $c )){
            
            return "\n\t<p class='{$c}'>{$m}</p>";
        }
    }
   
    /**
     *    setSession
     */    
    private function setSession($name = null, $message = null ){
        if ( ! is_null( $name ) && ! is_null( $message ) ){
            $_SESSION[$name] = $message;
        }
    }
    
    /**
     *  getSession
     */  
    private function getSession( $name = null ){
        if ( isset( $_SESSION[$name] )){
            return $_SESSION[$name];
        }
    }
    
    /**
     *  unsetSession
     */
    private function unsetSession( $name ){
        unset( $_SESSION[$name]);
    }
    
    
    
}