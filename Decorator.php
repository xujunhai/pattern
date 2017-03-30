<?php
//php用trait实现Decorator

interface StreamInterface{
    
    public function write($string);
    
    public function read($length);
}

trait StreamDecorator{
    
    /**
     * @param StreamInterface $stream Stream to decorate
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    } 
    
    //接口实现相关method
    public function write($string){
        
    }
    
    public function read($length){
        
    }
}

//装饰者 use Trait就可以啦 
class CachingStream implements StreamInterface{    
    use StreamDecorator; //不改变原来类的方法扩展方法        
}

//具体的Concrete Class Stream
class BufferStream implements StreamInterface{
    
    public function write($string){
        return $string;
    }
    
    public function read($length){
        return $length;
    }
}

//客户端用法
$cache = new CachingStream(new BufferStream());
$cache->read($length=1);