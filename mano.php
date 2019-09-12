<?php
// Call session_start() at the beginning of your script...
session_start();

//Excepción lanzada si un valor no se adhiere a un dominio definido de datos válidos. 
class ExcepcionEmpate extends DomainException
{
}

abstract class Mano
{
    protected $beats;
    final public function beats(Mano $mano)
    {
        $this->rejectDraw($mano);
        return $mano instanceof $this->beats;
        
    }
    
    public function __toString()
    {
        
        return get_class($this);
    }
    
    public function rejectDraw(Mano $mano)
    {
        
        if ($mano === $this) {
            throw new ExcepcionEmpate('Empate');
        }
    }
}


class Piedra extends Mano
{
    
    protected $beats = 'Tijeras';
}

class Papel extends Mano
{
    
    protected $beats = 'Piedra';
}

class Tijeras extends Mano
{
    
    protected $beats = 'Papel';
}