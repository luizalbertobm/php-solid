<?php

namespace Solid\InterfaceSegregation\Violation;

/**
 * *ISP - Interface Segregation Principle*
 * 
 * O princípio da segregação de interfaces estabelece que uma classe não deve ser forçada a implementar interfaces
 * e métodos que não serão utilizados. Em vez disso, devemos dividir as interfaces em interfaces menores e mais específicas.
 */

interface MidiaInterface {
    public function renderizar();
    public function reproduzir();
}

class Livro implements MidiaInterface {
    public function renderizar() {
        echo "Renderizando livro\n";
    }

    public function reproduzir() {
        echo "Esta mídia não é capaz de ser reproduzida\n";
    }
}

class CompactDisc implements MidiaInterface {
    public function renderizar() {
        echo "Preparando CD\n";
    }

    public function reproduzir() {
        echo "Reproduzindo CD\n";
    }
}

function exibirConteudo(MidiaInterface $midia) {
    $midia->renderizar();
    $midia->reproduzir();
}

$livro = new Livro();
$compactDisc = new CompactDisc();

exibirConteudo($livro); // Ok
exibirConteudo($compactDisc); // Ok

/**
 * Violação do ISP. A interface MidiaInterface possui métodos que não são relevantes para todas as classes que a implementam.
 */