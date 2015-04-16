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
    
    /**
     *  test null Notice
     */
    public function testNullNotice(){
        
        $m = new CFlash();
        $expected = $m->set($this->msg, '' );
        $r = $m->get('notice');
        $this->assertNull($expected);
        $this->assertStringEndsWith($this->textEnd, $r);
    }
    
    /**
     *  test wrong value in
     */
    public function testWrongValueNotice(){
        
        $m = new CFlash();
        $expected = $m->set($this->msg, 'wrong' );
        $r = $m->get('wrong');
         $this->assertNull($expected);
         $this->assertNull($r);
    }
    
    
    /**
     *  test SetAndGet Notice
     */
    public function testSetAndGetNotice(){
        
        $m = new CFlash();
        $m->set($this->msg, 'notice' );
        $r = $m->get('notice');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    /**
     *  test SetAndGet Error
     */
    public function testSetAndGetError(){
        
        $m = new \Mango\Flash\CFlash();
        $m->set($this->msg, 'error' );
        $r = $m->get('error');
        $this->assertStringEndsWith($this->textEnd, $r);
      
    }
    
    /**
     *  test SetAndGet Warning
     */
    public function testSetAndGetWarning(){
        
        $m = new \Mango\Flash\CFlash();
        $m->set($this->msg, 'warning' );
        $r = $m->get('warning');
        $this->assertStringEndsWith($this->textEnd, $r);
       
    }
    
    /**
     *  test SetAndGet Success
     */
    public function testSetAndGetSuccess(){
        
        $m = new \Mango\Flash\CFlash();
        $m->set($this->msg, 'success' );
        $r = $m->get('success');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    /**
     *  test SetAndGet Hello
     */
    public function testSetAndGetHello(){
        
        $m = new \Mango\Flash\CFlash();
        $m->set($this->msg, 'hello' );
        $r = $m->get('hello');
        $this->assertStringEndsWith($this->textEnd, $r);
        
    }
    
    
}