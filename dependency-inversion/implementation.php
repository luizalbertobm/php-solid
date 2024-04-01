<?php

namespace Solid\DependencyInversion\Implementation;

/**
 * *DIP - Dependency Inversion Principle*
 * 
 * O princípio da inversão de dependência estabelece que módulos de alto nível não devem depender de módulos de baixo nível.
 * Ambos devem depender de abstrações. Além disso, abstrações não devem depender de detalhes. Detalhes devem depender de abstrações.
 */

 // Passo 1: Definir abstrações

 interface ExibicaoEstrategia {
    public function exibir();
}    

interface MidiaInterface {
    public function exibirConteudo();
}

// Estratégias de exibição
class RenderizarEstrategia implements ExibicaoEstrategia {
    public function exibir() {
        echo "Renderizando livro\n";
    }
}

class RenderizarEReproduzirEstrategia implements ExibicaoEstrategia {
    public function exibir() {
        echo "Preparando Vídeo\n";
        echo "Reproduzindo Vídeo\n";
    }
}

// Módulos de baixo nível
class Livro implements MidiaInterface {
    protected $estrategia;
    
    public function __construct() {
        $this->estrategia = new RenderizarEstrategia();
    }
    public function exibirConteudo() {
        $this->estrategia->exibir();
    }
}

class CompactDisc implements MidiaInterface {
    protected $estrategia;
    
    public function __construct() {
        $this->estrategia = new RenderizarEReproduzirEstrategia();
    }

    public function exibirConteudo() {
        $this->estrategia->exibir();
    }
}

class BlueRay implements MidiaInterface {
    protected $estrategia;
    
    public function __construct() {
        $this->estrategia = new RenderizarEReproduzirEstrategia();
    }

    public function exibirConteudo() {
        $this->estrategia->exibir();
    }
}
// Passo 3: inversão de dependência
// Implementação de alto nível que depende da abstração
function exibirMidia(MidiaInterface $midia) {
    $midia->exibirConteudo();
}

// Passo 4: Utilização
$livro = new Livro();
$cd = new CompactDisc();
$blueray = new BlueRay();

exibirMidia($livro); // Renderiza o livro
exibirMidia($cd); // Prepara e reproduz o CD
exibirMidia($blueray); // Prepara e reproduz o BlueRay

/**
 * Agora temos uma implementação que segue o princípio da inversão de dependência.
 * A implementação de alto nível exibirMidia() não depende de módulos de baixo nível.
 * Ambos dependem de abstrações. Além disso, as abstrações não dependem de detalhes.
 * Detalhes dependem de abstrações.
 * 
 * Se quisermos adicionar um novo tipo de mídia, como um arquivo de áudio, basta criar uma nova classe que implementa MidiaInterface
 * e definir a estratégia de exibição.
 * Não precisamos modificar a função exibirMidia().
 */
