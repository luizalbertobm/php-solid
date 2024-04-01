<?php

namespace Solid\OpenClosed\Implementation;

/**
 * *OCP - Open/Closed Principle*
 * 
 * Para aderir ao OCP, definimos uma interface ProcessadorPagamento 
 * que obriga a implementação do método processar. Em seguida, implementamos 
 * classes específicas para cada método de pagamento, todas seguindo esta interface. 
 * E dizemos qual processador queremos utilizar no método processarPagamento da classe Pedido.
 * Assim não precisamos modificar a classe Pedido para adicionar um novo método de pagamento.
 */

interface ProcessadorPagamento
{
    public function processar(Pedido $pedido);
}

class PagamentoCartaoCredito implements ProcessadorPagamento
{
    public function processar(Pedido $pedido)
    {
        echo "Pedido {$pedido->getNumero()} processado via Cartão de Crédito\n";
    }
}

class PagamentoPayPal implements ProcessadorPagamento
{
    public function processar(Pedido $pedido)
    {
        echo "Pedido {$pedido->getNumero()} processado via PayPal\n";
    }
}

class PagamentoTransferencia implements ProcessadorPagamento
{
    public function processar(Pedido $pedido)
    {
        echo "Pedido {$pedido->getNumero()} processado via Transferência\n";
    }
}

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

    public function processarPagamento(ProcessadorPagamento $processador)
    {
        $processador->processar($this);
    }
}

// Uso
$pedido1 = new Pedido();
$pedido1->processarPagamento(new PagamentoCartaoCredito());

$pedido2 = new Pedido();
$pedido2->processarPagamento(new PagamentoPayPal());

$pedido3 = new Pedido();
$pedido3->processarPagamento(new PagamentoTransferencia());

/**
 * Agora o método processarPagamento da classe Pedido não precisa ser modificado
 * para adicionar um novo método de pagamento. Basta criar uma nova classe que
 * implemente a interface ProcessadorPagamento e passá-la como argumento para o método.
 */