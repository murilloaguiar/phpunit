<?php

namespace Alura\Leilao\Service;
use Alura\Leilao\Model\Leilao;

class Avaliador{

    private $maiorValor = -INF;

    public function avalia(Leilao $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            } 
            
        }
        // $lances = $leilao->getLances();
        // $ultimoLance = $lances[count($lances) - 1];
        // $this->maiorValor = $ultimoLance->getValor();
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}