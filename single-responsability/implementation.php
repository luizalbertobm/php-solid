<?php

namespace Solid\SingleResponsability\Implementation;

/**
 * *SRP - Single Responsibility Principle*
 * 
 * Para implementar o SRP, podemos criar uma nova classe EmployeeRepository para gerenciar 
 * o armazenamento de dados do funcionário e uma nova classe EmailService para lidar 
 * com o envio de e-mails.
 */

class Employee {
    public string $name;
    public string $email;
    public string $department;

    public function __construct(string $name, string $email, string $department) {
        $this->name = $name;
        $this->email = $email;
        $this->department = $department;
    }
}

class EmployeeRepository {
    public function save(Employee $employee) {
        echo "Salvando funcionário {$employee->name} no banco de dados\n";
    }
}

class EmailService {
    public function sendEmail(Employee $employee, string $message) {
        echo "Enviando e-mail para {$employee->email}: $message\n";
    }
}

// Uso
$employee = new Employee('John Doe', 'johndoe@email.com', 'IT');

$employeeRepository = new EmployeeRepository();
$employeeRepository->save($employee);

$emailService = new EmailService();
$emailService->sendEmail($employee, 'Bem-vindo à empresa!');
