<?php

/**CONTADOR  */
class Contadores
{
    
    public function getContador()
    {
        $_SESSION['getContador'] = !isset($_SESSION['getContador']) ? 0 : $_SESSION['getContador'];
        $_SESSION['getContador']++;
        return $_SESSION['getContador'];
    }
    
    public function increment()
    {
        // se inicializa la variable de sesión en caso de que no lo esté
        $_SESSION['count'] = !isset($_SESSION['count']) ? 0 : $_SESSION['count'];
        $_SESSION['count']++;
        return $_SESSION['count'];
    }
    
    public function jugador1Victorias()
    {
        $_SESSION['jugador1Victorias'] = !isset($_SESSION['jugador1Victorias']) ? 0 : $_SESSION['jugador1Victorias'];
        $_SESSION['jugador1Victorias']++;
       // echo 'Num de Victorias jugador1: ' . $_SESSION['jugador1Victorias'] . '<br>';
    }
    
    public function jugador2Victorias()
    {
        $_SESSION['jugador2Victorias'] = !isset($_SESSION['jugador2Victorias']) ? 0 : $_SESSION['jugador2Victorias'];
        $_SESSION['jugador2Victorias']++;
        //echo 'Num de Victorias jugador2 : ' . $_SESSION['jugador2Victorias'] . '<br>';
    }
    
    public function empates()
    {
        $_SESSION['empates'] = !isset($_SESSION['empates']) ? 0 : $_SESSION['empates'];
        $_SESSION['empates']++;
       // echo 'Num de empates: ' . $_SESSION['empates'] . '<br>';
    }
    
    public function resumenVictorias()
    {
        isset($_SESSION['jugador1Victorias']) ? print 'Jugador 1 Victorias ---> ' . $_SESSION['jugador1Victorias'] . '<br>' : print ' Número de victorias jugador 1 --->   0 <br>';
        isset($_SESSION['jugador2Victorias']) ? print 'Jugador 2 Victorias ---> ' . $_SESSION['jugador2Victorias'] . '<br>' : print 'Número de victorias jugador 2 ---> 0 <br>';
        isset($_SESSION['empates']) ? print 'Empates ---> ' . $_SESSION['empates'] . '<br>' : print 'Número de empates ---> 0 <br>';
    }
    
    public function resetPartida()
    {
        unset($_SESSION['getContador']);
        unset($_SESSION['count']);
        unset($_SESSION['jugador1Victorias']);
        unset($_SESSION['jugador2Victorias']);
        unset($_SESSION['empates']);
    }
    
}

?> 