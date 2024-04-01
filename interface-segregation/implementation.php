<?php

namespace Solid\InterfaceSegregation\Implementation;

/**
 * *ISP - Interface Segregation Principle*
 * 
 * Para implmentar o ISP, criamos duas interfaces: MidiaInterface e Reproduzivel.
 * A interface MidiaInterface obriga a implementação do método renderizar.
 * A interface Reproduzivel obriga a implementação do método reproduzir.
 * Em seguida, implementamos classes específicas para cada tipo de mídia, todas seguindo a interface MidiaInterface.
 * E dizemos qual mídia queremos exibir no método exibirConteudo.
 * Assim não precisamos modificar a função exibirConteudo para adicionar um novo tipo de mídia.
 */

interface MidiaInterface {
    public function renderizar();
}

interface ReproduzivelInterface {
    public function reproduzir();
}

class Livro implements MidiaInterface {
    public function renderizar() {
        echo "Renderizando livro\n";
    }
}

class CompactDisc implements MidiaInterface, ReproduzivelInterface {
    public function renderizar() {
        echo "Preparando CD\n";
    }

    public function reproduzir() {
        echo "Reproduzindo CD\n";
    }
}

class BlueRay implements MidiaInterface, ReproduzivelInterface {
    public function renderizar() {
        echo "Preparando BlueRay\n";
    }

    public function reproduzir() {
        echo "Reproduzindo BlueRay\n";
    }
}

function exibirConteudo(MidiaInterface $midia) {
    $midia->renderizar();
    if ($midia instanceof ReproduzivelInterface) {
        $midia->reproduzir();
    }
}

$livro = new Livro();
$compactDisc = new CompactDisc();
$blueRay = new BlueRay();

exibirConteudo($livro); // Ok
exibirConteudo($compactDisc); // Ok
exibirConteudo($blueRay); // Ok
