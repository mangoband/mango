<?php
namespace Mango\Flash;

/**
 *  Flash message
 */
class CFlash implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
    
    protected $msgTypes = ['notice' => 'flash_notice', 'error' => 'flash_error',
                     'warning' => 'flash_warning', 'success' => 'flash_success',
                     'hello' => 'flash_hello'];
    /**
     *  set
     *  @param string $message  Your description
     *  @param string $type     Kind of message ( notice || error || warning || Success )
     */  
    public function set( $message = '', $type = 'notice' ){
        $type = strtolower( $type );
        
        if ( array_key_exists( $type, $this->msgTypes )){
            $this->session->set($this->msgTypes[$type], $message);
        }
        
    }
    
    /**
     *  get
     *  @param string $type ( notice || error || warning || success )
     *  @return string $htmlcode
     */
    public function get( $type = 'notice' ){
        $now = date('H:i:s');
        
        $msg = ['notice' => $now.' For notice ', 'error' => $now.' Error ',
                'warning' => $now.' Warning!!! ', 'success' => $now.' Success! ',
                'hello' => 'Hello '];
        
        if ( array_key_exists( $type, $this->msgTypes ) ){
           
            $m =  ($this->getSession( $this->msgTypes[$type] ) ) ?  $msg[$type].$this->getSession( $this->msgTypes[$type] ): null; 
            $c = $this->msgTypes[$type];
            $this->unsetSession( $this->msgTypes[$type] );
        } else {
            $m = null;
            $c = null;
        }
        
        if ( ! is_null( $m ) && ! is_null( $c )){
            
            return "\n\t<p class='{$c}'>{$m}</p>";
        }
    }
   
    /**
     *  unsetSession
     */
    private function unsetSession( $name ){
        if ( isset( $_SESSION[$name] )){
            unset( $_SESSION[$name]);
        }
    }
    
    
    
}