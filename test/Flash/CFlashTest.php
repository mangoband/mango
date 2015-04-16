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
    private $CFlash     = null;
    private $textEnd    = '</p>';
    
    public function __construct(){
        $this->CFlash = new CFlash();
        
    }
    
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
        $this->assertStringEndsWith($this->textEnd, $r);
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
        $r = $m->get('notice');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    /**
     *  test SetAndGet Error
     */
    public function testSetAndGetError(){
        
        $m = $this->getDI();
        
        $m->set($this->msg, 'error' );
        $r = $m->get('error');
        $this->assertStringEndsWith($this->textEnd, $r);
      
    }
    
    /**
     *  test SetAndGet Warning
     */
    public function testSetAndGetWarning(){
        
        $m = $this->getDI();
        
        $m->set($this->msg, 'warning' );
        $r = $m->get('warning');
        $this->assertStringEndsWith($this->textEnd, $r);
       
    }
    
    /**
     *  test SetAndGet Success
     */
    public function testSetAndGetSuccess(){
        
        $m = $this->getDI();
        
        $m->set($this->msg, 'success' );
        $r = $m->get('success');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    /**
     *  test SetAndGet Hello
     */
    public function testSetAndGetHello(){
        
        $di    = new \Anax\DI\CDIFactoryDefault();
        $m = new CFlash();
        $m->setDI($di);
        
        $di->setShared('session', function () {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            //$session->start();
            return $session;
        });
        
        $m->set($this->msg, 'hello' );
        $r = $m->get('hello');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    
}