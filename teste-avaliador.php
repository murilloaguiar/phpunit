<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

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
$valorEsperado = 2500;

if ($valorEsperado == $maiorValor) {
    echo 'TESTE OK';
} else {
    echo 'TESTE FALHOU';
}
