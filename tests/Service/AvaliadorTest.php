<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarOMaiorValorDeLanceEmOrdemCrescente()
    {
        //arruma a casa para testar - Arrange / Given
        $leilao = new Leilao('fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro  = new Avaliador();

        //executo o códigoa ser testado - Act / When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        //verifico se a saída é a esperada - Assert / Then
        self::assertEquals(2500, $maiorValor);

        
    }
    public function testAvaliadorDeveEncontrarOMaiorValorDeLanceEmOrdemDecrescente()
    {
        //arruma a casa para testar - Arrange / Given
        $leilao = new Leilao('fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro  = new Avaliador();

        //executo o códigoa ser testado - Act / When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        //verifico se a saída é a esperada - Assert / Then
        self::assertEquals(2500, $maiorValor);

        
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeLanceEmOrdemDecrescente()
    {
        //arruma a casa para testar - Arrange / Given
        $leilao = new Leilao('fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro  = new Avaliador();

        //executo o códigoa ser testado - Act / When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        //verifico se a saída é a esperada - Assert / Then
        self::assertEquals(2000, $menorValor);

        
    }

    public function testAvaliadorDeveEncontrarOMenorValorDeLanceEmOrdemCrescente()
    {
        //arruma a casa para testar - Arrange / Given
        $leilao = new Leilao('fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro  = new Avaliador();

        //executo o códigoa ser testado - Act / When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        //verifico se a saída é a esperada - Assert / Then
        self::assertEquals(2000, $menorValor);

        
    }
}
