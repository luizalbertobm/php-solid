<?php

namespace Solid\LiskovSubstitution\Violation;

/**
 * *LSP - Liskov Substitution Principle*
 * 
 * O princípio da substituição de Liskov estabelece que objetos de uma classe base
 * devem ser substituíveis por objetos de suas classes derivadas sem que isso cause problemas na aplicação.
 * 
 * Vamos considerar um sistema de de biblioteca online onde diferentes tipos de midia 
 * tem uma forma de exibição.
 */


class Midia {
    public function renderizar() {
        echo "Renderizando conteúdo\n";
    }
}

class Livro extends Midia {
    public function renderizar() {
        echo "Renderizando livro\n";
    }
}

class CompactDisc extends Midia {
    public function renderizar() {
        echo "Preparando CD\n";
    }

    public function reproduzir() {
        echo "Reproduzindo CD\n";
    }
}

function exibirConteudo(Midia $midia) {
    $midia->renderizar();
    if ($midia instanceof CompactDisc) {
        $midia->reproduzir(); // Violação do LSP
    }
}

$livro = new Livro();
exibirConteudo($livro); // Ok

$compactDisc = new CompactDisc();
exibirConteudo($compactDisc); // Ok, mas viola LSP

/**
 * A LSP é violada pois caso eu queira adicionar um novo tipo de mídia, como blueRay, 
 * teríamos que adicionar uma nova verificação no método exibirConteudo().
 * Isso viola o princípio de que objetos de uma classe base devem ser substituíveis 
 * por objetos de suas classes derivadas sem que isso cause erros na aplicação 
 * ou necessite de alterações em outras classes.
 */