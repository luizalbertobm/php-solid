<?php

namespace Solid\SingleResponsability\Violation;

/**
 * *SRP - Single Responsibility Principle*
 * 
 * Este princípio afirma que uma classe deve ter apenas um motivo para mudar.
 * No exemplo abaixo a classe Employee tem 3 responsabilidades: gerenciamento de dados do funcionário,
 * salvar o funcionário no banco de dados e enviar e-mails.
 * Isso viola o SRP, pois se uma dessas responsabilidades mudar, a classe Employee precisará ser alterada.
 */
class Employee {
    public String $name;
    public String $email;
    public String $department;

    public function __construct(String $name, String $email, String $department) {
        $this->name = $name;
        $this->email = $email;
        $this->department = $department;
    }

    // Responsabilidade de gerenciamento de dados do funcionário
    public function saveEmployeeToDatabase() {
        echo "Salvando funcionário {$this->name} no banco de dados\n";
    }

    // Responsabilidade de enviar e-mail
    public function sendEmail(string $message) {
        echo "Enviando e-mail para {$this->email}: $message\n";
    }
}

// Uso
$employee = new Employee('John Doe', 'johndoe@email.com', 'IT');
$employee->saveEmployeeToDatabase();
$employee->sendEmail('Bem-vindo à empresa!');