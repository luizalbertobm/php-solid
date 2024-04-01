<?php

namespace Solid\LiskovSubstitution\Implementation;

/**
 * *LSP - Liskov Substitution Principle*
 * 
 * Para implementar o LSP, podemos criar uma interface MidiaInterface que obriga a implementação do método renderizar.
 * Em seguida, implementamos classes específicas para cada tipo de mídia, todas seguindo esta interface.
 * E dizemos qual mídia queremos exibir no método exibirConteudo.
 * Assim não precisamos modificar a função exibirConteudo para adicionar um novo tipo de mídia.
 */

interface MidiaInterface {
    public function renderizar();
}

class Livro implements MidiaInterface {
    public function renderizar() {
        echo "Renderizando livro\n";
    }
}

class CompactDisc implements MidiaInterface {
    public function renderizar() {
        echo "Preparando CD\n";
        $this->reproduzir();
    }

    public function reproduzir() {
        echo "Reproduzindo CD\n";
    }
}

class BlueRay implements MidiaInterface {
    public function renderizar() {
        echo "Preparando BlueRay\n";
        $this->reproduzir();
    }

    public function reproduzir() {
        echo "Reproduzindo BlueRay\n";
    }
}

function exibirConteudo(MidiaInterface $midia) {
    $midia->renderizar();
}

$livro = new Livro();
$compactDisc = new CompactDisc();
$blueRay = new BlueRay();

exibirConteudo($livro); // Ok
exibirConteudo($compactDisc); // Ok
exibirConteudo($blueRay); // Ok
