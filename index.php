<?php
class Employee {
    private String $name;
    private String $email;
    private String $department;

    public function __construct(String $name, String $email, String $department) {
        $this->name = $name;
        $this->email = $email;
        $this->department = $department;
    }

    // Métodos getters e setters

    // Responsabilidade de gerenciamento de dados do funcionário
    public function saveEmployeeToDatabase() {
        // Lógica para salvar o funcionário no banco de dados
    }

    // Responsabilidade de enviar e-mail
    public function sendEmail(string $message) {
        // Lógica para enviar um e-mail ao funcionário
    }
}