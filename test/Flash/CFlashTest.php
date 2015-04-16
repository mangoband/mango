<?php
namespace Mango\Flash;

/**
 *  Test Flash message
 */
class CFlashTest extends \PHPUnit_Framework_TestCase {
    
    
    /**
     *  test null Notice
     */
    public function testNullNotice(){
        
        $m = new CFlash();
        $msg = 'message';
        $expected = $m->set($msg, 'notice' );
        $r = $m->get('notice');
       
         $this->assertNull($expected);    
    }
    
    /**
     *  test wrong value in
     */
    public function testWrongValueNotice(){
        
        $m = new CFlash();
        $msg = 'message';
        $expected = $m->set($msg, 'wrong' );
        $r = $m->get('wrong');
       
         $this->assertNull($expected);    
    }
    
    
    /**
     *  test SetAndGet Notice
     */
    public function testSetAndGetNotice(){
        
        $m = new CFlash();
        $msg = 'message';
        $m->set($msg, 'notice' );
        $r = $m->get('notice');
        $expected = '</p>';
        $this->assertStringEndsWith($expected, $r);
        
        
        
    }
    
    /**
     *  test SetAndGet Error
     */
    public function testSetAndGetError(){
        
        
        $m = new \Mango\Flash\CFlash();
        $msg = 'message';
        $m->set($msg, 'error' );
        $r = $m->get('error');
        $expected = '</p>';
        $this->assertStringEndsWith('</p>', $r);
      
    }
    
    /**
     *  test SetAndGet Warning
     */
    public function testSetAndGetWarning(){
        
        
        $m = new \Mango\Flash\CFlash();
        $msg = 'message';
        $m->set($msg, 'warning' );
        $r = $m->get('warning');
        $expected = '</p>';
        $this->assertStringEndsWith('</p>', $r);
       
    }
    
    /**
     *  test SetAndGet Success
     */
    public function testSetAndGetSuccess(){
        
        
        $m = new \Mango\Flash\CFlash();
        $msg = 'message';
        $m->set($msg, 'success' );
        $r = $m->get('success');
        $expected = '</p>';
        $this->assertStringEndsWith('</p>', $r);
        
    }
    
    /**
     *  test SetAndGet Hello
     */
    public function testSetAndGetHello(){
        
        
        $m = new \Mango\Flash\CFlash();
        
        $msg = 'message';
        $m->set($msg, 'hello' );
        $r = $m->get('hello');
        $expected = '</p>';
        $this->assertStringEndsWith('</p>', $r);
        
    }
    
    
}