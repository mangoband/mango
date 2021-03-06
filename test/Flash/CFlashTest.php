<?php
namespace Mango\Flash;

/**
 *  Test Flash message
 */
class CFlashTest extends \PHPUnit_Framework_TestCase {
    
    /***
     *  vars for testing
     */  
    private $msg        = 'message';
    private $textEnd    = '</p>';
    
    protected function getDI(  ){
        $di    = new \Anax\DI\CDIFactoryDefault();
        $m = new CFlash();
        $m->setDI($di);
        
        $di->setShared('session', function () {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            
            return $session;
        });
        
        return $m;
       
    }
    /**
     *  test null Notice
     */
    public function testNullNotice(){
        
        $m = $this->getDI();
        
        $r = $m->get('notice');
        $this->assertNull($m->set($this->msg, '' )); 
        $this->assertNull($r);
    }
    
    /**
     *  test wrong value in
     */
    public function testWrongValueNotice(){
        
        $m = $this->getDI();
        
        $r = $m->get('wrong');
         $this->assertNull($m->set($this->msg, 'wrong' ));
         $this->assertNull($r);
    }
    
    /**
     *  test SetAndGet Notice
     */
    public function testSetAndGetNotice(){
        
        $m = $this->getDI();       
        $m->set($this->msg, 'notice' );
        $this->assertStringEndsWith($this->textEnd, $m->get('notice'));
        
    }
    
    /**
     *  test SetAndGet Error
     */
    public function testSetAndGetError(){
        
        $m = $this->getDI();
        $m->set($this->msg, 'error' );
        $this->assertStringEndsWith($this->textEnd, $m->get('error'));
      
    }
    
    /**
     *  test SetAndGet Warning
     */
    public function testSetAndGetWarning(){
        
        $m = $this->getDI();
        $m->set($this->msg, 'warning' );
        $this->assertStringEndsWith($this->textEnd, $m->get('warning'));
       
    }
    
    /**
     *  test SetAndGet Success
     */
    public function testSetAndGetSuccess(){
        
        $m = $this->getDI();
        $m->set($this->msg, 'success' );
        $this->assertStringEndsWith($this->textEnd, $m->get('success'));
        
    }
    
    /**
     *  test SetAndGet Hello
     */
    public function testSetAndGetHello(){
        
        $m = $this->getDI();
        
        $m->set($this->msg, 'hello' );
        $this->assertStringEndsWith($this->textEnd, $m->get('hello'));
        
    }    
    
}