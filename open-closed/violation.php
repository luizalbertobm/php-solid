<?php

namespace Solid\OpenClosed\Violation;

/**
 * *OCP - Open/Closed Principle*
 * 
 * Este princípio afirma que uma classe deve estar aberta para extensão,
 * mas fechada para modificação. Ou seja, devemos poder adicionar novas
 * funcionalidades sem alterar o código fonte existente.
 */

 class Pedido{
    private $numero;

    public function __construct()
    {
        $this->numero = rand(1000, 9999);
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function processarPagamentoCartao()
    {
        echo "Pagamento {$this->getNumero()} processado por cartão de crédito\n";
    }
}

// Uso
$pedido = new Pedido();
$pedido->processarPagamentoCartao();

/**
 * Este design viola o OCP porque se quisermos adicionar um novo método de pagamento,
 * precisaríamos modificar a classe Pedido adicionando um novo método para o novo método de pagamento.
 * Isso viola o princípio de que uma classe deve estar aberta para extensão, mas fechada para modificação.
 */